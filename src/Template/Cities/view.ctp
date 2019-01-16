<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\City $city
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit City'), ['action' => 'edit', $city->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete City'), ['action' => 'delete', $city->id], ['confirm' => __('Are you sure you want to delete # {0}?', $city->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Regions'), ['controller' => 'Regions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Region'), ['controller' => 'Regions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List City Neighbourhoods'), ['controller' => 'CityNeighbourhoods', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City Neighbourhood'), ['controller' => 'CityNeighbourhoods', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List City Regions'), ['controller' => 'CityRegions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City Region'), ['controller' => 'CityRegions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Intersections'), ['controller' => 'Intersections', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Intersection'), ['controller' => 'Intersections', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Venues'), ['controller' => 'Venues', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venue'), ['controller' => 'Venues', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cities view large-9 medium-8 columns content">
    <h3><?= h($city->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($city->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($city->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Region') ?></th>
            <td><?= $city->has('region') ? $this->Html->link($city->region->name, ['controller' => 'Regions', 'action' => 'view', $city->region->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Locality') ?></th>
            <td><?= h($city->locality) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($city->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Venue Count') ?></th>
            <td><?= $this->Number->format($city->venue_count) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related City Neighbourhoods') ?></h4>
        <?php if (!empty($city->city_neighbourhoods)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('City Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($city->city_neighbourhoods as $cityNeighbourhoods): ?>
            <tr>
                <td><?= h($cityNeighbourhoods->id) ?></td>
                <td><?= h($cityNeighbourhoods->name) ?></td>
                <td><?= h($cityNeighbourhoods->slug) ?></td>
                <td><?= h($cityNeighbourhoods->city_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CityNeighbourhoods', 'action' => 'view', $cityNeighbourhoods->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CityNeighbourhoods', 'action' => 'edit', $cityNeighbourhoods->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CityNeighbourhoods', 'action' => 'delete', $cityNeighbourhoods->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cityNeighbourhoods->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related City Regions') ?></h4>
        <?php if (!empty($city->city_regions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('City Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($city->city_regions as $cityRegions): ?>
            <tr>
                <td><?= h($cityRegions->id) ?></td>
                <td><?= h($cityRegions->name) ?></td>
                <td><?= h($cityRegions->slug) ?></td>
                <td><?= h($cityRegions->city_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CityRegions', 'action' => 'view', $cityRegions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CityRegions', 'action' => 'edit', $cityRegions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CityRegions', 'action' => 'delete', $cityRegions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cityRegions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Intersections') ?></h4>
        <?php if (!empty($city->intersections)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('City Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($city->intersections as $intersections): ?>
            <tr>
                <td><?= h($intersections->id) ?></td>
                <td><?= h($intersections->name) ?></td>
                <td><?= h($intersections->slug) ?></td>
                <td><?= h($intersections->city_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Intersections', 'action' => 'view', $intersections->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Intersections', 'action' => 'edit', $intersections->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Intersections', 'action' => 'delete', $intersections->id], ['confirm' => __('Are you sure you want to delete # {0}?', $intersections->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Venues') ?></h4>
        <?php if (!empty($city->venues)): ?>
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
            <?php foreach ($city->venues as $venues): ?>
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
