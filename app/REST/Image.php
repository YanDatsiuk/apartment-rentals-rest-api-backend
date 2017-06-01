<?php

namespace App\REST;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
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
    protected $table = 'images';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
        'image_src', 
		'created_at', 
		'updated_at', 
		
    ];

    

    

	/**
     * apartmentImages.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function apartmentImages()
    {
        return $this->hasMany('App\REST\ApartmentImage', 'image_id');
    }

    

	/**
     * Apartments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function apartments()
    {
        return $this->belongsToMany(
            'App\REST\Apartment',
            'apartment_images',
            'image_id',
            'apartment_id');
    }
}
