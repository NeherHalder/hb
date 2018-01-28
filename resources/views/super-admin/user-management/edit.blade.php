@extends('layouts.backend.master')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<strong>
			{{ language('Update admin user\'s info.', 'ইউজারের তথ্য পরিবর্তন করুন') }}
		</strong>
		@include('layouts.backend.common.backButton', [
			'url' => 'super-admin/user-management'
		])
	</div>
	<div class="panel-body">
		<div class="row" style="padding: 20px;">
			<div class="col-md-12">
				<form action="{{ url('super-admin/user-management/' . $user->id) }}" method="POST" role="form">
					{{ csrf_field() }}
					{{ method_field('PATCH') }}
					<div class="row">
						<div class="col-md-6">
							<div class="form-group{{ $errors->first('name') ? ' has-error' : '' }}">
								<label for="name" class="control-label">{{ language('Full Name', 'ইউজারের নাম') }}</label>
								<input type="text" class="form-control" id="name" name="name" value="{{ old('name') ? : $user->name }}">
								@if($errors->first('name'))
									<span class="help-block">
										{{ $errors->first('name') }}
									</span>
								@endif
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group{{ $errors->first('username') ? ' has-error' : '' }}">
								<label for="username" class="control-label">{{ language('Username', 'ইউজারনেম') }}</label>
								<input type="text" class="form-control" id="username" name="username" value="{{ old('username') ? : $user->username }}">
								@if($errors->first('username'))
									<span class="help-block">
										{{ $errors->first('username') }}
									</span>
								@endif
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group{{ $errors->first('role') ? ' has-error' : '' }}">
								<label for="role">{{ language('User Type', 'ইউজার  টাইপ') }}</label>
								<select name="role" id="role" class="form-control">
									<option value="admin" {{ old('role') == 'admin' || $user->role == 'admin' ? 'selected' : '' }}>
										{{ language('Admin User', 'এডমিন ইউজার') }}
									</option>
									<option value="super-admin" {{ old('role') == 'super-admin' || $user->role == 'super-admin' ? 'selected' : '' }}>
										{{ language('Admin User', 'সুপার এডমিন ইউজার ') }}
									</option>
								</select>
							</div>
						</div>
						<div class="col-md-6 text-center">
							<div class="form-group" style="margin-top: 28px;">
								<button type="submit" class="btn btn-primary">
									{{  language('Update User', 'আপডেট ইউজার') }}
								</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@stop