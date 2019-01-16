<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * City Entity
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int|null $venue_count
 * @property int $region_id
 * @property string $locality
 *
 * @property \App\Model\Entity\Region $region
 * @property \App\Model\Entity\CityNeighbourhood[] $city_neighbourhoods
 * @property \App\Model\Entity\CityRegion[] $city_regions
 * @property \App\Model\Entity\Intersection[] $intersections
 * @property \App\Model\Entity\Venue[] $venues
 */
class City extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'slug' => true,
        'venue_count' => true,
        'region_id' => true,
        'locality' => true,
        'region' => true,
        'city_neighbourhoods' => true,
        'city_regions' => true,
        'intersections' => true,
        'venues' => true
    ];
}
