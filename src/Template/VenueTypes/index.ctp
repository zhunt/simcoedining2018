<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VenueType[]|\Cake\Collection\CollectionInterface $venueTypes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Venue Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Venue Amenities'), ['controller' => 'VenueAmenities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venue Amenity'), ['controller' => 'VenueAmenities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Venue Products'), ['controller' => 'VenueProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venue Product'), ['controller' => 'VenueProducts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Venue Services'), ['controller' => 'VenueServices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venue Service'), ['controller' => 'VenueServices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Venue Subtypes'), ['controller' => 'VenueSubtypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venue Subtype'), ['controller' => 'VenueSubtypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Venues'), ['controller' => 'Venues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venue'), ['controller' => 'Venues', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="venueTypes index large-9 medium-8 columns content">
    <h3><?= __('Venue Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('slug') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($venueTypes as $venueType): ?>
            <tr>
                <td><?= $this->Number->format($venueType->id) ?></td>
                <td><?= h($venueType->name) ?></td>
                <td><?= h($venueType->slug) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $venueType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $venueType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $venueType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venueType->id)]) ?>
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
