<div class="col-md-12">
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="hidden"></th>
                    <th >{{ trans('team.lbl-stt') }}</th>
                    <th >{{ trans('team.lbl-name') }}</th>
                    <th >{{ trans('team.lbl-position') }}</th>
                    <th ></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($positionTeams as $positionTeam)
                @if($positionTeam->team)
                    <tr>
                        <td class="hidden teamId">{{ $positionTeam->team->id }}</td>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $positionTeam->team->name }}</td>
                        <td>
                            @foreach ($positionTeam->positions as $positon)
                                {{ $positon->name . ' | ' }}
                            @endforeach
                        </td>
                        <td>
                            <div class="col-md-6">
                                {!! Form::button(trans('admin.lbl-edit'), ['class' => 'btn btn-primary btn-edit-team', 'id' => '']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::button(trans('admin.lbl-delete'), ['class' => 'btn btn-primary btn-delete-team', 'id' => '']) !!}
                            </div>
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
</div>
