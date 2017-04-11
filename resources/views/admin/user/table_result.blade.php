<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>{{ trans('admin.lbl-stt') }}</th>
            <th>{{ trans('user.lbl-avatar') }}</th>
            <th>{{ trans('user.lbl-name') }}</th>
            <th>{{ trans('user.lbl-position') }}</th>
            <th>{{ trans('user.lbl-team') }}</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @if (!empty($members))
            @foreach ($members as $member)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>
                        <a href="{{ action('Member\HomeController@detailMember', $member->id) }}"><img src="{{ url('/Upload', $member->avatar) }}" width="70px" height="50px" /></a>
                    </td>
                    <td><a href="{{ action('Member\HomeController@detailMember', $member->id) }}">{{ $member->name }}</a></td>
                    <td>{{ $member->position->name ?: $member->position->name }}</td>
                    <td>
                        @if ($member->teamUsers)
                            @foreach ($member->teamUsers as $temUser)
                                @php
                                    $position = '';
                                @endphp
                                @if ($temUser->positions)
                                    @foreach ($temUser->positions as $positon)
                                        @php
                                            $position = $position . $positon->name . ' | ';
                                        @endphp
                                    @endforeach
                                @endif
                                <a href="#" data-toggle="tooltip" data-placement="top" title="{{ rtrim($position, ' | ') }}">{{ $temUser->team->name .  ' | ' }}</a>
                            @endforeach
                        @endif
                    </td>
                    <td>
                        <div class="col-md-6">
                            <a href ="{{ action('Admin\UserController@edit', $member->id ) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit member"><i class="fa fa-pencil-square-o"></i></a>
                        </div>
                        <div class="col-md-6">
                            {{ Form::open(['action' => 'Admin\UserController@destroy', 'class' => 'delete-form-user']) }}
                                {{ Form::hidden('userId',$member->id) }}
                                {!! Form::button(trans('admin.lbl-delete'), ['class' => 'btn btn-primary btn-delete', 'type' => 'button', 'data-toggle' => 'tooltip', 'title' => 'Delete member']) !!}
                            {{ Form::close() }}
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
@if (isset($members))
    {{ $members->links() }}
@endif
