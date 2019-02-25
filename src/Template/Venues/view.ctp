<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Venue $venue
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Venue'), ['action' => 'edit', $venue->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Venue'), ['action' => 'delete', $venue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venue->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Venues'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venue'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Regions'), ['controller' => 'Regions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Region'), ['controller' => 'Regions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List City Regions'), ['controller' => 'CityRegions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City Region'), ['controller' => 'CityRegions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List City Neighbourhoods'), ['controller' => 'CityNeighbourhoods', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City Neighbourhood'), ['controller' => 'CityNeighbourhoods', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Intersections'), ['controller' => 'Intersections', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Intersection'), ['controller' => 'Intersections', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Publish States'), ['controller' => 'PublishStates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Publish State'), ['controller' => 'PublishStates', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Chains'), ['controller' => 'Chains', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chain'), ['controller' => 'Chains', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Client Types'), ['controller' => 'ClientTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Client Type'), ['controller' => 'ClientTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Venue Amenities'), ['controller' => 'VenueAmenities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venue Amenity'), ['controller' => 'VenueAmenities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Venue Products'), ['controller' => 'VenueProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venue Product'), ['controller' => 'VenueProducts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Venue Services'), ['controller' => 'VenueServices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venue Service'), ['controller' => 'VenueServices', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Venue Subtypes'), ['controller' => 'VenueSubTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venue Subtype'), ['controller' => 'VenueSubTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Venue Types'), ['controller' => 'VenueTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venue Type'), ['controller' => 'VenueTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="venues view large-9 medium-8 columns content">
    <h3><?= h($venue->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($venue->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($venue->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sub Name') ?></th>
            <td><?= h($venue->sub_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($venue->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Main Image Url') ?></th>
            <td><?= h($venue->main_image_url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($venue->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Region') ?></th>
            <td><?= $venue->has('region') ? $this->Html->link($venue->region->name, ['controller' => 'Regions', 'action' => 'view', $venue->region->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= $venue->has('city') ? $this->Html->link($venue->city->name, ['controller' => 'Cities', 'action' => 'view', $venue->city->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City Region') ?></th>
            <td><?= $venue->has('city_region') ? $this->Html->link($venue->city_region->name, ['controller' => 'CityRegions', 'action' => 'view', $venue->city_region->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City Neighbourhood') ?></th>
            <td><?= $venue->has('city_neighbourhood') ? $this->Html->link($venue->city_neighbourhood->name, ['controller' => 'CityNeighbourhoods', 'action' => 'view', $venue->city_neighbourhood->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Intersection') ?></th>
            <td><?= $venue->has('intersection') ? $this->Html->link($venue->intersection->name, ['controller' => 'Intersections', 'action' => 'view', $venue->intersection->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Publish State') ?></th>
            <td><?= $venue->has('publish_state') ? $this->Html->link($venue->publish_state->name, ['controller' => 'PublishStates', 'action' => 'view', $venue->publish_state->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Chain') ?></th>
            <td><?= $venue->has('chain') ? $this->Html->link($venue->chain->name, ['controller' => 'Chains', 'action' => 'view', $venue->chain->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hours Sun') ?></th>
            <td><?= h($venue->hours_sun) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hours Mon') ?></th>
            <td><?= h($venue->hours_mon) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hours Tue') ?></th>
            <td><?= h($venue->hours_tue) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hours Wed') ?></th>
            <td><?= h($venue->hours_wed) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hours Thu') ?></th>
            <td><?= h($venue->hours_thu) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hours Fri') ?></th>
            <td><?= h($venue->hours_fri) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hours Sat') ?></th>
            <td><?= h($venue->hours_sat) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Client Type') ?></th>
            <td><?= $venue->has('client_type') ? $this->Html->link($venue->client_type->name, ['controller' => 'ClientTypes', 'action' => 'view', $venue->client_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($venue->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Geo Lat') ?></th>
            <td><?= $this->Number->format($venue->geo_lat) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Geo Lng') ?></th>
            <td><?= $this->Number->format($venue->geo_lng) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Verified') ?></th>
            <td><?= h($venue->last_verified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($venue->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($venue->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Venue Amenities') ?></h4>
        <?php if (!empty($venue->venue_amenities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Venue Type Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($venue->venue_amenities as $venueAmenities): ?>
            <tr>
                <td><?= h($venueAmenities->id) ?></td>
                <td><?= h($venueAmenities->name) ?></td>
                <td><?= h($venueAmenities->slug) ?></td>
                <td><?= h($venueAmenities->venue_type_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VenueAmenities', 'action' => 'view', $venueAmenities->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VenueAmenities', 'action' => 'edit', $venueAmenities->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VenueAmenities', 'action' => 'delete', $venueAmenities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venueAmenities->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Venue Products') ?></h4>
        <?php if (!empty($venue->venue_products)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Venue Type Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($venue->venue_products as $venueProducts): ?>
            <tr>
                <td><?= h($venueProducts->id) ?></td>
                <td><?= h($venueProducts->name) ?></td>
                <td><?= h($venueProducts->slug) ?></td>
                <td><?= h($venueProducts->venue_type_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VenueProducts', 'action' => 'view', $venueProducts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VenueProducts', 'action' => 'edit', $venueProducts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VenueProducts', 'action' => 'delete', $venueProducts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venueProducts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Venue Services') ?></h4>
        <?php if (!empty($venue->venue_services)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Venue Type Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($venue->venue_services as $venueServices): ?>
            <tr>
                <td><?= h($venueServices->id) ?></td>
                <td><?= h($venueServices->name) ?></td>
                <td><?= h($venueServices->slug) ?></td>
                <td><?= h($venueServices->venue_type_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VenueServices', 'action' => 'view', $venueServices->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VenueServices', 'action' => 'edit', $venueServices->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VenueServices', 'action' => 'delete', $venueServices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venueServices->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Venue Sub Types') ?></h4>
        <?php if (!empty($venue->venue_subtypes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Venue Type Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($venue->venue_subtypes as $venueSubtypes): ?>
            <tr>
                <td><?= h($venueSubtypes->id) ?></td>
                <td><?= h($venueSubtypes->name) ?></td>
                <td><?= h($venueSubtypes->slug) ?></td>
                <td><?= h($venueSubtypes->venue_type_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VenueSubTypes', 'action' => 'view', $venueSubtypes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VenueSubTypes', 'action' => 'edit', $venueSubtypes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VenueSubTypes', 'action' => 'delete', $venueSubtypes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venueSubtypes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Venue Types') ?></h4>
        <?php if (!empty($venue->venue_types)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($venue->venue_types as $venueTypes): ?>
            <tr>
                <td><?= h($venueTypes->id) ?></td>
                <td><?= h($venueTypes->name) ?></td>
                <td><?= h($venueTypes->slug) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VenueTypes', 'action' => 'view', $venueTypes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VenueTypes', 'action' => 'edit', $venueTypes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VenueTypes', 'action' => 'delete', $venueTypes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venueTypes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
