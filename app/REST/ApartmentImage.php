<?php

namespace App\REST;

use Illuminate\Database\Eloquent\Model;

/**
 * App\REST\ApartmentImage
 *
 * @property int $id
 * @property int|null $apartment_id
 * @property int|null $image_id
 * @property-read \App\REST\Apartment|null $apartment
 * @property-read \App\REST\Image|null $image
 * @method static \Illuminate\Database\Query\Builder|\App\REST\ApartmentImage whereApartmentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\REST\ApartmentImage whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\REST\ApartmentImage whereImageId($value)
 * @mixin \Eloquent
 */
class ApartmentImage extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Table Name.
     *
     * @var string
     */
    protected $table = 'apartment_images';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
        'apartment_id', 
		'image_id', 
		
    ];

    

	/**
     * apartment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function apartment()
    {
        return $this->belongsTo('App\REST\Apartment');
    }

	/**
     * image.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function image()
    {
        return $this->belongsTo('App\REST\Image');
    }

    

    
}
