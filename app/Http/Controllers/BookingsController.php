<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Http\Requests\BookingFormRequest;
use App\Events\MembershipAccepted;
use App\Notifications\BookingStatusChanged;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    public function show(Request $request)
    {
        return view('frontend.booking.index');
    }

    public function store(BookingFormRequest $request)
    {
        $booking = $this->validateBookingDate($request->only('event_date', 'event_time', 'hall_room'));

        if (count($booking)) {
            $result = $this->stringifyDates($booking);
            return back()->withCollition("নিম্নোক্ত তারিখ এবং সময়ে আপনার বুকিং সম্ভব নয়")
                ->withBooked(trim($result, ', '))->withInput($request->all());
        } else {
            $request['reg_no'] = time();
            $booking = Booking::create($request->all());
            $this->createSchedules($booking, $request->only('event_date', 'event_time'));

            event(new MembershipAccepted($booking, "হল/সেমিনার রুম বুকিংয়ের আবেদনপত্রের রেজিস্ট্রেশন নং ".$booking->reg_no));

            $booking->notify(new BookingStatusChanged(
                "রেজিস্ট্রেশন নং নতুন বুকিংয়ের জন্য আবেদন করা হয়েছে |",
                $booking->reg_no
            ));

            return redirect()->route('payOrder', [$booking])->withPayorder(language(
                'Your Hall/Seminar Room booking application was successfull',
                'আপনার হল/সেমিনার রুম বুকিং আবেদন সফল হয়েছে'
            ));
        }
    }

    protected function validateBookingDate($request)
    {
        $dates = $this->arrGenerator($request['event_date']);
        $bookings = Booking::whereHas('schedules', function ($query) use ($dates) {
            $query->whereIn('booking_date', $dates);
        })
        ->where(function ($query) use ($request) {
            $query->where('event_time', $request['event_time'])
                 ->orWhere('event_time', 'full-day');
        })
        //->where('status', 3)
        ->where('hall_room', $request['hall_room'])
        ->with(['schedules' => function ($query) use ($dates) {
            $query->whereIn('booking_date', $dates);
        }])->get();

        return $bookings;
    }

    private function createSchedules(Booking $booking, $dates)
    {
        $dates = $this->arrGenerator($dates['event_date']);
        foreach ($dates as $date) {
            $booking->schedules()->create([
                'booking_date' => $date
            ]);
        }

        return true;
    }

    private function arrGenerator($dates)
    {
        return explode(',', $dates);
    }

    private function stringifyDates($bookings)
    {
        $result = '';
        foreach ($bookings as $bk) {
            if (count($bk->schedules)) {
                foreach ($bk->schedules as $schedule) {
                    $result .= $schedule->booking_date->format('d M Y') . ', ';
                }
            }
        }

        return $result;
    }
}
