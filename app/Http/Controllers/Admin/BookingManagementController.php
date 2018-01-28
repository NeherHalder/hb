<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use App\Http\Controllers\Controller;
use App\Http\Filters\BookingFilter;
use App\Events\MembershipAccepted;
use App\Notifications\BookingStatusChanged;
use Illuminate\Http\Request;

class BookingManagementController extends Controller
{
    public function index(BookingFilter $filters)
    {
        $bookings = Booking::filter($filters)->latest()->paginate(25);
        return view('admin.booking.index', [
            'bookings' => $bookings
        ]);
    }

    public function show(Booking $booking)
    {
        $booking->load('schedules');
        return view('admin.booking.show', compact('booking'));
    }

    public function toggleStatus(Request $request, Booking $booking)
    {
        if ($request->status == 3 && $flashMsg = $this->validateBookingDate($booking)) {
            return back()->withError($flashMsg . ' তারিখে বুকিংয়ের অনুমোদন রয়েছে | নতুন বুকিং করা সম্ভব নয় |');
        }
        $booking->update(['status' => $request->status]);

        event(new MembershipAccepted(
            $booking,
            generateSms($booking->status, $booking->reg_no)
        ));
        $booking->notify(
            new BookingStatusChanged(generateNotification($booking->status), $booking->reg_no)
        );

        return back()->withSuccess(language(
            'Hall/Seminar Room booking status changed successfully',
            'হল/সেমিনার কক্ষ বুকিং স্ট্যাটাস পরিবর্তন করা হলো '
        ));
    }

    protected function validateBookingDate($booking)
    {
        $schedules = $booking->load('schedules');
        $dates = $schedules->schedules->pluck('booking_date')->toArray();
        $bookings = Booking::whereHas('schedules', function ($query) use ($booking, $dates) {
            $query->whereIn('booking_date', $dates)
                  ->where('booking_id', '!=', $booking->id);
        })
        ->where(function ($query) use ($booking) {
            $query->where('event_time', $booking->event_time)
                 ->orWhere('event_time', 'full-day');
        })
        ->where('status', 3)
        ->where('hall_room', $booking->hall_room)
        ->with(['schedules' => function ($query) use ($dates) {
            $query->whereIn('booking_date', $dates);
        }])->get();

        $result = count($bookings) ? $this->stringifyDates($bookings) : null;

        return $result;
    }

    private function stringifyDates($bookings)
    {
        $result = '';
        foreach ($bookings as $bk) {
            if (count($bk->schedules)) {
                foreach ($bk->schedules as $schedule) {
                    $result .= language(
                        $schedule->booking_date->format('M d, Y') . ' ('. getBookingTime($bk->event_time) .')',
                        entobn($schedule->booking_date->format('M d, Y') . ' ('. getBookingTime($bk->event_time) .')')
                    ) . ', ';
                }
            }
        }

        return trim($result, ', ');
    }
}
