@extends('layouts.backend.master')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<strong>{{ language('Hall/Seminar Room Booking Information', 'হল/সেমিনার কক্ষ বুকিং সংক্রান্ত সকল তথ্য ') }}</strong>
		@include('layouts.backend.common.backButton', [
			'url' => 'admin/booking-management'
		])
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-9">
				<table class="table table-hover">
					<tbody>
						<tr style="border-top: 0px;">
							<td><strong>{{ language('Registration No.', 'রেজিস্ট্রেশন নং') }}</strong></td>
							<td>{{ language(bntoen($booking->reg_no), entobn($booking->reg_no)) }}</td>
						</tr>
						<tr style="border-top: 0px;">
							<td><strong>{{ language('Current Status', 'বর্তমান স্ট্যাটাস') }}</strong></td>
							<td>
								@if($booking->status == 1 )
									<span class="label label-warning">Pending</span>
								@endif
								@if($booking->status == 2)
									<span class="label label-info">Being Processed</span>
								@endif
								@if($booking->status == 3)
									<span class="label label-success">Approved</span>
								@endif
								@if($booking->status == 4)
									<span class="label label-danger">Cancelled</span>
								@endif
							</td>
						</tr>
						<tr style="border-top: 0px;">
							<td><strong>{{ language('Hall/Seminar Room', 'হল/সেমিনার কক্ষ') }}</strong></td>
							<td>{{ getRoom($booking->hall_room) }}</td>
						</tr>
						<tr>
							<td><strong>{{ language('Applicant\'s Name', 'আবেদনকারীর নাম') }}</strong></td>
							<td>{{ $booking->applicant_name }}</td>
						</tr>
						<tr>
							@if($booking->id_type == 'nid')
								<td><strong>{{ language('National ID No.', 'এনআইডি নং') }}</strong></td>
							@else
								<td><strong>{{ language('Birth Certificate No.', 'জন্মনিবন্ধন নম্বর ') }}</strong></td>
							@endif
							<td>{{ $booking->nid_no }}</td>

						</tr>
						<tr>
							<td><strong>{{ language('Email Address', 'ইমেইল এড্রেস') }}</strong></td>
							<td>{{ $booking->email_address }}</td>
						</tr>
						<tr>
							<td><strong>{{ __('membership.create.mobile') }}</strong></td>
							<td>{{ $booking->mobile_no ? : '(দেয়া হয় নি )' }}</td>
						</tr>
						<tr>
							<td><strong>{{ language('Residential Address', ' যোগাযোগের ঠিকানা ') }}</strong></td>
							<td>{{ $booking->address ? : '(দেয়া হয় নি )' }}</td>
						</tr>
						<tr>
							<td><strong>{{ language('Event Reason', 'অনুষ্ঠানের উদ্দেশ্য') }}</strong></td>
							<td>{{ $booking->reason }}</td>
						</tr>
						<tr>
							<td><strong>{{ language('Event Description', 'সংক্ষিপ্ত বিবরণ') }}</strong></td>
							<td>{{ $booking->description }}</td>
						</tr>
						<tr>
							<td><strong>{{ language('No. of Guests', 'অতিথি সংখ্যা') }}</strong></td>
							<td>{{ entobn($booking->no_of_guests) .  language(' Persons', ' জন') }}</td>
						</tr>
						<tr>
							<td><strong>{{ language('Chief Guest', 'প্রধান অতিথি') }}</strong></td>
							<td>{{ $booking->chief_guest }}</td>
						</tr>
						<tr>
							<td><strong>{{ language('Main Guest', 'বিশেষ অতিথি') }}</strong></td>
							<td>{{ $booking->main_guest }}</td>
						</tr>
						<tr>
							<td><strong>{{ language('Chair of the Event', 'চেয়ার অফ দ্যা ইভেন্ট') }}</strong></td>
							<td>{{ $booking->chair_of_the_event }}</td>
						</tr>
						<tr>
							@php
								$result = '';
					            foreach($booking->schedules as $schedule){
				                    $result .= $schedule->booking_date->format('d M Y') . ', ';
				                }
							@endphp
							<td><strong>{{ language('Event Date', 'অনুষ্ঠানের তারিখ') }}</strong></td>
							<td>{{  entobn(trim($result), ', ') }}</td>
						</tr>
						<tr>
							<td><strong>{{ language('Event Time', 'অনুষ্ঠানের সময়') }}</strong></td>
							<td>{{ getBookingTime($booking->event_time) }}</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-md-3">
				<form action="{{ url('admin/booking-management/' . $booking->reg_no . '/status/update') }}" method="POST">
					{{ csrf_field() }}
					{{ method_field('PATCH') }}
					
					<div class="panel panel-default sidebar-menu" style="border: none;">
                        <div class="panel-heading">
                            <h3 class="panel-title clearfix">{{ __('membership.show.change_status') }}</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                            	<div class="checkbox">
                                    <label>
                                         <input type="radio" name="status" value="1" {{ $booking->status == 1 ? 'checked' : '' }}> {{ language('Pending', 'পেন্ডিং করুন') }}
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                         <input type="radio" name="status" value="2" {{ $booking->status == 2 ? 'checked' : '' }}> {{ language('On Process', 'প্রক্রিয়াধীন করুন') }}
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="radio" name="status" value="3" {{ $booking->status == 3 ? 'checked' : '' }}> {{ language('Approved', 'অনুমোদন করুন') }}
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="radio" name="status" value="4" {{ $booking->status == 4 ? 'checked' : '' }}> {{ language('Cancel', 'বাতিলকরণ করুন') }}
                                    </label>
                                </div>
                                
                            </div>

                            <button type="submit" class="btn btn-default btn-sm btn-template-main"><i class="fa fa-pencil"></i> {{ __('membership.show.apply_btn') }}</button>
                        </div>
                    </div>
				</form>
			</div>
		</div>
	</div>
</div>
@stop