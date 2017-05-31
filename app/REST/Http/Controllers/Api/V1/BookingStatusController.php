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
        'index' => [

        ],
        'store' => [
            'name' => 'string',

        ],
        'update' => [
            'name' => 'string',

        ],
        'show' => [

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