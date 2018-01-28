@extends('layouts.frontend.master')

@section('style')
<link rel="stylesheet" href="{{ asset('css/jquery.datepick.css') }}">
@stop

@section('main-content')
<div class="column block">
    <h5 class="bk-org title">
        {{ language('Fill out the below form properly to book Hall/Seminar Room', 'হল/সেমিনার রুম ভাড়ার জন্য নিম্নের তথ্যসমূহ সঠিকভাবে পূরণ করুন') }}
    </h5>
    <p>&nbsp;</p>
    <div style="margin-left: 16px;">
        <div style="margin-bottom: 10px; border-bottom: 1px solid #e3e3e3;padding-bottom: 14px;margin-right: 30px;">
            <strong>হল/সেমিনার রুম ভাড়া সংক্রান্ত গুরুত্বপূর্ণ তথ্য</strong>
            <p><strong> প্রথম বার্তা: </strong> ফর্ম পূরণ করার পরে।</p>
            <p><strong>দ্বিতীয় বার্তা:</strong> পে অর্ডার (নিরাপত্তা অর্থ) সহ আবেদন জমা দেওয়ার পরে।</p>
            <p><strong>তৃতীয় বার্তা:  </strong> অ্যাডমিন অনুমোদিত হওয়ার পরে, অনুমোদিত চিঠিটি উল্লিখিত সময়ের মধ্যে একটি পৃথক পে অর্ডারের মাধ্যমে আপনি ভাড়া এবং ভ্যাট জমা দেওয়ার জন্য অনুরোধ করা হল।</p>
        </div>
        @if(session()->has('collition'))
            <div style="margin-bottom: 10px; border-bottom: 1px solid #e3e3e3; padding-bottom: 9px; font-style: italic; color: darkred;font-size: 1.2em;">
                আপনার প্রদত্ত দিনসমূহে হল/সেমিনার রুমের বুকিং সম্ভব নয় | উক্ত সময়ে বুকিং আছে | নিচে বুকিংসমূহের বিস্তারিত দেখুন |
            </div>
        @endif
        <form method="POST" action="">
            {{ csrf_field() }}
            <table border="0" style="width: 100%;">
                <tbody>
                    <tr>
                        <td style="width: 50%;">
                            <label for="reason">{{ language('Booking Reason', 'অনুষ্ঠানের উদ্দেশ্য') }}</label>
                            <select name="reason" id="reason" style="width: 92%; height: 32px;">
                                <option value="">{{ language('Select Reason', 'নির্বাচন করুন') }}</option>
                                <option value="conference" {{ old('reason') == 'conference' ? 'selected' : '' }}>
                                    {{ language('Conference', 'সম্মেলন') }}
                                </option>
                                <option value="seminar" {{ old('reason') == 'seminar' ? 'selected' : '' }}>
                                    {{ language('Seminar', 'সেমিনার') }}
                                </option>
                                <option value="movie" {{ old('reason') == 'movie' ? 'selected' : '' }}>
                                    {{ language('Movie Show', 'চলচ্চিত্র প্রদর্শনী') }}
                                </option>
                            </select>
                            @if($errors->first('reason'))
                                <label style="color: darkred;">{{ $errors->first('reason') }}</label>
                            @endif
                        </td>
                        <td style="width: 50%;">
                            <label for="hall_room">{{ language('Hall/Seminar Room', 'হল / সেমিনার রুম') }}</label>
                            <select name="hall_room" id="hall_room" style="width: 92%; height: 32px;">
                                <option value="">{{language('Select Hall/Seminar Room','হল/সেমিনার রুম সিলেক্ট করুন')}}</option>
                                @foreach(allRoomTypes() as $key => $value)
                                    <option value="{{ $key }}" 
                                    {{ (old('hall_room') == $key) || (Request::input('room') == $key) ? 'selected' : '' }}
                                    >{{ $value }} ({{ entobn(getCapacity($key)) }} আসন বিশিষ্ট)</option>
                                @endforeach
                            </select>
                            @if($errors->first('hall_room'))
                                <label style="color: darkred;">{{ $errors->first('hall_room') }}</label>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 100%;" colspan="2">
                            <label for="description">{{ language('Booking Event Description', 'অনুষ্ঠানের সংক্ষিপ্ত বর্ণনা') }}</label>
                            <textarea name="description" id="description" style="width: 95%;" rows="3"
                            >{{ old('description') }}</textarea>
                            @if($errors->first('description'))
                                <label style="color: darkred;">{{ $errors->first('description') }}</label>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;">
                            <label for="popupDatepicker">{{ language('Event Date (Select event dates for multiple days)', 'অনুষ্ঠানের তারিখ (একাধিক দিনের জন্য অনুষ্ঠানের তারিখসমূহ সিলেক্ট করুন)') }}</label>
                            <input type="text" name="event_date" style="width: 92%;" id="popupDatepicker" value="{{ old('event_date') }}" autocomplete="off">
                            @if($errors->first('event_date'))
                                <label style="color: darkred;">{{ $errors->first('event_date') }}</label>
                            @endif
                            @if(session()->has('collition'))
                                <div style="margin-left: 16px;">
                                    <label style="color: darkred;">{{ entobn(session()->get('booked')) }} তারিখে আপনার বুকিং সম্ভব নয়</label>
                                </div>
                            @endif
                        </td>
                        <td style="width: 50%;">
                            <label for="event_time">{{ language('Event Time', 'অনুষ্ঠানের সময়') }}</label>
                            <select name="event_time" id="event_time" style="width: 92%; height: 32px;">
                                <option value="">{{ language('Select Event Schedule', 'অনুষ্ঠানের সময় সিলেক্ট করুন') }}</option>
                                <option value="full-day" {{ old('event_time') == 'full-day' ? 'selected' : '' }}>
                                    {{ language('Full Day Package', 'পূর্ণ দিবস') }}
                                </option>
                                <option value="half-mor" {{ old('event_time') == 'half-mor' ? 'selected' : '' }}>
                                    {{ language('Half Day (Morning)', 'অর্ধ দিবস (সকাল)') }}
                                </option>
                                <option value="half-eve" {{ old('event_time') == 'half-eve' ? 'selected' : '' }}>
                                    {{ language('Half Day (evening)', 'অর্ধ দিবস (বিকাল)') }}
                                </option>
                            </select>
                            @if($errors->first('event_time'))
                                <label style="color: darkred;">{{ $errors->first('event_time') }}</label>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;">
                            <label for="no_of_guests">{{ language('No. of Guests', 'অতিথির সংখ্যা') }}</label>
                            <input type="number" min="10" name="no_of_guests" style="width: 92%;" value="{{ old('no_of_guests') }}">
                            @if($errors->first('no_of_guests'))
                                <label style="color: darkred;">{{ $errors->first('no_of_guests') }}</label>
                            @endif
                        </td>
                        <td style="width: 50%;">
                            <label for="chief_guest">{{ language('Chief Guest', 'প্রধান অতিথি') }}</label>
                            <input type="text" name="chief_guest" style="width: 91%;" value="{{ old('chief_guest') }}">
                            @if($errors->first('chief_guest'))
                                <label style="color: darkred;">{{ $errors->first('chief_guest') }}</label>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;">
                            <label for="main_guest">{{ language('Main Guest', 'বিশেষ অতিথি') }}</label>
                            <input type="text" name="main_guest" style="width: 92%;" value="{{ old('main_guest') }}">
                            @if($errors->first('main_guest'))
                                <label style="color: darkred;">{{ $errors->first('main_guest') }}</label>
                            @endif
                        </td>
                        <td style="width: 50%;">
                            <label for="chair_of_the_event">{{ language('Chair of the Event', 'চেয়ার অফ দ্যা ইভেন্ট') }}</label>
                            <input type="text" name="chair_of_the_event" style="width: 91%;" value="{{ old('chair_of_the_event') }}">
                            @if($errors->first('chair_of_the_event'))
                                <label style="color: darkred;">{{ $errors->first('chair_of_the_event') }}</label>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;">
                            <label for="applicant_name">{{ language('Applicant Name', 'আবেদনকারীর নাম') }}</label>
                            <input type="text" name="applicant_name" style="width: 92%;" value="{{ old('applicant_name') }}">
                            @if($errors->first('applicant_name'))
                                <label style="color: darkred;">{{ $errors->first('applicant_name') }}</label>
                            @endif
                        </td>
                        <td style="width: 50%;">
                            @php
                                $checkedNID = old('id_type') == 'nid' ? true : false;
                                $checkedBCN = old('id_type') == 'bcn' ? true : false;
                            @endphp
                            <input type="radio" name="id_type" value="nid" }} {{ $checkedBCN ? : 'checked' }}>{{ language('NID Number ', 'এনআইডি নং') }}
                            <input type="radio" name="id_type" value="bcn" }} {{ $checkedBCN ? 'checked' : '' }}>{{ language('BCN Number ', 'জন্মসনদ নম্বর') }}

                            <input type="text" name="nid_no" style="width: 91%;" value="{{ old('nid_no') }}"  maxlength="17"  minlength="13">
                            @if($errors->first('nid_no'))
                                <label style="color: darkred;">{{ $errors->first('nid_no') }}</label>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;">
                            <label for="email_address">{{ language('Email Address (if exists)', 'ইমেইল এড্রেস (যদি থাকে)') }}</label>
                            <input type="text" name="email_address" style="width: 92%;" value="{{ old('email_address') }}">
                            @if($errors->first('email_address'))
                                <label style="color: darkred;">{{ $errors->first('email_address') }}</label>
                            @endif
                        </td>
                        <td style="width: 50%;">
                            <label for="mobile_no">{{ language('Mobile Number', 'মোবাইল নম্বর') }}</label>
                            <input type="text" name="mobile_no" maxlength="11" style="width: 91%;" value="{{ old('mobile_no') }}" placeholder="{{ language('01XXXXXXXXX', '০১XXXXXXXXX') }}">
                            @if($errors->first('mobile_no'))
                                <label style="color: darkred;">{{ $errors->first('mobile_no') }}</label>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 100%;" colspan="2">
                            <label for="address">{{ language('Applicant\'s Address', 'আবেদনকারীর ঠিকানা') }}</label>
                            <textarea name="address" id="address" style="width: 95%;" rows="3"
                            >{{ old('address') }}</textarea>
                            @if($errors->first('address'))
                                <label style="color: darkred;">{{ $errors->first('address') }}</label>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 100%; text-align: center;" colspan="2">
                            <button type="submit" style="padding: 6px 12px; font-size: 1.2em;">
                                {{ language('Apply for Booking', 'আবেদন করুন') }}
                            </button>
                        </td>
                    </tr>
                </tbody>      
            </table>
        </form>    
    </div>
</div>
@stop

@section('script')
<script>
    $(document).ready(function() {
        $('#popupDatepicker').datepick({
            dateFormat: 'yyyy-mm-dd',
            multiSelect: 999, 
            monthsToShow: 2, 
            showTrigger: '#calImg',
            changeMonth: true,
            changeYear: true
        });
    }); 
</script>
@stop