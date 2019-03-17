<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Venue Entity
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $sub_name
 * @property string $address
 * @property float $geo_lat
 * @property float $geo_lng
 * @property string|null $main_image_url
 * @property string $phone
 * @property int $region_id
 * @property int $city_id
 * @property int|null $city_region_id
 * @property int|null $city_neighbourhood_id
 * @property int|null $intersection_id
 * @property int $publish_state_id
 * @property int|null $chain_id
 * @property \Cake\I18n\FrozenTime|null $last_verified
 * @property string|null $hours_sun
 * @property string|null $hours_mon
 * @property string|null $hours_tue
 * @property string|null $hours_wed
 * @property string|null $hours_thu
 * @property string|null $hours_fri
 * @property string|null $hours_sat
 * @property int $client_type_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Region $region
 * @property \App\Model\Entity\City $city
 * @property \App\Model\Entity\CityRegion $city_region
 * @property \App\Model\Entity\CityNeighbourhood $city_neighbourhood
 * @property \App\Model\Entity\Intersection $intersection
 * @property \App\Model\Entity\PublishState $publish_state
 * @property \App\Model\Entity\Chain $chain
 * @property \App\Model\Entity\ClientType $client_type
 * @property \App\Model\Entity\VenueAmenity[] $venue_amenities
 * @property \App\Model\Entity\VenueProduct[] $venue_products
 * @property \App\Model\Entity\VenueService[] $venue_services
 * @property \App\Model\Entity\VenueSubType[] $venue_subtypes
 * @property \App\Model\Entity\VenueType[] $venue_types
 */
class Venue extends Entity
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
        'sub_name' => true,
        'address' => true,
        'geo_lat' => true,
        'geo_lng' => true,
        'main_image_url' => true,
        'venue_description' => true,
        'phone' => true,
        'region_id' => true,
        'city_id' => true,
        'city_region_id' => true,
        'city_neighbourhood_id' => true,
        'intersection_id' => true,
        'publish_state_id' => true,
        'chain_id' => true,
        'last_verified' => true,
        'hours_sun' => true,
        'hours_mon' => true,
        'hours_tue' => true,
        'hours_wed' => true,
        'hours_thu' => true,
        'hours_fri' => true,
        'hours_sat' => true,
        'client_type_id' => true,
        'created' => true,
        'modified' => true,
        'region' => true,
        'city' => true,
        'city_region' => true,
        'city_neighbourhood' => true,
        'intersection' => true,
        'publish_state' => true,
        'venue_closed' => true,
        'chain' => true,
        'client_type' => true,
        'venue_amenities' => true,
        'venue_products' => true,
        'venue_services' => true,
        'venue_subtypes' => true,
        'venue_types' => true
    ];
}
