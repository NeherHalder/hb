<nav class="navbar navbar-default navbar-custom" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ url(Auth::user()->role == 'admin' ? 'admin' : 'super-admin/notifications') }}">
				{{ __('adminnav.top.title') }}
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<form id="lang_form" action="{{ url('language/switcher') }}" method="post" class="navbar-form navbar-right">
				{{ csrf_field() }}
				@if( \Session::has('locale') && \Session::get('locale') == 'en' )
                <input type="hidden" name="lang" id="lang"
					value="bd" />
				@else	
				<input type="hidden" name="lang" id="lang"
					value="en" />	
				@endif	
				<button type="submit" style="height: 26px; padding: 4px;" class="btn">
					{{ (\Session::has('locale') && \Session::get('locale') == 'en' ) ? 'বাংলা' : 'English' }}
				</button>
            </form>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>