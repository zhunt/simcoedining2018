<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Intersection $intersection
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Intersection'), ['action' => 'edit', $intersection->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Intersection'), ['action' => 'delete', $intersection->id], ['confirm' => __('Are you sure you want to delete # {0}?', $intersection->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Intersections'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Intersection'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Venues'), ['controller' => 'Venues', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venue'), ['controller' => 'Venues', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="intersections view large-9 medium-8 columns content">
    <h3><?= h($intersection->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($intersection->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($intersection->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= $intersection->has('city') ? $this->Html->link($intersection->city->name, ['controller' => 'Cities', 'action' => 'view', $intersection->city->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($intersection->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Venues') ?></h4>
        <?php if (!empty($intersection->venues)): ?>
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
            <?php foreach ($intersection->venues as $venues): ?>
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
