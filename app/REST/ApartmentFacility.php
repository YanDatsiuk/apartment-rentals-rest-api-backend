<?php

namespace App\REST;

use Illuminate\Database\Eloquent\Model;

class ApartmentFacility extends Model
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
    protected $table = 'apartment_facilities';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
        'apartment_id', 
		'facility_id', 
		
    ];

    

	/**
     * apartment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function apartment()
    {
        return $this->belongsTo('App\REST\Apartment');
    }

	/**
     * facility.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function facility()
    {
        return $this->belongsTo('App\REST\Facility');
    }

    

    
}
