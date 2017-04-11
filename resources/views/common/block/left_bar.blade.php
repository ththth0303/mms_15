<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>{{ trans('admin.lbl-system') }}</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
        <div class="profile_pic">
            <img src="{{ url('/Upload', Auth::user()->avatar) }}" class="img-circle profile_img">
        </div>
        <div class="profile_info">
            <span>{{ trans('user.lbl-welcome') }}</span>
            <h2>{{ Auth::user()->name }}</h2>
        </div>
    </div>
    <!-- /menu profile quick info -->
    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
            <h3>General</h3>
            <ul class="nav side-menu">
                <!-- profile users-->
                <li class="@if (Request::url() == action('Member\HomeController@index')) active @endif" >
                    <a href="{{ action('Member\HomeController@index') }}"><i class="fa fa-user"></i><span> {{ trans('public.title-detail-member') }} </span></a>
                </li>
                <!-- list teams-->
                <li class="@if (Request::url() == action('Member\HomeController@listTeam')) active @endif">
                    <a href="{{ action('Member\HomeController@listTeam') }}"><i class="fa fa-group"></i><span> {{ trans('public.title-list-team') }} </span></a>
                </li>
                <!-- change password-->
                <li class="@if (Request::url() == action('Auth\ResetPasswordController@index')) active @endif">
                    <a href="{{ action('Auth\ResetPasswordController@index') }}"><i class="fa fa-key"></i><span> {{ trans('public.title-change-password') }} </span></a>
                </li>
                @if (Auth::user()->isAdmin())
                    <!-- management users-->
                    <li class="@if (Request::url() == action('Admin\UserController@index')) active @endif ">
                        <a href="{{ action('Admin\UserController@index') }}"><i class="fa fa-users "></i><span> {{ trans('user.title-users') }} </span></a>
                    </li>
                    <!-- management teams-->
                    <li class="@if (Request::url() == action('Admin\TeamController@index')) active @endif ">
                        <a href="{{ action('Admin\TeamController@index') }}"><i class="fa fa-building-o "></i><span> {{ trans('team.title-teams') }} </span></a>
                    </li>
                    <!-- management position-->
                    <li class="@if (Request::url() == action('Admin\PositionController@index')) active @endif ">
                        <a href="{{ action('Admin\PositionController@index') }}"><i class="fa fa-map-marker"></i><span> {{ trans('position.title-positions') }} </span></a>
                    </li>
                    <!-- management skill-->
                    <li class="@if (Request::url() == action('Admin\SkillController@index')) active @endif ">
                        <a href="{{ action('Admin\SkillController@index') }}"><i class="fa fa-asterisk"></i><span> {{ trans('skill.title-skills') }} </span></a>
                    </li>
                    <!-- management projects-->
                    <li class="@if (Request::url() == action('Admin\ProjectController@index')) active @endif ">
                        <a href="{{ action('Admin\ProjectController@index') }}"><i class="fa fa-tasks"></i><span> {{ trans('admin.title-projects') }} </span></a>
                    </li>
                    <!-- management activities-->
                    <li class="@if (Request::url() == action('Admin\ActivityController@index')) active @endif ">
                        <a href="{{ action('Admin\ActivityController@index') }}"><i class="fa fa-history"></i><span> {{ trans('admin.title-activities') }} </span></a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
    </div>
    <!-- /menu footer buttons -->
  </div>
</div>
