<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordFormRequest;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function showForm()
    {
    	return view('layouts.backend.common.password');
    }

    public function change(PasswordFormRequest $request)
    {
    	$request->user()->update([
    		'password' => $request->password
    	]);

    	return back()->withSuccess(language(
    		"Your password has been changed successfully",
    		"আপনার পাসওয়ার্ড পরিবর্তন করা হয়েছে |"
    	));
    }
}
