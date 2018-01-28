<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
    	'name', 'mobile', 'email', 'subject', 'message', 'read'
    ];
}
