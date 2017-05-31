<?php

namespace App\REST\Http\Controllers\Api\v1;

use App\REST\User;
use TMPHP\RestApiGenerators\AbstractEntities\ControllerAbstract;
use App\REST\Transformers\UserTransformer;

class UserController extends ControllerAbstract
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
            'email' => 'string|email|unique:users,email',
            'password' => 'string',
            'remember_token' => 'string',

        ],
        'update' => [
            'name' => 'string',
            'email' => 'string|email|unique:users,email',
            'password' => 'string',
            'remember_token' => 'string',

        ],
        'show' => [

        ],
        'destroy' => [

        ],
    ];

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        parent::__construct(new User(), UserTransformer::class);
    }

}