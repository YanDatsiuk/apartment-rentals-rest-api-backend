<?php

namespace App\REST;

use Illuminate\Database\Eloquent\Model;

/**
 * App\REST\Status
 *
 * @property int $id
 * @property string|null $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\REST\Apartment[] $apartments
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\REST\BookingStatus[] $bookingStatuses
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\REST\Booking[] $booking_statuses_bookings
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\REST\Booking[] $bookings
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\REST\User[] $users
 * @method static \Illuminate\Database\Query\Builder|\App\REST\Status whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\REST\Status whereName($value)
 * @mixin \Eloquent
 */
class Status extends Model
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
    protected $table = 'statuses';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
        'name', 
		
    ];

    

    

	/**
     * bookingStatuses.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookingStatuses()
    {
        return $this->hasMany('App\REST\BookingStatus', 'status_id');
    }

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
     * Bookings.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function booking_statuses_bookings()
    {
        return $this->belongsToMany(
            'App\REST\Booking',
            'booking_statuses',
            'status_id',
            'booking_id');
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
