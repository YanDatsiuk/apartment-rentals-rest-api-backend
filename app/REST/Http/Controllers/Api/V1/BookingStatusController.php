<?php

namespace App\REST\Http\Controllers\Api\v1;

use App\REST\BookingStatus;
use TMPHP\RestApiGenerators\AbstractEntities\ControllerAbstract;
use App\REST\Transformers\BookingStatusTransformer;

class BookingStatusController extends ControllerAbstract
{
    /**
     * Validation rules for request parameters.
     *
     * @var array $rules
     */
     protected $rules = [
       'index'   => [
            
       ],
       'store'   => [
            'booking_id' => 'integer|between:0,4294967295|exists:bookings,id|unique:booking_statuses,booking_id', 
			'status_id' => 'integer|between:0,4294967295|exists:statuses,id', 
			
       ],
       'update'  => [
            'booking_id' => 'integer|between:0,4294967295|exists:bookings,id|unique:booking_statuses,booking_id', 
			'status_id' => 'integer|between:0,4294967295|exists:statuses,id', 
			
       ],
       'show'    => [
            
       ],
       'destroy' => [
            
       ],
     ];

    /**
     * BookingStatusController constructor.
     */
    public function __construct()
    {
        parent::__construct(new BookingStatus(), BookingStatusTransformer::class);
    }

}