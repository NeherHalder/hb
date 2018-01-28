<?php 

namespace App\Http\Services;

use DB;
use Carbon\Carbon;

class BookingTimeService
{
	public function get()
	{
		$start = Carbon::parse(date('Y') . '-01-01');
		$end   = Carbon::parse(date('Y') . '-12-31');

		$bookings = DB::table('bookings')
                 ->select('event_time', DB::raw('count(*) as quantity'))
                 ->groupBy('event_time')
                 ->whereBetween('created_at', [$start, $end])
                 ->get();
        
        return $this->parseArr($bookings);
	}

	private function parseArr($bookings)
	{
		$arr = [];
		foreach($bookings as $booking){
			$arr[$booking->event_time] = $booking->quantity;
		}

		return $arr;
	}
}