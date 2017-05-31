<?php

namespace App\REST;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
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
    protected $table = 'buildings';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
        'manager_id', 
		'short_name', 
		'full_name', 
		'description', 
		'address', 
		
    ];

    

	/**
     * manager.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function manager()
    {
        return $this->belongsTo('App\REST\User');
    }

    

	/**
     * apartments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function apartments()
    {
        return $this->hasMany('App\REST\Apartment', 'building_id');
    }

    

	/**
     * ApartmentTypes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function apartmentTypes()
    {
        return $this->belongsToMany(
            'App\REST\ApartmentType',
            'apartments',
            'building_id',
            'type_id');
    }
}
