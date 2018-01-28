@extends('layouts.frontend.master')

@section('main-content')
<div class="column block">
	<h5 class="bk-org title">
		{{ __('home.contact.title') }}
	</h5>
	<p>&nbsp;</p>
	<div style="padding-left: 10px;width: 50%; float: left; padding-right: 35px;">
		<table border="0" style="width: 100%;">
	        <form method="POST" action="{{ url('contact') }}" style="margin-left: 15px;">
			    {{ csrf_field() }}   
				<tbody>
					@if(Session::has('success'))
						<tr>
							<td colspan="2" style="text-align: center; color: green;">
								{{ Session::get('success') }}
							</td>
						</tr>
					@endif
					<tr>
						<td style="width: 25%;text-align: center;">
							<label for="name">{{ __('home.contact.name') }}</label>
						</td>
						<td style="width: 75%;">
							<input type="text" name="name" style="width: 100%;" {{ old('name') }}>
							@if($errors->first('name'))
								<label style="color: darkred;">{{ $errors->first('name') }}</label>
							@endif
						</td>
					</tr>
					<tr>
						<td style="width: 25%;text-align: center;">
							<label for="mobile">{{ __('home.contact.mobile') }}</label>
						</td>
						<td style="width: 75%;">
							<input type="text" name="mobile" style="width: 100%;" value="{{ old('mobile') }}">
							@if($errors->first('mobile'))
								<label style="color: darkred;">{{ $errors->first('mobile') }}</label>
							@endif
						</td>
					</tr>
					<tr>
						<td style="width: 25%;text-align: center;">
							<label for="email">{{ __('home.contact.email') }}</label>
						</td>
						<td style="width: 75%;">
							<input type="text" name="email" style="width: 100%;" value="{{ old('email') }}">
							@if($errors->first('email'))
								<label style="color: darkred;">{{ $errors->first('email') }}</label>
							@endif
						</td>
					</tr>
					<tr>
						<td style="width: 25%;text-align: center;">
							<label for="subject">{{ __('home.contact.subject') }}</label>
						</td>
						<td style="width: 75%;">
							<input type="text" name="subject" style="width: 100%;" value="{{ old('subject') }}">
							@if($errors->first('subject'))
								<label style="color: darkred;">{{ $errors->first('subject') }}</label>
							@endif
						</td>
					</tr>
					<tr>
						<td style="width: 25%;text-align: center;">
							<label for="message">{{ __('home.contact.message') }}</label>
						</td>
						<td style="width: 75%;">
							<textarea name="message" id="message" style="width: 100%;" rows="4" placeholder="{{ __('home.contact.message_ph') }}"></textarea>
							@if($errors->first('message'))
								<label style="color: darkred;">{{ $errors->first('message') }}</label>
							@endif
						</td>
					</tr>
					<tr style="text-align: center;">
						<td colspan="2">
							<button type="submit" class="btn-template-main">
								{{ __('home.contact.send_btn') }}
							</button>
						</td>
					</tr>
				</tbody>
	        </form>
		</table>
	</div>
	<div style="width: 10px; float: left; border-right: 2px solid #eee; height: 300px;">
	</div>
    <div style="width: 40%; float: left; margin-left: 15px; text-align: center;">
        <table border="0"" style="width: 100%; font-size: 1.2em;">
		    <tbody>
                <tr>
                	<td>
                		<h5>{{ language('Contact for Hall/Seminar Room Booking', 'হল/সেমিনার কক্ষ ভাড়া বিষয়ক তথ্যের জন্য যোগাযোগ করুন') }}</h5>
                	</td>
                </tr>
                <tr>
                	<td>
                		<strong>{{ language('Khondkar Asif Mahtab', 'খন্দকার আসিফ মাহতাব') }}</strong>
                	</td>
                </tr>
                <tr>
                	<td>
                		{{ language('Librarian (Development Wing)', 'লাইব্রেরিয়ান (ডেভেলপমেন্ট উইং)') }}
                	</td>
                </tr>
                <tr>
                	<td>
                		{{ language('Department of public library', 'গণগ্রন্থাগার অধিদপ্তর') }},
                	</td>
                </tr>
                <tr>
                	<td>
                		{!! language('10, Kazi Nazrul Islam Avenue, <br> Shahbagh, Dhaka-1000', '১০, কাজী নজরুল ইসলাম এভিনিউ, <br> শাহবাগ, ঢাকা-১০০০.') !!}
                	</td>
                </tr>  
                <tr>
                	<td>
                		{{ language('Email: librariandpl.dev@gmail.com', 'ইমেইল: librariandpl.dev@gmail.com') }}
                	</td>
                </tr>
                <tr>
                	<td>
                		{{ language('Mobile: 01716034982', 'মোবাইল: ০১৭১৬০৩৪৯৮২') }}
                	</td>
                </tr>              
                <tr>
                	<td>
                		{{ language('Phone: 0258610422', 'ফোন: ০২৫৮৬১০৪২২') }}
                	</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@stop