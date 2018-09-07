<header class="main-header">
    <!-- Logo -->
	@hasanyrole('manage_users|acl_admin|basic_manage_users')
		<a href="{{ url('/admin/home') }}" class="logo"
		   style="font-size: 16px;">
			<!-- mini logo for sidebar mini 50x50 pixels -->
			<span class="logo-mini">
			   @lang('global.global_admin_title')</span>
			<!-- logo for regular state and mobile devices -->
			<span class="logo-lg">
			   @lang('global.global_admin_title')</span>
		</a>
	@else
		<a href="#" class="logo"
		   style="font-size: 16px;">
			<!-- mini logo for sidebar mini 50x50 pixels -->
			<span class="logo-mini">
			   @lang('global.global_admin_title')</span>
			<!-- logo for regular state and mobile devices -->
			<span class="logo-lg">
			   @lang('global.global_admin_title')</span>
		</a>
	@endhasanyrole
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>



        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{Auth::user()->name}}</span>
                        <i style="padding-left: 5px;" class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li style="height: 75px;" class="user-header">
                            <p>
                                {!! Auth::user()->name !!}
                                <small>Member since {!! Auth::user()->created_at->format('M. Y') !!}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div>
                                <a href="{!! url('/logout') !!}" class="btn btn-default btn-flat"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Sign out
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

</header>


