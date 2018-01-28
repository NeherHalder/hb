@extends('layouts.backend.master')

@section('style')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css">
@stop

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<strong>
			{{ language('Notifications Page', 'নোটিফিকেশনের পেজ') }}
		</strong>
	</div>
	<div class="panel-body">
		<div class="row" style="padding: 10px;">
			<div class="col-md-12">
				<form method="GET" action="">
					<ul class="list-inline list-unstyled pull-right">
						<li>
							<div class="form-group">
								<input type="text" class="form-control datepicker" name="start" value="{{ Request::input('start') ? : date('Y-m-d') }}">
							</div>
						</li>
						<li>
							{{ language('TO', 'হইতে') }}
						</li>
						<li>
							<div class="form-group">
								<input type="text" class="form-control datepicker" name="end" value="{{ Request::input('end') ? : date('Y-m-d') }}">
							</div>
						</li>
						<li>
							<button class="btn btn-template-main" type="submit">
								<i class="fa fa-search"></i> {{ language('SEARCH', 'সার্চ') }}
							</button>
						</li>
					</ul>
				</form>

				<table class="table table-hover table-bordered">
					<thead>
						<tr class="active">
							<th class="text-center"></th>
							<th style="width: 75%;" class="text-center">
								{{ language('Notification Message', 'নোটিফিকেশন মেসেজ') }}</th>
							<th class="text-center">
								{{ language('Notification Date', 'নোটিফিকেশনের তারিখ') }}
							</th>
						</tr>
					</thead>
					<tbody>
						@if(count($notifications))
							@foreach($notifications as $key => $notification)
								<tr>
									<td class="text-center">{{ language($key + 1, entobn($key + 1)) }}</td>
									<td>
										<a href="{{ url('super-admin/notifications/' . json_decode($notification->data)->reg_no) }}"> {{ entobn(json_decode($notification->data)->reg_no) }} </a>
										{!! json_decode($notification->data)->message !!}
									</td>
									<td class="text-center">
										@php
											$date = \Carbon\Carbon::parse($notification->created_at);
										@endphp
										{{ language($date->diffForHumans(), entobn($date->diffForHumans())) }}
									</td>
								</tr>
							@endforeach
						@else
							<tr>
								<td colspan="3">
									<h4 class="text-muted text-center">
										{{ language('No notification was found in the selected dates.', 'সিলেক্ট করা তারিখের মধ্যে কোনো নোটিফিকেশন খুঁজে পাওয়া যায় নি ') }}
									</h4>
								</td>
							</tr>	
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@stop

@section('script')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<script>
	$( function() {
	    $( ".datepicker" ).datepicker({
	    	format: 'yyyy-mm-dd'
	    });
	});
</script>
@stop