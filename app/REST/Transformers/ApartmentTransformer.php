<?php

namespace App\REST\Transformers;

use Illuminate\Database\Eloquent\Model;
use TMPHP\RestApiGenerators\AbstractEntities\TransformerAbstract;


class ApartmentTransformer extends TransformerAbstract
{

    /**
     *
     *
     * @var array
     */
    protected $availableIncludes = [
        'building',
        'type',
        'apartmentFacilities',
        'bookings',
        'facilities',
        'users',
        'bookingStatuses',
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