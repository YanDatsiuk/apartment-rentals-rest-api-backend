<?php

namespace App\REST\Http\Controllers\Api\v1;

use App\REST\Facility;
use TMPHP\RestApiGenerators\AbstractEntities\ControllerAbstract;
use App\REST\Transformers\FacilityTransformer;

class FacilityController extends ControllerAbstract
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
            'description' => 'string', 
			
       ],
       'update'  => [
            'description' => 'string', 
			
       ],
       'show'    => [
            
       ],
       'destroy' => [
            
       ],
     ];

    /**
     * FacilityController constructor.
     */
    public function __construct()
    {
        parent::__construct(new Facility(), FacilityTransformer::class);
    }

}