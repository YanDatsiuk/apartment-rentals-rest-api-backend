<?php

namespace App\REST;

use Illuminate\Database\Eloquent\Model;

/**
 * App\REST\Apartment
 *
 * @property int $id
 * @property int|null $building_id
 * @property int|null $type_id
 * @property int|null $bathroom_quantity
 * @property int|null $bedroom_quantity
 * @property int|null $room_quantity
 * @property string|null $description
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\REST\ApartmentFacility[] $apartmentFacilities
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\REST\Booking[] $bookings
 * @property-read \App\REST\Building|null $building
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\REST\Facility[] $facilities
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\REST\Status[] $statuses
 * @property-read \App\REST\ApartmentType|null $type
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\REST\User[] $users
 * @method static \Illuminate\Database\Query\Builder|\App\REST\Apartment whereBathroomQuantity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\REST\Apartment whereBedroomQuantity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\REST\Apartment whereBuildingId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\REST\Apartment whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\REST\Apartment whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\REST\Apartment whereRoomQuantity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\REST\Apartment whereTypeId($value)
 * @mixin \Eloquent
 */
class Apartment extends Model
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
    protected $table = 'apartments';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
        'building_id', 
		'type_id', 
		'bathroom_quantity', 
		'bedroom_quantity', 
		'room_quantity', 
		'description', 
		
    ];

    

	/**
     * building.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function building()
    {
        return $this->belongsTo('App\REST\Building');
    }

	/**
     * type.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo('App\REST\ApartmentType');
    }

    

	/**
     * apartmentFacilities.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function apartmentFacilities()
    {
        return $this->hasMany('App\REST\ApartmentFacility', 'apartment_id');
    }

	/**
     * bookings.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookings()
    {
        return $this->hasMany('App\REST\Booking', 'appartment_id');
    }

    

	/**
     * Facilities.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function facilities()
    {
        return $this->belongsToMany(
            'App\REST\Facility',
            'apartment_facilities',
            'apartment_id',
            'facility_id');
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
            'bookings',
            'appartment_id',
            'guest_id');
    }

	/**
     * Statuses.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function statuses()
    {
        return $this->belongsToMany(
            'App\REST\Status',
            'bookings',
            'appartment_id',
            'status_id');
    }
}
