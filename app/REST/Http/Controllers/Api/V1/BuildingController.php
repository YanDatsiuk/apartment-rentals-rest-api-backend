<?php

namespace App\REST\Http\Controllers\Api\v1;

use App\REST\Building;
use TMPHP\RestApiGenerators\AbstractEntities\ControllerAbstract;
use App\REST\Transformers\BuildingTransformer;

class BuildingController extends ControllerAbstract
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
            'manager_id' => 'integer|between:0,4294967295|exists:users,id', 
			'short_name' => 'string', 
			'full_name' => 'string', 
			'description' => 'string', 
			'address' => 'string', 
			
       ],
       'update'  => [
            'manager_id' => 'integer|between:0,4294967295|exists:users,id', 
			'short_name' => 'string', 
			'full_name' => 'string', 
			'description' => 'string', 
			'address' => 'string', 
			
       ],
       'show'    => [
            
       ],
       'destroy' => [
            
       ],
     ];

    /**
     * BuildingController constructor.
     */
    public function __construct()
    {
        parent::__construct(new Building(), BuildingTransformer::class);
    }

}