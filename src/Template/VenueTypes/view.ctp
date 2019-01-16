<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VenueType $venueType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Venue Type'), ['action' => 'edit', $venueType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Venue Type'), ['action' => 'delete', $venueType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venueType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Venue Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venue Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Venue Amenities'), ['controller' => 'VenueAmenities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venue Amenity'), ['controller' => 'VenueAmenities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Venue Products'), ['controller' => 'VenueProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venue Product'), ['controller' => 'VenueProducts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Venue Services'), ['controller' => 'VenueServices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venue Service'), ['controller' => 'VenueServices', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Venue Subtypes'), ['controller' => 'VenueSubtypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venue Subtype'), ['controller' => 'VenueSubtypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Venues'), ['controller' => 'Venues', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venue'), ['controller' => 'Venues', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="venueTypes view large-9 medium-8 columns content">
    <h3><?= h($venueType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($venueType->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($venueType->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($venueType->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Venues') ?></h4>
        <?php if (!empty($venueType->venues)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Sub Name') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Geo Lat') ?></th>
                <th scope="col"><?= __('Geo Lng') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Region Id') ?></th>
                <th scope="col"><?= __('City Id') ?></th>
                <th scope="col"><?= __('City Region Id') ?></th>
                <th scope="col"><?= __('City Neighbourhood Id') ?></th>
                <th scope="col"><?= __('Intersection Id') ?></th>
                <th scope="col"><?= __('Publish State Id') ?></th>
                <th scope="col"><?= __('Chain Id') ?></th>
                <th scope="col"><?= __('Client Type Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($venueType->venues as $venues): ?>
            <tr>
                <td><?= h($venues->id) ?></td>
                <td><?= h($venues->name) ?></td>
                <td><?= h($venues->slug) ?></td>
                <td><?= h($venues->sub_name) ?></td>
                <td><?= h($venues->address) ?></td>
                <td><?= h($venues->geo_lat) ?></td>
                <td><?= h($venues->geo_lng) ?></td>
                <td><?= h($venues->phone) ?></td>
                <td><?= h($venues->region_id) ?></td>
                <td><?= h($venues->city_id) ?></td>
                <td><?= h($venues->city_region_id) ?></td>
                <td><?= h($venues->city_neighbourhood_id) ?></td>
                <td><?= h($venues->intersection_id) ?></td>
                <td><?= h($venues->publish_state_id) ?></td>
                <td><?= h($venues->chain_id) ?></td>
                <td><?= h($venues->client_type_id) ?></td>
                <td><?= h($venues->created) ?></td>
                <td><?= h($venues->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Venues', 'action' => 'view', $venues->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Venues', 'action' => 'edit', $venues->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Venues', 'action' => 'delete', $venues->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venues->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Venue Amenities') ?></h4>
        <?php if (!empty($venueType->venue_amenities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Venue Type Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($venueType->venue_amenities as $venueAmenities): ?>
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
        <?php if (!empty($venueType->venue_products)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Venue Type Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($venueType->venue_products as $venueProducts): ?>
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
        <?php if (!empty($venueType->venue_services)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Venue Type Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($venueType->venue_services as $venueServices): ?>
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
        <h4><?= __('Related Venue Subtypes') ?></h4>
        <?php if (!empty($venueType->venue_subtypes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Venue Type Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($venueType->venue_subtypes as $venueSubtypes): ?>
            <tr>
                <td><?= h($venueSubtypes->id) ?></td>
                <td><?= h($venueSubtypes->name) ?></td>
                <td><?= h($venueSubtypes->slug) ?></td>
                <td><?= h($venueSubtypes->venue_type_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VenueSubtypes', 'action' => 'view', $venueSubtypes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VenueSubtypes', 'action' => 'edit', $venueSubtypes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VenueSubtypes', 'action' => 'delete', $venueSubtypes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venueSubtypes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
