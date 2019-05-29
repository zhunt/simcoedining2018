<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BlogsVenue Entity
 *
 * @property int $id
 * @property int $blog_id
 * @property int $venue_id
 *
 * @property \App\Model\Entity\Blog $blog
 * @property \App\Model\Entity\Venue $venue
 */
class BlogsVenue extends Entity
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
        'blog_id' => true,
        'venue_id' => true,
        'blog' => true,
        'venue' => true
    ];
}
