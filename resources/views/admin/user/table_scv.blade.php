@extends('common.block.master')
<!-- title off page -->
@section('title')
    {{ trans('user.title-insert-users') }}
@endsection
<!-- css used for page -->
<!-- content of page -->
@section('content')
     <div class="">
        <!-- title -->
        <div class="page-title">
            <div class="title_left">
                <h3>{{ trans('user.title-users') }}</h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group">
                    <div class="col-md-4">
                       <a href="#" class="btn btn-primary" id="add-user"><i class="fa fa-user-plus " ></i></a>
                        {{ Form::open(['action' => 'Admin\UserController@saveImport', 'id' => 'form-save-user']) }}
                            {{ Form::hidden('nameFile',$nameFile) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- end title -->
        <div class="clearfix"></div>
        <!-- form search -->
        <div class="row">
            <div class="x_content">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2> {{ trans('user.lbl-data-import') }} </h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                    <div class="table-responsive" id ="result-users">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ trans('admin.lbl-stt') }}</th>
                                                <th>{{ trans('user.lbl-name') }}</th>
                                                <th>{{ trans('user.lbl-email') }}</th>
                                                <th>{{ trans('user.lbl-birthday') }}</th>
                                                <th>{{ trans('user.lbl-role') }}</th>
                                                <th>{{ trans('user.lbl-position') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (isset($members))
                                                @foreach ($members as $user)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ $user->birthday }}</td>
                                                        <td>{{ ($user->role) ? trans('admin.lbl-admin') : trans('admin.lbl-user') }}</td>
                                                        <td>{{ $user->position }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- js used for page -->
@section('contentJs')
    @parent
    {{ Html::script('/admin/js/user.js') }}
    <!-- add trans and action used in file user.js -->
    @include('library.user_trans_javascript')
@endsection

