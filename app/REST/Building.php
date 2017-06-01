<?php

namespace App\REST;

use Illuminate\Database\Eloquent\Model;

/**
 * App\REST\Building
 *
 * @property int $id
 * @property int|null $manager_id
 * @property string|null $short_name
 * @property string|null $full_name
 * @property string|null $description
 * @property string|null $address
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\REST\ApartmentType[] $apartmentTypes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\REST\Apartment[] $apartments
 * @property-read \App\REST\User|null $manager
 * @method static \Illuminate\Database\Query\Builder|\App\REST\Building whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\REST\Building whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\REST\Building whereFullName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\REST\Building whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\REST\Building whereManagerId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\REST\Building whereShortName($value)
 * @mixin \Eloquent
 */
class Building extends Model
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
    protected $table = 'buildings';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
        'manager_id', 
		'short_name', 
		'full_name', 
		'description', 
		'address', 
		
    ];

    

	/**
     * manager.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function manager()
    {
        return $this->belongsTo('App\REST\User');
    }

    

	/**
     * apartments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function apartments()
    {
        return $this->hasMany('App\REST\Apartment', 'building_id');
    }

    

	/**
     * ApartmentTypes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function apartmentTypes()
    {
        return $this->belongsToMany(
            'App\REST\ApartmentType',
            'apartments',
            'building_id',
            'type_id');
    }
}
