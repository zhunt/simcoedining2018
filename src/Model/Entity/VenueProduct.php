<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VenueProduct Entity
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $venue_type_id
 *
 * @property \App\Model\Entity\VenueType $venue_type
 * @property \App\Model\Entity\Venue[] $venues
 */
class VenueProduct extends Entity
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
        'venue_type_id' => true,
        'venue_type' => true,
        'venues' => true
    ];
}
