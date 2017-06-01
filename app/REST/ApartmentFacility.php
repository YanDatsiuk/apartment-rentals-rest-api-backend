<?php

namespace App\REST;

use Illuminate\Database\Eloquent\Model;

/**
 * App\REST\ApartmentFacility
 *
 * @property int $id
 * @property int|null $apartment_id
 * @property int|null $facility_id
 * @property-read \App\REST\Apartment|null $apartment
 * @property-read \App\REST\Facility|null $facility
 * @method static \Illuminate\Database\Query\Builder|\App\REST\ApartmentFacility whereApartmentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\REST\ApartmentFacility whereFacilityId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\REST\ApartmentFacility whereId($value)
 * @mixin \Eloquent
 */
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
