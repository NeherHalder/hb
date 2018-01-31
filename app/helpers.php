<?php

function getRoom($key)
{
    $arr = [
        'sufia-kamal'  => language('Sufia Kamal Auditorium', 'কবি সুফিয়া কামাল মিলনায়তন'),
        'nolinikanto-vottoshali'  => language('Nolinikanto Vottoshali Gallery', 'নলিনীকান্ত ভট্টশালী প্রদর্শনী গ্যালারি'),
        'main-auditorium' => language('Main Auditorium', 'প্রধান মিলনায়তন')
    ];
    return $arr[$key];
}

function getCapacity($key)
{
    $arr = [
        'sufia-kamal'  => 300,
        'nolinikanto-vottoshali'   => 250,
        'main-auditorium'   => 250
    ];
    return $arr[$key];
}

function getReason($key)
{
    $arr = [
        'conference'  => language('Conference', 'সম্মেলন'),
        'seminar'  => language('Seminar', 'সেমিনার'),
        'movie' => language('Movie Show', 'চলচ্চিত্র প্রদর্শনী')
    ];
    return $arr[$key];
}

function getBookingTime($key)
{
    $arr = [
        'full-day'  => language('Full Day Package', 'পূর্ণ দিবস'),
        'half-mor'   => language('Half Day (Morning)', 'অর্ধ দিবস (সকাল)'),
        'half-eve'     => language('Half Day (evening)', 'অর্ধ দিবস (বিকাল)')
    ];
    return $arr[$key];
}

function convertBookingTime($key)
{
    $arr = [
        'full-day-start'  => ' 09:00:00',
        'full-day-end'    => ' 21:00:00',
        'half-mor-start'  => ' 09:00:00',
        'half-mor-end'    => ' 14:00:00',
        'half-eve-start'  => ' 15:00:00',
        'half-eve-end'    => ' 21:00:00',
    ];

    return $arr[$key];
}

function swap_status($status)
{
    $arr = [
        'pending' => 1,
        'processed' => 2,
        'approved'  => 3,
        'cancelled' => 4
    ];
    return $arr[$status];
}

function getColorCode($status)
{
    $arr = [
        1 => '#f0ad4e',
        2 => '#337ab7',
        3 => '#008000' ,
        4 => '#c9302c'
    ];
    return $arr[$status];
}

function allReasons()
{
    return [
        'conference'  => language('Conference', 'সম্মেলন'),
        'seminar'  => language('Seminar', 'সেমিনার'),
        'movie' => language('Movie Show', 'চলচ্চিত্র প্রদর্শনী')
    ];
}

function allRoomTypes()
{
    return [
        'sufia-kamal'  => language('Sufia Kamal Auditorium', 'কবি সুফিয়া কামাল মিলনায়তন'),
        'nolinikanto-vottoshali'  => language('Second Floor Conference Room', 'নলিনীকান্ত ভট্টশালী প্রদর্শনী গ্যালারি'),
        'main-auditorium' => language('Main Auditorium', 'প্রধান মিলনায়তন')
    ];
}

function send_message($phone, $message)
{
    $curl = curl_init();
    $phone = bntoen(str_replace('+88', '', $phone));
    $message = str_replace(" ", "%20", $message);

    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => "http://202.4.124.22:13013/cgi-bin/sendsms?username=tester&password=foobar&charset=utf-8&coding=2&to=$phone&text=$message"
    ));
    $result = curl_exec($curl);
    curl_close($curl);

    return $result;
}

function status_state($state)
{
    $arr = [
        'pending'   => 1,
        'processed' => 2,
        'approved'  => 3,
        'cancelled' => 4
    ];

    return $arr[$state];
}

function generateNotification($status = 1)
{
    if ($status == 1) {
        $status = 'পেন্ডিং ';
    }
    if ($status == 2) {
        $status = 'প্রক্রিয়াধীন';
    }
    if ($status == 3) {
        $status = ' অনুমোদন';
    }
    if ($status == 4) {
        $status = ' বাতিল';
    }
    $result = " রেজিস্ট্রেশন নং এর বুকিং স্ট্যাটাস " . $status . " করা হয়েছে | " . $status . " করেছেন " . auth()->user()->name;
    return $result;
}

function generateSms($status, $reg_no)
{
    if ($status == 1) {
        return "আপনি বুকিংয়ের জন্য আবেদন করেছেন | রেজিস্ট্রেশন নং  " . $reg_no;
    }
    if ($status == 2) {
        return "বুকিংয়ের আবেদন প্রক্রিয়াধীন আছে | রেজিস্ট্রেশন নং   " . $reg_no;
    }
    if ($status == 3) {
        return "বুকিংয়ের আবেদন অনুমোদন করা হয়েছে | রেজিস্ট্রেশন নং  " . $reg_no;
    }
    if ($status == 4) {
        return "বুকিংয়ের আবেদন বাতিল করা হয়েছে | রেজিস্ট্রেশন নং  " . $reg_no;
    }
}

function language($engTitle, $bnTitle)
{
    if (\Session::has('locale') && \Session::get('locale') == 'en') {
        return $engTitle;
    }

    return $bnTitle;
}

function entobn($string)
{
    $engDATE = [
        '1','2','3','4','5','6','7','8','9','0','January','February','March','April','May','June','July','August','September','October','November','December','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec','Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Sat','Sun','Mon','Tue','Wed','Thu','Fri', 'hours', 'hour', 'minutes', 'minute', 'seconds', 'second', 'days', 'day', 'months', 'month',  'years', 'year', 'weeks', 'week', 'ago', "am", "AM", "pm", "PM"
    ];

    $bangDATE = [
        '১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
    বুধবার','বৃহস্পতিবার','শুক্রবার','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
    বুধবার','বৃহস্পতিবার','শুক্রবার', 'ঘণ্টা', 'ঘণ্টা', 'মিনিট', 'মিনিট', 'সেকেন্ড', 'সেকেন্ড', 'দিন', 'দিন', 'মাস', 'মাস', 'বছর', 'বছর', 'সপ্তাহ', 'সপ্তাহ', ' পূর্বে', 'সকাল', 'সকাল', 'বিকাল', 'বিকাল'
    ];

    return str_replace($engDATE, $bangDATE, $string);
}

function bntoen($string)
{
    $engDATE = [
        '1','2','3','4','5','6','7','8','9','0','January','February','March','April','May','June','July','August','September','October','November','December','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec','Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Sat','Sun','Mon','Tue','Wed','Thu','Fri'
    ];

    $bangDATE = [
        '১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
    বুধবার','বৃহস্পতিবার','শুক্রবার','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
    বুধবার','বৃহস্পতিবার','শুক্রবার'
    ];

    return str_replace($bangDATE, $engDATE, $string);
}
