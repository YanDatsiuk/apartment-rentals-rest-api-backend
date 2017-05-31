<?php

namespace App\REST;

use Illuminate\Database\Eloquent\Model;

/**
 * App\REST\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\REST\AuthGroupUser[] $authGroupUsers
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\REST\AuthGroup[] $authGroups
 * @method static \Illuminate\Database\Query\Builder|\App\REST\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\REST\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\REST\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\REST\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\REST\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\REST\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\REST\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Model
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
    protected $table = 'users';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
        'name', 
		'email', 
		'password', 
		'remember_token', 
		'created_at', 
		'updated_at', 
		
    ];

    

    

	/**
     * authGroupUsers.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function authGroupUsers()
    {
        return $this->hasMany('App\REST\AuthGroupUser', 'user_id');
    }

    

	/**
     * AuthGroups.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function authGroups()
    {
        return $this->belongsToMany(
            'App\REST\AuthGroup',
            'auth_group_user',
            'user_id',
            'group_id');
    }
}
