@extends('layouts.frontend.master')

@section('main-content')
<div class="column block">
	<h5 class="bk-org title">
		আপনার আবেদনপত্রটি গ্রহণ করা হলো |
	</h5>
	<p style="text-align: center;margin-top: 40px; font-size: 1.3em;margin-bottom: 20px;">
		<a href="#" target="_blank"><strong>চালান কপি প্রিন্ট করুন</strong></a>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="{{ route('printChalan', [$booking]) }}" target="_blank"><strong>পে স্লিপ প্রিন্ট করুন</strong></a>
	</p>
</div>
@stop