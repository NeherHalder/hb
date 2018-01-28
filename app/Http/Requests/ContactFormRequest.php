<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
        return [
            'name'   => 'required|min:3',
            'mobile' => 'required',
            'email'  => 'nullable|email',
            'subject'  => 'required',
            'message' => 'required|min:4'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => language('your name field cannot be empty', 'আপনার নাম অবশ্যই টাইপ করতে হবে'),
            'mobile.required' => language('mobile no. field cannot be empty', 'আপনার মোবাইল নম্বর অবশ্যই টাইপ করতে হবে'),
            'email.email' => language('Invalid email address. retype valid email address', 'অকার্যকর ইমেইল | সঠিক ইমেইল প্রদান করুন |'),
            'subject.required' => language('you must type subject of your message', 'বার্তার বিষয়বস্তু অবশ্যই টাইপ করতে হবে'),
            'message.required' => language('you must type your message', 'বার্তা পাঠাতে অবশ্যই বার্তা টাইপ করতে হবে')
        ];
    }
}
