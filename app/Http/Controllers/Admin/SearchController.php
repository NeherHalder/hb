<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Filters\BookingFilter;

class SearchController extends Controller
{
    public function index(Request $request, BookingFilter $filters)
    {
    	if($request->has('mobile_no') || $request->has('nid_no') || $request->has('reg_no')){
	    	$bookings = Booking::filter($filters)->latest()->get();
	    }else{
	    	$bookings = null;
	    }
    	return view('admin.search', compact('bookings'));
    }
}
