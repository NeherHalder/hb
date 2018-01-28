<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
    	return view('frontend.contact');
    }

    public function store(ContactFormRequest $request)
    {
    	$message = Message::create($request->all());

    	return back()->withSuccess(language(
    		'your message was sent. Authority will take action immidiately & you will be informed',
    		'আপনার বার্তা পাঠানো হয়েছে | কর্তৃপক্ষ শীঘ্রই ব্যবস্থা নিবেন এবং আপনাকে জানানো হবে '
    	));
    }
}
