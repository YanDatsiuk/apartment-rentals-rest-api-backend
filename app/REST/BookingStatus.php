<?php

namespace App\REST;

use Illuminate\Database\Eloquent\Model;

/**
 * App\REST\BookingStatus
 *
 * @property int $id
 * @property int|null $booking_id
 * @property int|null $status_id
 * @property-read \App\REST\Booking|null $booking
 * @property-read \App\REST\Status|null $status
 * @method static \Illuminate\Database\Query\Builder|\App\REST\BookingStatus whereBookingId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\REST\BookingStatus whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\REST\BookingStatus whereStatusId($value)
 * @mixin \Eloquent
 */
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
    protected $table = 'booking_statuses';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
        'booking_id', 
		'status_id', 
		
    ];

    

	/**
     * booking.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function booking()
    {
        return $this->belongsTo('App\REST\Booking');
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

    

    
}
