<?php 

namespace App\Http\Filters;

class BookingFilter extends QueryFilter
{
	public function room($room)
	{
		return $this->builder->where('hall_room', $room);
	}

	public function event_time($time)
	{
		return $this->builder->where('event_time', $time);
	}

	public function status($status)
	{
		return $this->builder->where('status', swap_status($status));
	}

	public function reg_no($reg_no)
	{
		return $this->builder->where('reg_no', entobn($reg_no))
			->orWhere('reg_no', bntoen($reg_no));
	}

	public function mobile_no($mobile_no)
	{
		return $this->builder->where('mobile_no', entobn($mobile_no))
			->orWhere('mobile_no', bntoen($mobile_no));
	}

	public function nid_no($nid_no)
	{
		return $this->builder->where('nid_no', entobn($nid_no))
			->orWhere('nid_no', bntoen($nid_no));
	}
}