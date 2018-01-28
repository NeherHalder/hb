<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use Notifiable;

    protected $fillable = [
    	'reg_no', 'reason', 'hall_room', 'description', 'event_time', 'no_of_guests', 'chief_guest', 'main_guest', 'chair_of_the_event', 'applicant_name', 'nid_no','id_type', 'email_address', 'mobile_no', 'address', 'status'
    ];

    public function getRouteKeyName()
    {
    	return 'reg_no';
    }

    public function schedules()
    {
    	return $this->hasMany(Schedule::class);
    }

    public function scopeFilter($query, $filter)
    {
        return $filter->apply($query);
    }
}
