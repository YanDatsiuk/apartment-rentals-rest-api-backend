<?php

namespace App\REST\Http\Controllers\Api\v1;

use App\REST\ApartmentImage;
use TMPHP\RestApiGenerators\AbstractEntities\ControllerAbstract;
use App\REST\Transformers\ApartmentImageTransformer;

class ApartmentImageController extends ControllerAbstract
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
            'apartment_id' => 'integer|between:0,4294967295|exists:apartments,id', 
			'image_id' => 'integer|between:0,4294967295|exists:images,id', 
			
       ],
       'update'  => [
            'apartment_id' => 'integer|between:0,4294967295|exists:apartments,id', 
			'image_id' => 'integer|between:0,4294967295|exists:images,id', 
			
       ],
       'show'    => [
            
       ],
       'destroy' => [
            
       ],
     ];

    /**
     * ApartmentImageController constructor.
     */
    public function __construct()
    {
        parent::__construct(new ApartmentImage(), ApartmentImageTransformer::class);
    }

}