<?php

namespace App\REST;

use Illuminate\Database\Eloquent\Model;

/**
 * App\REST\Booking
 *
 * @property int $id
 * @property int|null $appartment_id
 * @property int|null $guest_id
 * @property int|null $status_id
 * @property string|null $start_date
 * @property string|null $end_date
 * @property string|null $details
 * @property-read \App\REST\Apartment|null $appartment
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\REST\BookingStatus[] $bookingStatuses
 * @property-read \App\REST\User|null $guest
 * @property-read \App\REST\Status|null $status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\REST\Status[] $statuses
 * @method static \Illuminate\Database\Query\Builder|\App\REST\Booking whereAppartmentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\REST\Booking whereDetails($value)
 * @method static \Illuminate\Database\Query\Builder|\App\REST\Booking whereEndDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\REST\Booking whereGuestId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\REST\Booking whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\REST\Booking whereStartDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\REST\Booking whereStatusId($value)
 * @mixin \Eloquent
 */
class Booking extends Model
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
    protected $table = 'bookings';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
        'appartment_id', 
		'guest_id', 
		'status_id', 
		'start_date', 
		'end_date', 
		'details', 
		
    ];

    

	/**
     * appartment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function appartment()
    {
        return $this->belongsTo('App\REST\Apartment');
    }

	/**
     * guest.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function guest()
    {
        return $this->belongsTo('App\REST\User');
    }

	/**
     * status.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo('App\REST\Status');
    }

    

	/**
     * bookingStatuses.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookingStatuses()
    {
        return $this->hasMany('App\REST\BookingStatus', 'booking_id');
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
            'booking_statuses',
            'booking_id',
            'status_id');
    }
}
