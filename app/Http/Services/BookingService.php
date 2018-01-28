<?php 

namespace App\Http\Services;

use DB;
use Carbon\Carbon;

class BookingService
{
	public function get()
	{
		$start = Carbon::parse(date('Y') . '-01-01');
		$end   = Carbon::parse(date('Y') . '-12-31');

		$bookings = DB::table('bookings')
                 ->select('hall_room', DB::raw('count(*) as quantity'))
                 ->groupBy('hall_room')
                 ->whereBetween('created_at', [$start, $end])
                 ->get();
        
        return $this->parseArr($bookings);
	}

	private function parseArr($bookings)
	{
		$arr = [];
		foreach($bookings as $booking){
			$arr[$booking->hall_room] = $booking->quantity;
		}

		return $arr;
	}
}