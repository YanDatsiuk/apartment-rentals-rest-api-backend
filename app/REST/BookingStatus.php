<?php

namespace App\REST;

use Illuminate\Database\Eloquent\Model;

class BookingStatus extends Model
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
    protected $table = 'booking_status';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
        'name', 
		
    ];

    

    

	/**
     * bookings.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookings()
    {
        return $this->hasMany('App\REST\Booking', 'status_id');
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
            'bookings',
            'status_id',
            'appartment_id');
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
            'status_id',
            'guest_id');
    }
}
