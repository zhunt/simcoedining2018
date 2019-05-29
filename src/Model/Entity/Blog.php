<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Blog Entity
 *
 * @property int $id
 * @property string $name
 * @property string $title_image_url
 * @property string $home_page_description
 * @property string $wordpress_guid
 * @property \Cake\I18n\FrozenTime|null $date_modified
 *
 * @property \App\Model\Entity\BlogCategory[] $blog_categories
 * @property \App\Model\Entity\Venue[] $venues
 */
class Blog extends Entity
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
        'title_image_url' => true,
        'home_page_description' => true,
        'wordpress_guid' => true,
        'date_modified' => true,
        'blog_categories' => true,
        'venues' => true
    ];
}
