<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Models\Team;
use App\Models\TeamUser;
use App\Models\ProjectTeam;
use App\Helpers\Library;
use App\Models\Activity;
use Auth;
use DB;

class HomeController extends Controller
{
    protected $user;
    protected $activity;
    protected $library;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        User $user,
        Activity $activity,
        Library $library,
        TeamUser $teamUser
    ) {
        $this->user = $user;
        $this->activity = $activity;
        $this->library = $library;
        $this->teamUser = $teamUser;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $user = $this->user->with('skills', 'position')->findOrFail($userId);
        $teamUsers = $this->teamUser->with('team', 'user', 'positions')->where('team_users.user_id', $userId)->get();
        $teamUserIds = $teamUsers->pluck('id')->all();
        $projects = ProjectTeam::with('teamUser.team', 'project')->whereIn('team_user_id', $teamUserIds)->get();
        $positions = $this->library->getPositions();

        return view('public.index', compact('user', 'teamUsers', 'projects', 'positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listTeam()
    {
        $teams = Team::with('leader')->paginate(15);
        return view('public.list_team', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listMember($teamId)
    {
        $nameTeam = Team::findOrFail($teamId)->pluck('name')->all();
        $members = $this->teamUser->with('positions', 'user')->where('team_users.team_id', $teamId)->paginate(15);

        return view('public.list_member', compact('members', 'nameTeam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detailMember($userId)
    {
        $user = $this->user->with('skills', 'position')->findOrFail($userId);
        $teamUsers = $this->teamUser->with('team', 'user', 'positions')->where('team_users.user_id', $userId)->get();
        $teamUserId = $teamUsers->pluck('id')->all();
        $projects = ProjectTeam::with('teamUser.team', 'project')->whereIn('team_user_id', $teamUserId)->get();
        $positions = $this->library->getPositions();

        return view('public.index', compact('user', 'teamUsers', 'projects', 'positions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = $this->user->find($request->userId);
            $input = $request->only('name', 'email', 'birthday', 'role');
            $input['id'] = $user->id;

            if (isset($request->file)) {
                $this->library->deleteFile($user->avatar);
                $input['avatar'] = $this->library->importFile($request->file);
            }

            $user->position()->associate($request->position);
            $user->update($input);
            $this->activity->insertActivities($user, 'update');
            $request->session()->flash('success', trans('user.msg.update-success'));
            DB::commit();

            return redirect()->action('Member\HomeController@detailMember', $user->id);
        } catch (\Exception $e) {
            $request->session()->flash('fail', trans('user.msg.update-fail'));
            DB::rollback();

            return redirect()->action('Member\HomeController@detailMember', $user->id);
        }
    }
}
