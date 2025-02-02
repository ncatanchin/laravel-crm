<?php

namespace VentureDrake\LaravelCrm\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /**
     * The table associated with the team model.
     *
     * @var string
     */
    protected $table = 'crm_teams';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id', 'personal_team',
    ];

    public function userCreated()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }

    /**
     * Get all of the users the team belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(\VentureDrake\LaravelCrm\Models\User::class, 'crm_team_user', 'crm_team_id', 'user_id');
    }
}
