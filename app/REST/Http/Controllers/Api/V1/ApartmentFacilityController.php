<?php

namespace App\REST\Http\Controllers\Api\v1;

use App\REST\ApartmentFacility;
use TMPHP\RestApiGenerators\AbstractEntities\ControllerAbstract;
use App\REST\Transformers\ApartmentFacilityTransformer;

class ApartmentFacilityController extends ControllerAbstract
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
            'apartment_id' => 'integer|between:0,4294967295|exists:apartments,id',
            'facility_id' => 'integer|between:0,4294967295|exists:facilities,id',

        ],
        'update' => [
            'apartment_id' => 'integer|between:0,4294967295|exists:apartments,id',
            'facility_id' => 'integer|between:0,4294967295|exists:facilities,id',

        ],
        'show' => [

        ],
        'destroy' => [

        ],
    ];

    /**
     * ApartmentFacilityController constructor.
     */
    public function __construct()
    {
        parent::__construct(new ApartmentFacility(), ApartmentFacilityTransformer::class);
    }

}