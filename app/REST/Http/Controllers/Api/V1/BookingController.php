<?php

namespace App\REST\Http\Controllers\Api\v1;

use App\REST\Booking;
use TMPHP\RestApiGenerators\AbstractEntities\ControllerAbstract;
use App\REST\Transformers\BookingTransformer;

class BookingController extends ControllerAbstract
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
            'appartment_id' => 'integer|between:0,4294967295|exists:apartments,id', 
			'guest_id' => 'integer|between:0,4294967295|exists:users,id', 
			'status_id' => 'integer|between:0,4294967295|exists:statuses,id', 
			'details' => 'string', 
			
       ],
       'update'  => [
            'appartment_id' => 'integer|between:0,4294967295|exists:apartments,id', 
			'guest_id' => 'integer|between:0,4294967295|exists:users,id', 
			'status_id' => 'integer|between:0,4294967295|exists:statuses,id', 
			'details' => 'string', 
			
       ],
       'show'    => [
            
       ],
       'destroy' => [
            
       ],
     ];

    /**
     * BookingController constructor.
     */
    public function __construct()
    {
        parent::__construct(new Booking(), BookingTransformer::class);
    }

}