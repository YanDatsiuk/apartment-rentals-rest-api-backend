<?php

namespace App\REST;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
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
    protected $table = 'facilities';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
        'description', 
		
    ];

    

    

	/**
     * apartmentFacilities.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function apartmentFacilities()
    {
        return $this->hasMany('App\REST\ApartmentFacility', 'facility_id');
    }

    

	/**
     * Apartments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function apartments()
    {
        return $this->belongsToMany(
            'App\REST\Apartment',
            'apartment_facilities',
            'facility_id',
            'apartment_id');
    }
}
