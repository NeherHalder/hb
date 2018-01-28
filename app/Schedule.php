<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
    	'booking_id', 'booking_date'
    ];

    protected $dates = [
        'booking_date'
    ];

    public function setBookingDateAttribute($value)
    {
        $this->attributes['booking_date'] = Carbon::parse($value);
    }

    public function booking()
    {
    	return $this->belongsTo(Booking::class);
    }

}
