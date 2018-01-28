<?php

namespace App\Http;

use App\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CalendarService
{
	private $request;

	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	public function generate()
	{
		$bookings = (new Booking)->newQuery();
		if($this->request->has('room') && $this->request->room != 'all'){
			$bookings->where('hall_room', $this->request->room);
		}
		$results = $bookings->with('schedules')->get();

		return $this->parseResults($results);
	}

	private function parseResults($results)
	{
		$output = [];
		if(count($results)){
			foreach($results as $result){
				foreach($result->schedules as $key => $schedule){
					$inner = [];
					$inner['id']    = $result->id . $schedule->id;
					$inner['title'] = getBookingTime($result->event_time) . ' | উদ্দেশ্য: ' . getReason($result->reason) . ' | স্থান: ' . getRoom($result->hall_room);
					$inner["start"] = Carbon::parse($schedule->booking_date->format('Y-M-d') . convertBookingTime($result->event_time . '-start'))->toIso8601String();
					$inner["end"] = Carbon::parse($schedule->booking_date->format('Y-M-d') . convertBookingTime($result->event_time . '-end'))->toIso8601String();
					$inner["backgroundColor"] = getColorCode($result->status);

					$output[] = $inner;
				}
			}
		}

		return count($output) ? $output : null;
	}
}