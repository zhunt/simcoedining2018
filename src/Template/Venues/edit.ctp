<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Venue $venue
 */

use Cake\Core\Configure; ?>
<?php $this->Html->scriptStart(['block' => true]); ?>

window.googlemapKey = '<?= Configure::read('gmapApiKey'); ?>';

$(document).ready(function() {
    $('.select2').select2();
});

$(function() { $('textarea').froalaEditor() });
<?php $this->Html->scriptEnd(); ?>


<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $venue->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $venue->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Venues'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Regions'), ['controller' => 'Regions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Region'), ['controller' => 'Regions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List City Regions'), ['controller' => 'CityRegions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City Region'), ['controller' => 'CityRegions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List City Neighbourhoods'), ['controller' => 'CityNeighbourhoods', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City Neighbourhood'), ['controller' => 'CityNeighbourhoods', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Intersections'), ['controller' => 'Intersections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Intersection'), ['controller' => 'Intersections', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Publish States'), ['controller' => 'PublishStates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Publish State'), ['controller' => 'PublishStates', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Chains'), ['controller' => 'Chains', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Chain'), ['controller' => 'Chains', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Client Types'), ['controller' => 'ClientTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Client Type'), ['controller' => 'ClientTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Venue Amenities'), ['controller' => 'VenueAmenities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venue Amenity'), ['controller' => 'VenueAmenities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Venue Products'), ['controller' => 'VenueProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venue Product'), ['controller' => 'VenueProducts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Venue Services'), ['controller' => 'VenueServices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venue Service'), ['controller' => 'VenueServices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Venue Subtypes'), ['controller' => 'VenueSubTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venue Subtype'), ['controller' => 'VenueSubTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Venue Types'), ['controller' => 'VenueTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venue Type'), ['controller' => 'VenueTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="venues form large-9 medium-8 columns content">
    <?= $this->Form->create($venue) ?>
    <fieldset>
        <legend><?= __('Edit Venue') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('slug');
            echo $this->Form->control('sub_name');
            echo $this->Form->control('seo_title');
            echo $this->Form->control('seo_description');
            echo $this->Form->control('address');
            echo $this->Form->control('geo_lat');
            echo $this->Form->control('geo_lng');
            echo $this->Form->control( 'venue_closed');
            echo $this->Form->control('main_image_url');
            echo $this->Form->control('venue_description');
            echo $this->Form->control('phone');
            echo $this->Form->control('website_url', ['type' => 'url']);
            echo $this->Form->control('region_id', ['options' => $regions, 'empty' => true, 'class' => 'select2']);
            echo $this->Form->control('city_id', ['options' => $cities, 'class' => 'select2']);
            echo $this->Form->control('city_region_id', ['options' => $cityRegions, 'empty' => true, 'class' => 'select2']);
            echo $this->Form->control('city_neighbourhood_id', ['options' => $cityNeighbourhoods, 'empty' => true, 'class' => 'select2']);
            echo $this->Form->control('intersection_id', ['options' => $intersections, 'empty' => true, 'class' => 'select2' ]);
            echo $this->Form->control('publish_state_id', ['options' => $publishStates]);
            echo $this->Form->control('chain_id', ['options' => $chains, 'empty' => true, 'class' => 'select2' ]);
            echo $this->Form->control('last_verified', ['empty' => true]);
            echo $this->Form->control('hours_sun');
            echo $this->Form->control('hours_mon');
            echo $this->Form->control('hours_tue');
            echo $this->Form->control('hours_wed');
            echo $this->Form->control('hours_thu');
            echo $this->Form->control('hours_fri');
            echo $this->Form->control('hours_sat');
            echo $this->Form->control('client_type_id', ['options' => $clientTypes]);
            echo $this->Form->control('venue_amenities._ids', ['options' => $venueAmenities, 'class' => 'select2']);
            echo $this->Form->control('venue_products._ids', ['options' => $venueProducts, 'class' => 'select2']);
            echo $this->Form->control('venue_services._ids', ['options' => $venueServices, 'class' => 'select2']);
            echo $this->Form->control('venue_subtypes._ids', ['options' => $venueSubtypes, 'class' => 'select2']);
            echo $this->Form->control('venue_types._ids', ['options' => $venueTypes, 'class' => 'select2']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script src="/js/admin_app.js"></script>
