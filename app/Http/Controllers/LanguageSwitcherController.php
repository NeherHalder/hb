<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;

class LanguageSwitcherController extends Controller
{
    public function update(Request $request)
    {
    	Session::put('locale', $request->lang);

    	return back();
    }
}
