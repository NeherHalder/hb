<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserManagementFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|min:3'
        ];
        if($id = $this->segment(3)){
            $rules['username'] = 'required|min:4|unique:users,username,' . $id;
        }else{
            $rules['username'] = 'required|min:4|unique:users,username';
            $rules['password'] = 'required|min:4|confirmed';
            $rules['password_confirmation'] = 'required';
        }
        
        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => language('name field cannot be empty', 'ইউজারের নাম ঘরটি ফাঁকা রাখা যাবে না'),
            'name.min' => language('name field length must be minimum 3', 'ইউজারের নাম সর্বনিম্ন ৩ অক্ষরের হতে হবে'),
            'username.required' => language('username field cannot be empty', 'ইউজারনেম ঘরটি ফাঁকা রাখা যাবে না'),
            'username.min' => language('username field length must be minimum 4', 'ইউজারনেম সর্বনিম্ন ৪ অক্ষরের হতে হবে'),
            'username.unique' => language('username field cannot be duplicate. try new one', 'এই ইউজারনেম ডাটাবেইজে আছে | অন্য ইউজারনেম দিন '),
            'password.required' => language('password field cannot be empty', 'পাসওয়ার্ড ঘরটি ফাঁকা রাখা যাবে না'),
            'password.min' => language('password field length must be minimum 4', 'পাসওয়ার্ড সর্বনিম্ন ৪ অক্ষরের হতে হবে'),
            'password.confirmed' => language('password and confirm password must be same', 'পাসওয়ার্ড এবং কন্ফার্ম পাসওয়ার্ড একই হতে হবে '),
            'password_confirmation.required' => language('password confirmation field cannot be empty', 'কন্ফার্ম পাসওয়ার্ড ঘরটি ফাঁকা রাখা যাবে না')
        ];
    }
}
