<div class="panel panel-primary">
    <div class="panel-heading">
        {{ trans('team.lbl-insert-position') }}
    </div>
    <div class="panel-body">
        {!! Form::open(['class' => 'form-horizontal']) !!}
            {{ Form::hidden('teamId', $teamId, ['id' => 'teamId-postion']) }}
            {{ Form::hidden('userId', $userId, ['id' => 'userId-postion']) }}
            <div class="panel-body">
                <div class="col-md-12">
                    {{ trans('team.lbl-position') }}
                </div>
                <div class="col-md-12">
                    @foreach ($positions as $key => $position)
                        <div class="col-md-6">
                            {{ Form::checkbox('position[]', $key, in_array($key, $arrPosition), ['class' => 'position' ]) }} {{ $position }}
                        </div>
                    @endforeach
                </div>

                <span class="help-block has-error">
                    <strong class="err-position"></strong>
                </span>
            </div>
            <div class="row">
                <div class="col-md-3 col-md-offset-8">
                    @if ($flag == config('setting.insert'))
                        {{ Form::button(trans('admin.btn-add'), ['class' => 'btn btn-primary', 'id' => 'btn-add-team']) }}
                    @endif

                    @if ($flag == config('setting.update'))
                        {{ Form::button(trans('admin.btn-edit'), ['class' => 'btn btn-primary ', 'id' => 'btn-update-team']) }}
                    @endif

                    @if ($flag == config('setting.delete'))
                        {{ Form::button(trans('admin.btn-delete'), ['class' => 'btn btn-primary ', 'id' => 'btn-delete-team']) }}
                    @endif
                </div>
            </div>
        {{ Form::close() }}
    </div>
</div>
