@extends('layouts.backend.master')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<strong>
			{{ language('Change your login password', 'আপনার লগইন পাসওয়ার্ড পরিবর্তন করুন ') }}
		</strong>
	</div>
	<div class="panel-body">
		<div class="row" style="padding: 10px;">
			<div class="col-md-12">
				<form action="" method="POST" role="form">
					{{ csrf_field() }}

					<div class="row">
						<div class="col-md-6">
							<div class="form-group{{ $errors->first('password') ? ' has-error' : '' }}">
								<label for="password">{{ language('New Password', 'নতুন পাসওয়ার্ড') }}</label>
								<input type="password" class="form-control" id="password" name="password" />
								@if($errors->first('password'))
									<span class="help-block">
										{{ $errors->first('password') }}
									</span>
								@endif
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group{{ $errors->first('password_confirmation') ? ' has-error' : '' }}">
								<label for="password_confirmation">{{ language('Password Confirmation', 'কন্ফার্ম পাসওয়ার্ড') }}</label>
								<input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
								@if($errors->first('password_confirmation'))
									<span class="help-block">
										{{ $errors->first('password_confirmation') }}
									</span>
								@endif
							</div>
						</div>
					</div>
					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary">{{ language('Change Password', 'পাসওয়ার্ড পরিবর্তন করুন ') }}</button>					
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@stop