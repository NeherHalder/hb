<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>
		@if(Auth::check())
		 {{ Auth::user()->role == 'admin' ? 'Admin' : 'Super Admin' }} Area ({{ Auth::user()->name }})
		@else
			Hall Booking | {{config('app.name')}}
		@endif
	</title>
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" href="{{ asset('css/theme.css') }}">
	<script src="{{ asset('js/jquery.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<style>
		.menu-link a, 
		.menu-link i {
			color: #4caf50;
		}
		.menu-link.active a,
		.menu-link.active i {
			color: #bf5329;
		}
		.btn-template-main {
		    color: #4caf50;
		    background-color: #ffffff;
		    border-color: #4caf50;
		    transition: all .8s;
		}
		.btn-template-main:hover {
		    color: #4caf50;
		    background-color: #ffffff;
		    border-color: #327334;
		}
		.btn-template-clear {
		    color: #c0392b;
		    background-color: #ffffff;
		    border-color: #e74c3c;
		    transition: all .8s;
		}
		.btn-template-clear:hover {
		    color: #c0392b;
		    background-color: #ffffff;
		    border-color: #c0392b;
		}
		/* pagination */
		.pagination {
		  margin: 20px 0;
		  font-family: "Roboto", Helvetica, Arial, sans-serif;
		  border-radius: 0;
		}
		.pagination > li > a,
		.pagination > li > span {
		  padding: 6px 12px;
		  line-height: 1.42857143;
		  text-decoration: none;
		  color: #4caf50;
		  background-color: #ffffff;
		  border: 1px solid #dddddd;
		}
		.pagination > li > a:hover,
		.pagination > li > span:hover,
		.pagination > li > a:focus,
		.pagination > li > span:focus {
		  color: #4caf50;
		  background-color: #a7dbe5;
		  border-color: #dddddd;
		}
		.pagination > .active > a,
		.pagination > .active > span,
		.pagination > .active > a:hover,
		.pagination > .active > span:hover,
		.pagination > .active > a:focus,
		.pagination > .active > span:focus {
		  z-index: 2;
		  color: #ffffff;
		  background-color: #4caf50;
		  border-color: #4caf50;
		}
		.pagination > .disabled > span,
		.pagination > .disabled > span:hover,
		.pagination > .disabled > span:focus,
		.pagination > .disabled > a,
		.pagination > .disabled > a:hover,
		.pagination > .disabled > a:focus {
		  color: #999999;
		  background-color: #ffffff;
		  border-color: #dddddd;
		}
		.bg-green {
			background-color: #4caf50;
			color: #fff;
		}
	</style>
	@yield('style')
</head>
<body>
	
	@include('layouts.backend.partials._navbar')

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">
				@include("layouts.backend.partials._" . Auth::user()->role . "_sidebar")
			</div>
			<div class="col-md-9">
				@if(Session::has('success'))
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>{{ Session::get('success') }}</strong>
				</div>
				@endif
				@if(Session::has('error'))
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>{{ Session::get('error') }}</strong>
				</div>
				@endif
				@yield('content')	
			</div>
		</div>
	</div>
	
	<script>
		$(function(){
			$('.alert').delay(7000).fadeOut(750);
		});
	</script>

	@yield('script')
</body>
</html>