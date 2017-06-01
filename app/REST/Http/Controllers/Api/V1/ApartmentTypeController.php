<?php

namespace App\REST\Http\Controllers\Api\v1;

use App\REST\ApartmentType;
use TMPHP\RestApiGenerators\AbstractEntities\ControllerAbstract;
use App\REST\Transformers\ApartmentTypeTransformer;

class ApartmentTypeController extends ControllerAbstract
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
            'name' => 'string', 
			
       ],
       'update'  => [
            'name' => 'string', 
			
       ],
       'show'    => [
            
       ],
       'destroy' => [
            
       ],
     ];

    /**
     * ApartmentTypeController constructor.
     */
    public function __construct()
    {
        parent::__construct(new ApartmentType(), ApartmentTypeTransformer::class);
    }

}