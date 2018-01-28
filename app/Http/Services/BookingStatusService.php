<?php 

namespace App\Http\Services;

use DB;
use Carbon\Carbon;

class BookingStatusService
{
	public function get()
	{
		$start = Carbon::parse(date('Y') . '-01-01');
		$end   = Carbon::parse(date('Y') . '-12-31');

		$bookings = DB::table('bookings')
                 ->select('status', DB::raw('count(*) as quantity'))
                 ->groupBy('status')
                 ->whereBetween('created_at', [$start, $end])
                 ->get();
        
        return $this->parseArr($bookings);
	}

	private function parseArr($bookings)
	{
		$arr = [];
		foreach($bookings as $booking){
			$arr[$booking->status] = $booking->quantity;
		}

		return $arr;
	}
}