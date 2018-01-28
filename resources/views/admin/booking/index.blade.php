@extends('layouts.backend.master')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<strong>{{ language('Applications for Hall/Seminar Room Booking', 'হল/সেমিনার কক্ষ বুকিংয়ের জন্য আবেদনপত্র') }}</strong>
	</div>
	<div class="panel-body">
		<form action="" method="GET" class="form-inline form" role="form">
		
			<div class="form-group" style="margin-right: 30px;">
				<select name="room" id="" class="form-control">
					<option value="">
						{{ language('Select Hall/Seminar Room', 'হল/সেমিনার কক্ষ নির্বাচন করুন') }}
					</option>
					@foreach(allRoomTypes() as $key => $value)
					<option value="{{ $key }}" {{ Request::input('room') == $key ? 'selected' : '' }}>
						{{ getRoom($key) }}
					</option>
					@endforeach
				</select>
			</div>
			<div class="form-group" style="margin-right: 30px;">
				<select name="event_time" id="event_time" class="form-control">
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
			</div>
			<div class="form-group" style="margin-right: 30px;">
				<select name="status" id="status" class="form-control">
	                <option value="">
						{{ __('adminpages.search.statuses.title') }}
					</option>
					<option value="pending" {{ Request::input('status') == 'pending' ? 'selected' : '' }}>{{ __('adminpages.search.statuses.pending') }}</option>
					<option value="processed" {{ Request::input('status') == 'processed' ? 'selected' : '' }}>{{ __('adminpages.search.statuses.processed') }}</option>
					<option value="approved" {{ Request::input('status') == 'approved' ? 'selected' : '' }}>{{ __('adminpages.search.statuses.approved') }}</option>
					<option value="cancelled" {{ Request::input('status') == 'cancelled' ? 'selected' : '' }}>{{ __('adminpages.search.statuses.cancelled') }}</option>
	            </select>
			</div>		
			<button type="submit" class="btn btn-primary btn-template-main" style="color: #fff;">
				<i class="fa fa-search"></i>{{ __('adminpages.search.search_btn') }}
			</button>
			<div class="form-group">
				<a class="btn btn-template-clear" href="{{ url('admin/booking-management') }}">
					<i class="fa fa-close"></i>
					{{ __('adminpages.search.clear_btn') }}
				</a>
			</div>
		</form>
		<hr>
		<table class="table table-hover table-bordered">
			<thead>
				<tr class="active">
					<th>{{ __('adminpages.search.tables.code') }}</th>
					<th>{{ __('adminpages.search.tables.name') }}</th>
					<th>{{ __('adminpages.search.tables.mobile') }}</th>
					<th>{{ __('adminpages.search.tables.type') }}</th>
					<th>{{ __('adminpages.search.tables.date') }}</th>
					<th>{{ __('adminpages.search.tables.status') }}</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@if(count($bookings))
					@foreach($bookings as $booking)
						<tr>
							<td>{{ $booking->reg_no }}</td>
							<td>{{ $booking->applicant_name }}</td>
							<td>{{ $booking->mobile_no }}</td>
							<td>{{ getRoom($booking->hall_room) }}</td>
							<td>{{ language(bntoen($booking->created_at->format('M d, Y')), entobn($booking->created_at->format('M d, Y'))) }}</td>
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
							<td>
								<a href="{{ url('admin/booking-management/' . $booking->reg_no) }}" class="btn btn-template-main btn-sm">
									<i class="fa fa-search"></i> {{ language('VIEW', 'বিস্তারিত') }}
								</a>
							</td>
						</tr>
					@endforeach

				@else
				<tr>
					<td colspan="6" class="text-center">
						<strong>{{ __('adminpages.not_found') }}</strong>
					</td>
				</tr>	
				@endif
			</tbody>
		</table>
		<div class="text-center">
			{{ $bookings->links() }}
		</div>
	</div>
</div>
@stop

@section('script')
<script type="text/javascript">
	$(function() {
	   $(".form").on('submit', function() {
	      $(this).find(":input").filter(function(){ return !this.value; }).attr("disabled", "disabled");
	      $(this).find(":select").filter(function(){ return !this.value; }).attr("disabled", "disabled");
	      return true;
	    });
	});
</script>
@stop