<div class="panel panel-default sidebar-menu" style="border: none;padding-left: 18px;">
    <div class="panel-heading" style="padding-top: 10px;">
        <h2 class="panel-title clearfix">
			{{ __('adminnav.side.title') }}
        </h2>
    </div>
    <div class="panel-body">
    	<br>
    	<p class="menu-link{{ Request::is('super-admin/dashboard') ? ' active' : '' }}">
			<strong>
				<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>&nbsp;
				<a href="{{ url('super-admin/dashboard') }}">
					{{ language('Dashboard Page', 'ড্যাশবোর্ড পাতা') }}</a>
			</strong>
		</p>
    	<p class="menu-link{{ Request::is('super-admin/notifications') ? ' active' : '' }}">
			<strong>
				<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>&nbsp;
				<a href="{{ url('super-admin/notifications') }}">
					{{ language('All Notifications', 'সকল নোটিফিকেশন') }}</a>
			</strong>
		</p>
		<p class="menu-link{{ Request::is('super-admin/administrations') ? ' active' : '' }}">
			<strong>
				<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>&nbsp;
				<a href="{{ url('super-admin/user-management') }}">
					{{ language('User Management', 'ইউজার ম্যানেজমেন্ট') }}
				</a>
			</strong>
		</p>
		<p class="menu-link{{ Request::is('super-admin/change-password') ? ' active' : '' }}">
			<strong>
				<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>&nbsp;
				<a href="{{ url('auth/change-password') }}">
					{{ language('Change Password', 'পাসওয়ার্ড পরিবর্তন') }}</a>
			</strong>
		</p>
		<p class="menu-link">
			<strong>
				<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>&nbsp;
				<a href="{{ url('logout') }}">
					{{ language('Log Out', 'লগআউট করুন') }}</a>
			</strong>
		</p>
    </div>
</div>