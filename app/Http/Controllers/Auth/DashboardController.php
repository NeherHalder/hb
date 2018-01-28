<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
    	$role = $request->user()->role;
    	
    	return redirect($role . "/dashboard");
    }

    public function logout()
    {
    	\Auth::logout();

    	return redirect('login');
    }
}
