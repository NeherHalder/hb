@extends('layouts.backend.master')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<strong>{{ $message->subject }}</strong>
		@include('layouts.backend.common.backButton', [
			'url' => 'admin/messages'
		])
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-9">
				<p>
					{{ $message->name }} {{ language('Wrote', 'লিখেছেন') }}, 
					<small class="text-muted">{{ language($message->created_at->diffForHumans(), entobn($message->created_at->diffForHumans())) }}
				</p>
				<p style="font-size: 1.4em; margin-top: 30px;">
					{!! nl2br($message->message) !!}
				</p>
			</div>
			<div class="col-md-3">
				<ul class="list-unstyled">
					<li class="text-center">
						<strong>{{ __('adminpages.messages.table.name') }}</strong><br>
						{{ $message->name }}
					</li>
					<li class="text-center" style="margin-top: 20px;">
						<strong>{{ __('adminpages.messages.table.mobile') }}</strong><br>
						{{ $message->mobile }}
					</li>
					@if($message->email)
					<li class="text-center" style="margin-top: 20px;">
						<strong>{{ __('adminpages.messages.table.email') }}</strong><br>
						{{ $message->email }}
					</li>
					@endif
					<li class="text-center" style="margin-top: 20px;">
						<a class="btn btn-primary btn-template-main" data-toggle="modal" href="#send-{{ $message->id }}">
						    <i class="fa fa-envelope"></i>
							{{ __('home.contact.send_btn') }}
						</a>
						<div class="modal fade" id="send-{{ $message->id }}">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title">
											{{ $message->name }} ({{ language($message->mobile, entobn($message->mobile)) }})
										</h4>
									</div>
									<form method="POST" action="{{ url('admin/messages/reply') }}">
									{{ csrf_field() }}	
									<input type="hidden" name="mobile" value="{{ bntoen($message->mobile) }}">
									<div class="modal-body">
										<div class="form-group">
											<textarea name="message" cols="30" rows="10" class="form-control" placeholder="আপনার বার্তা টাইপ করুন" required></textarea>
										</div>
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary">এসএমএস সেন্ড করুন</button>
									</div>
									</form>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
@stop