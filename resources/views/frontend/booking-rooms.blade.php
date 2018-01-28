@extends('layouts.frontend.master')

@section('style')
<style>
    .room-sec img{
        width: 90%;
        margin-left: 5%;
    }
    .room-sec h4{
        text-align: center;
        margin-top: 15px;
        padding: 0px;
        margin-bottom: 30px;
    }
    .room-sec h4 a { transition: all .8s; }
    .room-sec h4 a:hover { color: darkred; }
</style
@endsection

@section('main-content')
<div class="column block">
	<h5 class="bk-org title">
		{{ __('home.venues.title') }}
	</h5>
	<p>&nbsp;</p>
	<p style="margin-left: 10px;">
		<div class="room-sec">
            <a href="#"><img src="{{ asset('img/pic1.jpg') }}" alt=""/></a>
            <h4>
            	<a href="{{ url('booking-rooms/shoukot-osman') }}" title="{{ language('Details', 'বিস্তারিত') }}">
            		শওকত ওসমান স্মৃতি মিলনায়তন
            	</a>
            </h4>
        </div>
        <hr>
        <div class="room-sec">
            <a href="#"><img src="{{ asset('img/pic3.jpg') }}" alt=""/></a>
            <h4>
            	<a href="{{ url('booking-rooms/ground-floor') }}" title="{{ language('Details', 'বিস্তারিত') }}">
            		সেমিনার রুম(প্রথম তলা)
            	</a>	
            </h4>
        </div>
        <hr>
        <div class="room-sec">
            <a href="#"><img src="{{ asset('img/pic2.jpg') }}" alt=""/>
            </a>
            <h4>
            	<a href="{{ url('booking-rooms/second-floor') }}" title="{{ language('Details', 'বিস্তারিত') }}">
            		গ্রাউন্ড ফ্লোর সেমিনার রুম
            	</a>
            </h4>
        </div>
	</p>
</div>
@stop