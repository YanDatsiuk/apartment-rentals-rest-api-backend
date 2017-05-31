<?php

namespace App\REST;

use Illuminate\Database\Eloquent\Model;

class AuthGroup extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Table Name.
     *
     * @var string
     */
    protected $table = 'auth_groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',

    ];


    /**
     * authActionGroups.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function authActionGroups()
    {
        return $this->hasMany('App\REST\AuthActionGroup', 'group_id');
    }

    /**
     * authGroupUsers.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function authGroupUsers()
    {
        return $this->hasMany('App\REST\AuthGroupUser', 'group_id');
    }


    /**
     * AuthActions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function authActions()
    {
        return $this->belongsToMany(
            'App\REST\AuthAction',
            'auth_action_group',
            'group_id',
            'action_id');
    }

    /**
     * Users.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(
            'App\REST\User',
            'auth_group_user',
            'group_id',
            'user_id');
    }
}
