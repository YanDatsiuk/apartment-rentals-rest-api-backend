<?php

namespace App\REST\Http\Controllers\Api\v1;

use App\REST\Apartment;
use TMPHP\RestApiGenerators\AbstractEntities\ControllerAbstract;
use App\REST\Transformers\ApartmentTransformer;

class ApartmentController extends ControllerAbstract
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
            'building_id' => 'integer|between:0,4294967295|exists:buildings,id',
            'type_id' => 'integer|between:0,4294967295|exists:apartment_types,id',
            'bathroom_quantity' => 'integer|between:-2147483648,2147483647',
            'bedroom_quantity' => 'integer|between:-2147483648,2147483647',
            'room_quantity' => 'integer|between:-2147483648,2147483647',
            'description' => 'string',

        ],
        'update' => [
            'building_id' => 'integer|between:0,4294967295|exists:buildings,id',
            'type_id' => 'integer|between:0,4294967295|exists:apartment_types,id',
            'bathroom_quantity' => 'integer|between:-2147483648,2147483647',
            'bedroom_quantity' => 'integer|between:-2147483648,2147483647',
            'room_quantity' => 'integer|between:-2147483648,2147483647',
            'description' => 'string',

        ],
        'show' => [

        ],
        'destroy' => [

        ],
    ];

    /**
     * ApartmentController constructor.
     */
    public function __construct()
    {
        parent::__construct(new Apartment(), ApartmentTransformer::class);
    }

}