<?php

namespace App\REST;

use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsTo('App\REST\BookingStatus');
    }


}
