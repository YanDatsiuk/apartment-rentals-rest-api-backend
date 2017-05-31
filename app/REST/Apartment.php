<?php

namespace App\REST;

use Illuminate\Database\Eloquent\Model;

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
     * BookingStatuses.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function bookingStatuses()
    {
        return $this->belongsToMany(
            'App\REST\BookingStatus',
            'bookings',
            'appartment_id',
            'status_id');
    }
}
