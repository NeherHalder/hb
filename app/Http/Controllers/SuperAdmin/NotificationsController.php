<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Booking;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index(Request $request)
    {
    	$start = Carbon::parse($request->has('start') ? $request->start : date('Y-m-d'))->startOfDay();
    	$end   = Carbon::parse($request->has('end') ? $request->end : date('Y-m-d'))->endOfDay();
    	$notifications = \DB::table('notifications')
    		->whereBetween('created_at', [$start, $end])
    		->latest()
    		->paginate(30);
    	
    	return view('super-admin.notifications.index', compact('notifications'));
    }

    public function show(Booking $booking)
    {
        return view('super-admin.notifications.booking', compact('booking'));
    }
}
