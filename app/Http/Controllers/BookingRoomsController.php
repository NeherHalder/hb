<?php

namespace App\Http\Controllers;

use App\Booking;
use App\RoomGallery;
use Illuminate\Http\Request;

class BookingRoomsController extends Controller
{
    public function index()
    {
        return view('frontend.booking-rooms');
    }

    public function show($room)
    {
        $images = RoomGallery::where('room', $room)->get();

        return view('frontend.booking-room', compact('images', 'room'));
    }

    public function payOrder(Booking $booking)
    {
        return view('frontend.booking.confirmation', compact('booking'));
    }

    public function printChalan(Booking $booking)
    {
        return view('frontend.booking.pay-order', compact('booking'));
    }

    public function printPayOrder(Booking $booking)
    {
        return view('frontend.booking.print', compact('booking'));
    }

    public function showRules($room)
    {
        $images = RoomGallery::where('room', $room)->get();
        $file = 'files/' . $room . '.pdf';
        return response()->download(public_path($file));
    }
}
