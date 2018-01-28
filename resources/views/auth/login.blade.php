@extends('layouts.frontend.master')

@section('main-content')
	<div class="column block">
		<h5 class="bk-org title">
			{{ __('auth.title') }}
		</h5>
		<p>&nbsp;</p>
		
		<form action="{{ url('login') }}" method="POST" style="margin-left: 20px;">
			{{ csrf_field() }}
			<table border="0">
				<tbody>
					<tr>
						<td style="width: 25%;text-align: right;">{{ __('auth.login.username') }}</td>
						<td style="width: 75%;">
							<input type="text" name="username" style="width: 350px;" required value="{{ old('username') }}">
							@if($errors->first('username'))
							<p style="font-style: italic; color: darkred;">
								{{ __('auth.failed') }}
							</p>
							@endif
						</td>
					</tr>
					<tr>
						<td style="width: 25%;text-align: right;">
							{{ __('auth.login.password') }}
						</td>
						<td style="width: 75%;">
							<input type="password" name="password" style="width: 350px;" required>
						</td>
					</tr>
					<tr>
						<td style="width: 25%;text-align: right;"></td>
						<td style="width: 75%;">
							<input type="submit" value="{{ __('auth.login.submit') }}">
						</td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
@stop