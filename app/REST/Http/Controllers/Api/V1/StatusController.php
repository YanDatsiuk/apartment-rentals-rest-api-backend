<?php

namespace App\REST\Http\Controllers\Api\v1;

use App\REST\Status;
use TMPHP\RestApiGenerators\AbstractEntities\ControllerAbstract;
use App\REST\Transformers\StatusTransformer;

class StatusController extends ControllerAbstract
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
     * StatusController constructor.
     */
    public function __construct()
    {
        parent::__construct(new Status(), StatusTransformer::class);
    }

}