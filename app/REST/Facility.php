<?php

namespace App\REST;

use Illuminate\Database\Eloquent\Model;

/**
 * App\REST\Facility
 *
 * @property int $id
 * @property string|null $description
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\REST\ApartmentFacility[] $apartmentFacilities
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\REST\Apartment[] $apartments
 * @method static \Illuminate\Database\Query\Builder|\App\REST\Facility whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\REST\Facility whereId($value)
 * @mixin \Eloquent
 */
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
