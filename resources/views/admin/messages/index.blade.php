@extends('layouts.backend.master')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<strong>{{ language('Messages sent by Library Members', 'সদস্যবৃন্দের পাঠানো বার্তাসমূহের লিস্ট') }}</strong>
	</div>
	<div class="panel-body">
		<ul class="list-inline pull-right">
			<li>
				<a href="{{ url('admin/messages?type=all') }}" class="btn btn-success btn-sm">
					{{ language('All', 'সকল বার্তা') }} ({{ count($messages) ? 
					language($messages->count(), 
					entobn($messages->count())) : '0' }})
				</a>
			</li>
			<li>
				<a href="{{ url('admin/messages?type=read') }}" class="btn btn-info btn-sm">
					{{ language('Read', 'পঠিত বার্তা') }} ({{ count($messages) ? 
					language($messages->where('read', true)->count(), 
					entobn($messages->where('read', true)->count())) : '0' }})
				</a>
			</li>
			<li>
				<a href="{{ url('admin/messages?type=unread') }}" class="btn btn-danger btn-sm">
					{{ language('Unread', 'অপঠিত বার্তা') }} ({{ count($messages) ? 
					language($messages->where('read', false)->count(), 
					entobn($messages->where('read', false)->count())) : '0' }})
				</a>
			</li>
		</ul>
		<table class="table table-hover">
			<thead>
				<tr class="active">
					<th>{{ __('adminpages.messages.table.name') }}</th>
					<th>{{ __('adminpages.messages.table.mobile') }}</th>
					<th>{{ __('adminpages.messages.table.subject') }}</th>
					<th>{{ __('adminpages.messages.table.date') }}</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@if(count($messages))
					@foreach($messages as $message)
						<tr>
							<td>{{ $message->name }}</td>
							<td>{{ $message->mobile }}</td>
							<td>{{ str_limit($message->subject, 45, '...') }}</td>
							<td>{{ language($message->created_at->diffForHumans(), entobn($message->created_at->diffForHumans())) }}</td>
							<td>
								<ul class="list-inline">
									<li>
										@if($message->read)
											<i class="fa fa-check text-success"></i>
										@else
											<i class="fa fa-bell text-warning"></i>
										@endif
									</li>
									<li>
										<a href="{{ url('admin/messages/' . $message->id) }}" title="বার্তাটি পড়ুন">
											<i class="fa fa-search-plus text-info"></i>
										</a>
									</li>
									<li>
										<a data-toggle="modal" href="#modal-{{ $message->id }}" title="মুছে ফেলুন">
											<i class="fa fa-close text-danger"></i>
										</a>
										<div class="modal fade" id="modal-{{ $message->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<form method="post" action="{{ url('admin/messages/' . $message->id) }}">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}	
										    <div class="modal-dialog">
										      <div class="modal-content panel-danger">
										        <div class="modal-header panel-heading">
										          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										          <h4 class="modal-title">
													{{ language("Are you sure to delete this message", "আপনি কি এই বার্তাটি মুছে ফেলতে চান?") }}
										          </h4>
										        </div>
										        <div class="modal-footer">
										          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										          <button type="submit" class="btn btn-primary">ডিলিট করুন</button>
										        </div>
										      </div><!-- /.modal-content -->
										    </div><!-- /.modal-dialog -->
										    </form>
										</div><!-- /.modal -->
									</li>
								</ul>
							</td>
						</tr>
					@endforeach
				@else
				<tr>
					<td colspan="6" class="text-center">
						<strong>{{ __('adminpages.not_found') }}</strong>
					</td>
				</tr>	
				@endif
			</tbody>
		</table>
		<div class="text-center">
			{{ $messages->links() }}
		</div>
	</div>
</div>
@stop

@section('script')
<script type="text/javascript">
	$(function() {
	   $(".form").on('submit', function() {
	      $(this).find(":input").filter(function(){ return !this.value; }).attr("disabled", "disabled");
	      $(this).find(":select").filter(function(){ return !this.value; }).attr("disabled", "disabled");
	      return true;
	    });
	});
</script>
@stop