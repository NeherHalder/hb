<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index(Request $request)
    {
    	$messages = '';
    	$query = (new Message)->newQuery();
    	if($request->has('type') && $request->type == 'all'){
    		$query->where('read', true);
    		$query->orWhere('read', false);
    	}
    	if($request->has('type') && $request->type == 'read')
    		$query->where('read', true);
    	if($request->has('type') && $request->type == 'unread')
    		$query->where('read', false);

    	$messages = $query->latest()->paginate(30);

    	return view('admin.messages.index', compact('messages'));
    }

    public function show(Message $message)
    {
    	$message->read = true;
    	$message->save();

    	return view('admin.messages.show', compact('message'));
    }

    public function reply(Request $request)
    {
    	send_message(bntoen($request->mobile), $request->input('message'));

    	return back()->withSuccess(language(
    		"Message was sent successfully",
    		"মেসেজ পাঠানো সম্পন্ন হয়েছে"
    	));
    }

    public function destroy(Message $message)
    {
    	$message->delete();

    	return back()->withSuccess(language(
    		"Message was deleted successfully",
    		"বার্তাটি মুছে ফেলা হয়েছে"
    	));
    }
}
