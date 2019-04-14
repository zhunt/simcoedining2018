<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Venue[]|\Cake\Collection\CollectionInterface $venues
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Venue'), ['action' => 'add']) ?></li>
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
        <li><?= $this->Html->link(__('List Venue Amenities'), ['controller' => 'VenueAmenities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venue Amenity'), ['controller' => 'VenueAmenities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Venue Products'), ['controller' => 'VenueProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venue Product'), ['controller' => 'VenueProducts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Venue Services'), ['controller' => 'VenueServices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venue Service'), ['controller' => 'VenueServices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Venue Subtypes'), ['controller' => 'VenueSubtypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venue Subtype'), ['controller' => 'VenueSubtypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Venue Types'), ['controller' => 'VenueTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venue Type'), ['controller' => 'VenueTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="venues index large-9 medium-8 columns content">
    <h3><?= __('Venues') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <!--
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                -->
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <!--
                <th scope="col"><?= $this->Paginator->sort('slug') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sub_name') ?></th>
                -->
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('geo_lat') ?></th>
                <th scope="col"><?= $this->Paginator->sort('geo_lng') ?></th>
                <!--
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('region_id') ?></th>
                -->
                <th scope="col"><?= $this->Paginator->sort('city_id') ?></th>
                <!--
                <th scope="col"><?= $this->Paginator->sort('city_region_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city_neighbourhood_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('intersection_id') ?></th>
                -->
                <th scope="col"><?= $this->Paginator->sort('publish_state_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('venue_closed') ?></th>
                <th scope="col"><?= $this->Paginator->sort('chain_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('client_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <!--
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                -->
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($venues as $venue): ?>
            <tr>
                <!--
                <td><?= $this->Number->format($venue->id) ?></td>
                -->
                <td>
                    <?= $this->Html->link( $venue->name , ['action' => 'edit', $venue->id]) ?>
                </td>
                <!--
                <td><?= h($venue->slug) ?></td>
                <td><?= h($venue->sub_name) ?></td>
                -->
                <td><?= h($venue->address) ?></td>
                <td><?= $this->Number->format($venue->geo_lat) ?></td>
                <td><?= $this->Number->format($venue->geo_lng) ?></td>
                <!--
                <td><?= h($venue->phone) ?></td>
                <td><?= $venue->has('region') ? $this->Html->link($venue->region->name, ['controller' => 'Regions', 'action' => 'view', $venue->region->id]) : '' ?></td>
                -->
                <td><?= $venue->has('city') ? $this->Html->link($venue->city->name, ['controller' => 'Cities', 'action' => 'view', $venue->city->id]) : '' ?></td>
                <!--
                <td><?= $venue->has('city_region') ? $this->Html->link($venue->city_region->name, ['controller' => 'CityRegions', 'action' => 'view', $venue->city_region->id]) : '' ?></td>
                <td><?= $venue->has('city_neighbourhood') ? $this->Html->link($venue->city_neighbourhood->name, ['controller' => 'CityNeighbourhoods', 'action' => 'view', $venue->city_neighbourhood->id]) : '' ?></td>
                <td><?= $venue->has('intersection') ? $this->Html->link($venue->intersection->name, ['controller' => 'Intersections', 'action' => 'view', $venue->intersection->id]) : '' ?></td>
                -->
                <td><?= $venue->has('publish_state') ? $this->Html->link($venue->publish_state->name, ['controller' => 'PublishStates', 'action' => 'view', $venue->publish_state->id]) : '' ?></td>
                <td> <?= $venue->venue_closed ?> </td>

                <td><?= $venue->has('chain') ? $this->Html->link($venue->chain->name, ['controller' => 'Chains', 'action' => 'view', $venue->chain->id]) : '' ?></td>
                <td><?= $this->Number->format($venue->client_type_id) ?></td>
                <td><?= h($venue->created) ?></td>
                <!--
                <td><?= h($venue->modified) ?></td>
                -->
                <td class="actions">
                    <?= $this->Html->link(__('Clone'), ['action' => 'duplicate', $venue->id]) ?>
                    <?= $this->Html->link(__('View'), ['action' => 'view', $venue->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $venue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venue->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
