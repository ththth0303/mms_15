<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'team_id',
    ];

    public function positions()
    {
        return $this->belongsToMany(Position::class, 'position_teams')->withTimestamps();
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_teams')->withPivot('is_leader')->withTimestamps();
    }

    public function projectTeams()
    {
        return $this->hasMany(ProjectTeam::class);
    }

    public function positionTeams()
    {
        return $this->hasMany(PositionTeam::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function scopeGetTeam($query, $teamId)
    {
        return $query->where('team_id', $teamId);
    }

    public function scopeGetUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    public function scopeTeamUserId($query, $teamUserId)
    {
        return $query->whereIn('id', $teamUserId);
    }
}
