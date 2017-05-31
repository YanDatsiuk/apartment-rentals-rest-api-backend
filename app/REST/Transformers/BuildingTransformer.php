<?php

namespace App\REST\Transformers;

use Illuminate\Database\Eloquent\Model;
use TMPHP\RestApiGenerators\AbstractEntities\TransformerAbstract;


class BuildingTransformer extends TransformerAbstract
{

    /**
     *
     *
     * @var array
     */
    protected $availableIncludes = [
        'manager',
        'apartments',
        'apartmentTypes',
    ];

    /**
     *
     */
    private $validParams = ['limit', 'order'];

    /**
     * Transform model data to array.
     *
     * @param Model $model
     * @return array
     */
    public function transform(Model $model)
    {
        return $model->toArray();
    }
}