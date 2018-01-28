<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserManagementFormRequest;
use App\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function index(Request $request)
    {
        $users = User::where('id', '!=', $request->user()->id)->latest()->get();

    	return view('super-admin.user-management.index', compact('users'));
    }

    public function create()
    {
    	return view('super-admin.user-management.create');
    }

    public function store(UserManagementFormRequest $request)
    {
    	User::create($request->all());

        return redirect('super-admin/user-management')->withSuccess(language(
            'New user was created successfully', 'নতুন ইউজার তৈরি করা হয়েছে |'
        ));
    }

    public function edit(User $user)
    {
    	return view('super-admin.user-management.edit', compact('user'));
    }

    public function update(UserManagementFormRequest $request, User $user)
    {
    	$user->update($request->all());

        return back()->withSuccess(language(
            'User info was edited successfully', 'ইউজারের তথ্য আপডেট করা হয়েছে |'
        ));
    }

    public function changeStatus(User $user)
    {
        $user->update([
            'active' => $user->active ? 0 : 1
        ]);

        return back()->withSuccess(language(
            'User status has changed',
            'ইউজারের স্ট্যাটাস পরিবর্তন করা হয়েছে |'
        ));
    }
}
