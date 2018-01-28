@inject('bookings', 'App\Http\Services\BookingService')
@inject('statuses', 'App\Http\Services\BookingStatusService')
@inject('times', 'App\Http\Services\BookingTimeService')

@extends('layouts.backend.master')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<strong>Super Administration Dashboard</strong>
	</div>
	<div class="panel-body">
		<div class="row" style="padding: 10px;">
			<div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>
                            {{ entobn(array_sum(array_values($bookings->get()))) }}
                        </h3>
                        <p>
                            বুকিং
                        </p>
                    </div>
                    <div class="icon" style="top: 0px; border: none; right: 12px;">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        সর্বমোট বুকিং <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            {{ entobn(array_key_exists('shoukot-osman', $bookings->get()) ? $bookings->get()['shoukot-osman'] : 0) }}
                        </h3>
                        <p>
                            বুকিং
                        </p>
                    </div>
                    <div class="icon" style="top: 0px; border: none; right: 12px;">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        শওকত ওসমান স্মৃতি মিলনায়তন <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>
                            {{ entobn(array_key_exists('second-floor', $bookings->get()) ? $bookings->get()['second-floor'] : 0) }}
                        </h3>
                        <p>
                            বুকিং
                        </p>
                    </div>
                    <div class="icon" style="top: 0px; border: none; right: 12px;">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        দ্বিতীয় তলা সেমিনার কক্ষ <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>
                            {{ entobn(array_key_exists('ground-floor', $bookings->get()) ? $bookings->get()['ground-floor'] : 0) }}
                        </h3>
                        <p>
                            বুকিং
                        </p>
                    </div>
                    <div class="icon" style="top: 0px; border: none; right: 12px;">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ url('admin/booking-management?room=ground-floor') }}" class="small-box-footer">
                        নীচতলা সেমিনার কক্ষ <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
		</div>
		<div class="row" style="padding: 10px;">
			<div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>
                            {{ entobn(array_key_exists('3', $statuses->get()) ? $statuses->get()['3'] : 0) }}
                        </h3>
                        <p>
                            বুকিং
                        </p>
                    </div>
                    <div class="icon" style="top: 0px; border: none; right: 12px;">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        অনুমোদিত আবেদনপত্র <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            {{ entobn(array_key_exists('2', $statuses->get()) ? $statuses->get()['2'] : 0) }}
                        </h3>
                        <p>
                            বুকিং
                        </p>
                    </div>
                    <div class="icon" style="top: 0px; border: none; right: 12px;">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        প্রক্রিয়াধীন আবেদনপত্র <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>
                            {{ entobn(array_key_exists('1', $statuses->get()) ? $statuses->get()['1'] : 0) }}
                        </h3>
                        <p>
                            বুকিং
                        </p>
                    </div>
                    <div class="icon" style="top: 0px; border: none; right: 12px;">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        পেন্ডিং আবেদনপত্র <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>
                            {{ entobn(array_key_exists('4', $statuses->get()) ? $statuses->get()['4'] : 0) }}
                        </h3>
                        <p>
                            বুকিং
                        </p>
                    </div>
                    <div class="icon" style="top: 0px; border: none; right: 12px;">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        বাতিলকৃত আবেদনপত্র <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
        </div>
        <div class="row" style="padding: 10px;">
			<div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>
                            {{ entobn(array_key_exists('full-day', $times->get()) ? $times->get()['full-day'] : 0) }}
                        </h3>
                        <p>
                            বুকিং
                        </p>
                    </div>
                    <div class="icon" style="top: 0px; border: none; right: 12px;">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        পূর্ণ দিবস বুকিংসমূহ <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            {{ entobn(array_key_exists('half-mor', $times->get()) ? $times->get()['half-mor'] : 0) }}
                        </h3>
                        <p>
                            বুকিং
                        </p>
                    </div>
                    <div class="icon" style="top: 0px; border: none; right: 12px;">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        অর্ধ দিবস (সকাল) <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            {{ entobn(array_key_exists('half-eve', $times->get()) ? $times->get()['half-eve'] : 0) }}
                        </h3>
                        <p>
                            বুকিং
                        </p>
                    </div>
                    <div class="icon" style="top: 0px; border: none; right: 12px;">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        অর্ধ দিবস (বিকাল)<i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
        </div>
	</div>
</div>
@stop