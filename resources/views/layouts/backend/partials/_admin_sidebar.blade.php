<div class="panel panel-default sidebar-menu" style="border: none;padding-left: 18px;">
    <div class="panel-heading" style="padding-top: 10px;">
        <h2 class="panel-title clearfix">
			{{ __('adminnav.side.title') }}
        </h2>
    </div>
    <div class="panel-body">
    	<br>
    	<p class="menu-link{{ Request::segment(2) == 'dashboard' ? ' active' : '' }}">
			<strong>
				<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>&nbsp;
				<a href="{{ url('admin/dashboard') }}">{{ language('Dashboard Page', 'ড্যাশবোর্ড পাতা') }}</a>
			</strong>
		</p>
    	<p class="menu-link{{ Request::segment(2) == 'booking-management' ? ' active' : '' }}">
			<strong>
				<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>&nbsp;
				<a href="{{ url('admin/booking-management') }}">{{ language('Hall/Seminar Room Booking', 'হল/সেমিনার কক্ষ বুকিং') }}</a>
			</strong>
		</p>
		<p class="menu-link{{ Request::segment(2) == 'messages' ? ' active' : '' }}">
			<strong>
				<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>&nbsp;
				<a href="{{ url('admin/messages') }}">{{ __('adminnav.side.message') }}</a>
			</strong>
		</p>
		<p class="menu-link{{ Request::segment(2) == 'search' ? ' active' : '' }}">
			<strong>
				<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>&nbsp;
				<a href="{{ url('admin/search') }}">{{ language('Search Booking', 'বুকিং সার্চ করুন') }}</a>
			</strong>
		</p>
		<p class="menu-link{{ Request::segment(2) == 'change-password' ? ' active' : '' }}">
			<strong>
				<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>&nbsp;
				<a href="{{ url('auth/change-password') }}">{{ language('Change Password', 'পাসওয়ার্ড পরিবর্তন') }}</a>
			</strong>
		</p>
		<p class="menu-link">
			<strong>
				<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>&nbsp;
				<a href="{{ url('logout') }}">{{ __('adminnav.side.logout') }}</a>
			</strong>
		</p>
    </div>
</div>