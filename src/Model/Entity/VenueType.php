<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VenueType Entity
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 *
 * @property \App\Model\Entity\VenueAmenity[] $venue_amenities
 * @property \App\Model\Entity\VenueProduct[] $venue_products
 * @property \App\Model\Entity\VenueService[] $venue_services
 * @property \App\Model\Entity\VenueSubtype[] $venue_subtypes
 * @property \App\Model\Entity\Venue[] $venues
 */
class VenueType extends Entity
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
        'venue_amenities' => true,
        'venue_products' => true,
        'venue_services' => true,
        'venue_subtypes' => true,
        'venues' => true
    ];
}
