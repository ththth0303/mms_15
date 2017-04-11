@extends('common.block.master')
<!-- title off page -->
@section('title')
    {{ trans('user.title-users') }}
@endsection
<!-- css used for page -->
<!-- content of page -->
@section('content')
    <div class="">
        <!-- title -->
        <div class="page-title">
            <div class="title_left">
                <h3> {{ trans('user.title-users') }} </h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group">
                    <div class="col-md-4">
                        <a href="{{ action('Admin\UserController@create') }}" data-toggle="tooltip" data-placement="top" title="Create member" class="btn btn-primary"><i class="fa fa-user-plus " ></i></a>
                    </div>
                    <div class="col-md-4">
                        <a href="#" class="btn btn-primary" id="import-file" data-toggle="tooltip" data-placement="top" title="Import file"><i class="glyphicon glyphicon-import" ></i></a>
                        {!! Form::open(['action' => 'Admin\UserController@importFile', 'class' => 'form-horizontal', 'id' => 'form-input-file', 'enctype' => 'multipart/form-data']) !!}
                            {{  Form::file('file', ['id' => 'file-csv', 'class' => 'hidden']) }}
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-4">
                        <a href="#" class="btn btn-primary" id="export-file" data-toggle="tooltip" data-placement="top" title="Export file"><i class="glyphicon glyphicon-export" ></i></a>
                        {!! Form::open(['action' => 'Admin\UserController@exportFile', 'class' => 'form-horizontal', 'id' => 'form-export-user', 'enctype' => 'multipart/form-data']) !!}
                            {{ Form::hidden('teamId', null, ['id' => 'teamId-export']) }}
                            {{ Form::hidden('position', null, ['id' => 'position-export']) }}
                            {{ Form::hidden('positionTeam', null, ['id' => 'positionTeam-export']) }}
                            {{ Form::hidden('type', null, ['id' => 'type-export']) }}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- end title -->
        <div class="clearfix"></div>
        <!-- form search -->
        <div class="row">
            @include('admin.user.search')
        </div>
        @include('common.messages')
        <div class="row">
            <div class="x_content">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2> {{ trans('admin.lbl-result-search') }} </h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content" id="result-users">
                                <div class="table-responsive">
                                    @include('admin.user.table_result')
                                </div>
                            </div>
                            <div class="clearfix"></div>
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
