@inject('request', 'Illuminate\Http\Request')
<li class="{{ $request->segment(2) == 'home' || $request->segment(2) == '' ? 'active' : '' }}">
    <a href="{{ url('/home') }}">
        <i class="fa fa-home"></i>
        <span class="title">@lang('global.app_dashboard')</span>
    </a>
</li>

@if(Auth::user()->hasAnyPermission(['manage_users', 'basic_manage_users']))
    <li class="treeview">
        <a href="#">
            <i class="fa fa-users"></i>
            <span class="title">@lang('global.user-management.title')</span>
            <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
        </a>
        <ul class="treeview-menu">

	@can('manage_users')
            <li class="{{ $request->segment(2) == 'permissions' ? 'active active-sub' : '' }}">
                <a href="{{ route('admin.permissions.index') }}">
                    <i class="fa fa-briefcase"></i>
                    <span class="title">
                                @lang('global.permissions.title')
                            </span>
                </a>
            </li>
            <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                <a href="{{ route('admin.roles.index') }}">
                    <i class="fa fa-briefcase"></i>
                    <span class="title">
                                @lang('global.roles.title')
                            </span>
                </a>
            </li>
	@endcan
            <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                <a href="{{ route('admin.users.index') }}">
                    <i class="fa fa-user"></i>
                    <span class="title">
                                @lang('global.users.title')
                            </span>
                </a>
            </li>
        </ul>
    </li>
@endif

@can('dwsync_create_project', 'dwsync_sync_data', 'dwsync_see_data', 'dwsync_create_project')
	@if(View::exists('dwsync::dwsync_menu'))
		@include('dwsync::dwsync_menu')
	@endif
@endcan
@hasanyrole('manage_users|acl_admin|basic_manage_users')
<li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
    <a href="{{ route('auth.change_password') }}">
        <i class="fa fa-key"></i>
        <span class="title">Change password</span>
    </a>
</li>
@endhasanyrole

{{--<li>--}}
{{--<a href="#logout" onclick="$('#logout').submit();">--}}
{{--<i class="fa fa-arrow-left"></i>--}}
{{--<span class="title">@lang('global.app_logout')</span>--}}
{{--</a>--}}
{{--</li>--}}

{{--{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}--}}
{{--<button type="submit">@lang('global.logout')</button>--}}
{{--{!! Form::close() !!}--}}
@can('core_view_unreleased')
    <li class="{{ $request->segment(2) == 'generator_builder' ? 'active active-sub' : '' }}">
        <a href="{{ route('generator') }}">
            <i class="fa fa-user"></i>
            <span class="title">@lang('CRUD Generator')</span>
        </a>
    </li>
    <li class="{{ $request->segment(2) == 'settings' ? 'active active-sub' : '' }}">
    <li class="{{ Request::is('settings*') ? 'active' : '' }}">
        <a href="{!! route('admin.settings.index') !!}"><i class="fa fa-edit"></i><span>Settings</span></a>
    </li>
    </li>
@endcan
