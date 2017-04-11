  <!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            @if (Auth::guard()->check())
                <ul class="nav navbar-nav navbar-right">
                    <li class="">
                        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <img src="{{ url('/Upload', Auth::user()->avatar) }}">{{ Auth::user()->name }}
                            <span class=" fa fa-angle-down"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-usermenu pull-right">
                            <li>
                                <a href="{{ action('Member\HomeController@index') }}"> {{ trans('user.lbl-profile')}}</a>
                            </li>
                            <li>
                                <a href="{{ action('Auth\LoginController@logout') }}" id="btn-logout">
                                    <i class="fa fa-sign-out pull-right"></i> {{ trans('admin.title-logout') }}
                                </a>
                                {!! Form::open(['action' => 'Auth\LoginController@logout', 'class' => 'form-horizontal', 'id' => 'logout-form']) !!}
                                {{ Form::close() }}
                            </li>
                        </ul>
                    </li>
                </ul>
            @endif
        </nav>
    </div>
</div>
