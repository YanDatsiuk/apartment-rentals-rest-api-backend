<?php

namespace App\REST;

use Illuminate\Database\Eloquent\Model;

class ApartmentType extends Model
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
    protected $table = 'apartment_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',

    ];


    /**
     * apartments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function apartments()
    {
        return $this->hasMany('App\REST\Apartment', 'type_id');
    }


    /**
     * Buildings.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function buildings()
    {
        return $this->belongsToMany(
            'App\REST\Building',
            'apartments',
            'type_id',
            'building_id');
    }
}
