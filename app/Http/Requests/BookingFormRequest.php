<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingFormRequest extends FormRequest
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
     * 'reg_no', 'reason', 'hall_room', 'description', 'event_time', 'no_of_guests', 'chief_guest', 'main_guest', 'chair_of_the_event', 'applicant_name', 'nid_no', 'email_address', 'mobile_no', 'address', 'status'
     * @return array
     */
    public function rules()
    {
        return [
            'reason' => 'required|min:4',
            'hall_room' => 'required',
            'description' => 'required|min:4',
            'event_date'  => 'required',
            'event_time'   => 'required',
            'no_of_guests' => 'required|numeric',
            'chief_guest'  => 'required|min:4',
            'main_guest'   => 'required|min:4',
            'chair_of_the_event' => 'required',
            'applicant_name'     => 'required|min:4',
            'nid_no'     => 'required|min:13|max:17',
            'email_address' => 'nullable|email',
            'mobile_no'     => 'required|min:11|max:11',
            'address'       => 'required'
        ];
    }    
    /**
     * Custom Validation Messages
     * @return [type] [description]
     */
        public function messages()
        {
            return [
                'reason.min' => language('This field must be minimum 4 digits', 'এই ঘরটি সর্বনিম্ন ৪ অক্ষরের হতে হবে'),
                'description.min' => language('This field must be minimum 4 digits', 'এই ঘরটি সর্বনিম্ন ৪ অক্ষরের হতে হবে'),
                'no_of_guests.numeric' => 'এই ঘরের মান অবশ্যই ইংরেজি অক্ষরের (1-9) পর্যন্ত হতে হবে ',
                'chief_guest.min' => language('This field must be minimum 4 digits', 'এই ঘরটি সর্বনিম্ন ৪ অক্ষরের হতে হবে'),
                'main_guest.min' => language('This field must be minimum 4 digits', 'এই ঘরটি সর্বনিম্ন ৪ অক্ষরের হতে হবে'),
                'applicant_name.min' => language('This field must be minimum 4 digits', 'এই ঘরটি সর্বনিম্ন ৪ অক্ষরের হতে হবে'),
                'nid_no.min' => language('This field must be minimum 13-17 digits', 'এই ঘরটি সর্বনিম্ন ১৩-১৭ অক্ষরের হতে হবে'),
                'email_address.email' => language('This field must be a valid email address', 'এই ঘরের মান অবশ্যই বৈধ ইমেইল এড্রেস হতে হবে'),
                'mobile_no.min' => language('Mobile number must be 11 digits long', 'মোবাইল নম্বর ১১ সংখ্যার হতে হবে এবং মাঝখানে সংখ্যা ছাড়া কোনোকিছু থাকতে পারবে না '),
                'mobile_no.max' => language('Mobile number must be 11 digits long', 'মোবাইল নম্বর ১১ সংখ্যার হতে হবে এবং মাঝখানে সংখ্যা ছাড়া কোনোকিছু থাকতে পারবে না '),
            ];
        }
}
