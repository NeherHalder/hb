@extends('layouts.backend.master')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<strong>
			{{ language('User Management Page', 'ইউজার ম্যানেজমেন্ট পেজ') }}
		</strong>
		<a href="{{ url('super-admin/user-management/create') }}" 
			class="btn btn-sm btn-template-main pull-right"
			style="margin-top: -4px;" 
		>
			<i class="fa fa-plus"></i> {{ language('New User', 'নতুন ইউজার') }}
		</a>
	</div>
	<div class="panel-body">
		<div class="row" style="padding: 20px;">
			<table class="table table-hover table-bordered">
				<thead>
					<tr class="active">
						<th>ইউজারের নাম</th>
						<th>ইউজারনেম</th>
						<th>ইউজারের টাইপ</th>
						<th>বর্তমান স্ট্যাটাস</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@if(count($users))
						@foreach($users as $user)
						<tr>
							<td>{{ $user->name }}</td>
							<td>{{ $user->username }}</td>
							<td>
								@if($user->role == 'super-admin')
									{{ language('Super Admin', 'সুপার অ্যাডমিন') }}
								@else
									{{ language('Admin', 'অ্যাডমিন') }}
								@endif
							</td>
							<td>
								@if($user->active)
									<span class="label label-primary">{{ language('Active', 'একটিভ আছে') }}</span>
								@else
									<span class="label label-danger">{{ language('Not Active', 'একটিভ নেই') }}</span>
								@endif
							</td>
							<td>
								<a href="{{ url('super-admin/user-management/' . $user->id . '/edit') }}" class="btn btn-info btn-xs" title="{{ language('Edit User', 'এডিট ইউজার') }}">
									<i class="fa fa-edit"></i>
								</a>
								<a data-toggle="modal" href="#modal-{{ $user->id }}" class="btn btn-xs btn-{{ $user->active ? 'danger' : 'primary' }}" title="{{ language('Change Status', 'স্ট্যাটাস পরিবর্তন') }}">
									@if($user->active)
										<i class="fa fa-close"></i>
									@else
										<i class="fa fa-check"></i>
									@endif	
								</a>
								<div class="modal fade" id="modal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<form method="post" action="{{ url('super-admin/user-management/status/' . $user->id) }}">
									{{ csrf_field() }}
									{{ method_field('PATCH') }}	
								    <div class="modal-dialog">
								      <div class="modal-content panel-danger">
								        <div class="modal-header panel-heading">
								          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								          <h4 class="modal-title">
											{{ language("Are you sure to change status of this user", "আপনি কি এই ইউজারের স্ট্যাটাস পরিবর্তন করতে চান?") }}
								          </h4>
								        </div>
								        <div class="modal-footer">
								          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								          <button type="submit" class="btn btn-primary">পরিবর্তন করুন</button>
								        </div>
								      </div><!-- /.modal-content -->
								    </div><!-- /.modal-dialog -->
								    </form>
								</div><!-- /.modal -->
							</td>
						</tr>
						@endforeach
					@else
						<tr>
							<td colspan="5">
								{{ language(
									'No result was found', 
									'কোনো সার্চ রেজাল্ট খুঁজে পাওয়া যায় নি |'
								) }}
							</td>
						</tr>	
					@endif
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop