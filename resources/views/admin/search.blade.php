@extends('layouts.backend.master')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<strong>
			{{ language('Search booking information', 'বুকিংয়ের তথ্য সার্চ করুন') }}
		</strong>
	</div>
	<div class="panel-body">
		<form action="" method="GET" class="form-inline form" role="form" style="margin-bottom: 40px;">
			<div class="form-group">
				<label class="sr-only" for="reg_no">Registration No.</label>
				<input type="text" class="form-control" id="reg_no" placeholder="{{ language('Booking Registration No.', 'বুকিং রেজিস্ট্রেশন নং') }}" name="reg_no" value="{{ Request::input('reg_no') }}">
			</div>
			<div class="form-group">
				<label class="sr-only" for="mobile_no">Mobile No.</label>
				<input type="text" class="form-control" id="mobile_no" placeholder="{{ __('membership.create.mobile') }}" name="mobile_no" value="{{ Request::input('mobile_no') }}">
			</div>
			<div class="form-group">
				<label class="sr-only" for="nid_no">NID No.</label>
				<input type="text" class="form-control" id="nid_no" placeholder="{{ __('membership.create.nid') }}" name="nid_no" value="{{ Request::input('nid_no') }}">
			</div>
			<button type="submit" class="btn btn-primary">
				<i class="fa fa-search"></i>
				{{ language('Search', 'সার্চ করুন') }}
			</button>
			<a href="{{ url('admin/search') }}" class="btn btn-danger">
				<i class="fa fa-close"></i>
				{{ language('Clear', 'ক্লিয়ার') }}
			</a>
		</form>
		@if($bookings && count($bookings) > 0)
		<hr>
		<table class="table table-hover">
			<thead>
				<tr class="active">
					<th>{{ __('adminpages.search.tables.code') }}</th>
					<th>{{ __('adminpages.search.tables.name') }}</th>
					<th>{{ __('adminpages.search.tables.mobile') }}</th>
					<th>{{ __('adminpages.search.tables.type') }}</th>
					<th>{{ __('adminpages.search.tables.status') }}</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($bookings as $booking)	
				<tr>
					<td>{{ $booking->reg_no }}</td>
					<td>{{ $booking->applicant_name }}</td>
					<td>{{ $booking->mobile_no }}</td>
					<td>{{ getRoom($booking->hall_room) }}</td>
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
			</tbody>
		</table>
		@else
			<h5 class="text-center">{{ __('adminpages.not_found') }}</h5>			
		@endif
	</div>
</div>
@stop

@section('script')
<script type="text/javascript">
	$(function() {
	   $(".form").on('submit', function() {
	      $(this).find(":input").filter(function(){ return !this.value; }).attr("disabled", "disabled");
	      
	      return true;
	    });
	});
</script>
@stop