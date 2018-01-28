@inject('schedules', 'App\Http\CalendarService')

@extends('layouts.frontend.master')

@section('style')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.css">
@endsection

@section('main-content')
<div class="column block">
	<h5 class="bk-org title">
		{{ 
		language(
			'See the available hall/seminar rooms before booking',
			'বুকিংয়ের পূর্বে কবে কোন হল/সেমিনার কক্ষের বুকিং আছে তা দেখে নিন'
		)
		}}
	</h5>
	<p>&nbsp;</p>
	<div style="width: 100%;">
		<div style="width: 78%; float: left; padding: 10px 15px;">
			<div id="calendar"></div>
		</div>
		<div style="width: 15%; float: left; padding: 10px 15px;">
			<form action="" method="GET">
				<p style="margin-bottom: 16px;">
					<select name="room" id="" style="height: 35px; font-size: 1.1em;">
						<option value="all" {{ Request::input('room') == 'all' ?'selected' : '' }}>
							{{ language('All Hall/Seminar Rooms', 'সকল হল/সেমিনার কক্ষ') }}
						</option>
						@foreach(allRoomTypes() as $key => $room)
						<option value="{{ $key }}" {{ Request::input('room') == $key ?'selected' : '' }}>
							{{ getRoom($key) }}
						</option>
						@endforeach
					</select>
				</p>
				<p style="text-align: center;">
					<input type="submit" value="{{ language('Search', 'সার্চ করুন') }}">
				</p>
			</form>
			<hr>
			<p style="margin-bottom: 10px;">
				<span class="fc-event-dot" style="background-color:#f0ad4e"></span>&nbsp;
				{{ language('Pending Bookings', 'পেন্ডিং বুকিংসমূহ') }}
			</p>
			<p style="margin-bottom: 10px;">
				<span class="fc-event-dot" style="background-color:#337ab7"></span>&nbsp;
				{{ language('On Processing Bookings', 'প্রক্রিয়াধীন বুকিংসমূহ') }}
			</p>
			<p style="margin-bottom: 10px;">
				<span class="fc-event-dot" style="background-color:#008000"></span>&nbsp;
				{{ language('Approved Bookings', 'অনুমোদিত বুকিংসমূহ') }}
			</p>
			<p>
				<span class="fc-event-dot" style="background-color:#c9302c"></span>&nbsp;
				{{ language('Cancelled Bookings', 'বাতিলকৃত বুকিংসমূহ') }}
			</p>
		</div>
	</div>
</div>
@stop

@section('script')
<script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    	$('#calendar').fullCalendar({
			height: 700,
        	contentHeight: 760,
        	defaultView: 'listWeek',
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay,listWeek'
			},
			editable: false,
			events: {!! json_encode($schedules->generate(count($schedules->generate()) ? $schedules->generate() : [] ))  !!}
		});
	});
</script>
@endsection