<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VenueAmenity $venueAmenity
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Venue Amenity'), ['action' => 'edit', $venueAmenity->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Venue Amenity'), ['action' => 'delete', $venueAmenity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venueAmenity->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Venue Amenities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venue Amenity'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Venue Types'), ['controller' => 'VenueTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venue Type'), ['controller' => 'VenueTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Venues'), ['controller' => 'Venues', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venue'), ['controller' => 'Venues', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="venueAmenities view large-9 medium-8 columns content">
    <h3><?= h($venueAmenity->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($venueAmenity->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($venueAmenity->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Venue Type') ?></th>
            <td><?= $venueAmenity->has('venue_type') ? $this->Html->link($venueAmenity->venue_type->name, ['controller' => 'VenueTypes', 'action' => 'view', $venueAmenity->venue_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($venueAmenity->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Venues') ?></h4>
        <?php if (!empty($venueAmenity->venues)): ?>
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
            <?php foreach ($venueAmenity->venues as $venues): ?>
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
</div>
