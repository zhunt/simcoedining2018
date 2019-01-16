<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VenueSubType[]|\Cake\Collection\CollectionInterface $venueSubTypes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Venue Sub Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Venue Types'), ['controller' => 'VenueTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venue Type'), ['controller' => 'VenueTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Venues'), ['controller' => 'Venues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venue'), ['controller' => 'Venues', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="venueSubTypes index large-9 medium-8 columns content">
    <h3><?= __('Venue Sub Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('slug') ?></th>
                <th scope="col"><?= $this->Paginator->sort('venue_type_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($venueSubTypes as $venueSubType): ?>
            <tr>
                <td><?= $this->Number->format($venueSubType->id) ?></td>
                <td><?= h($venueSubType->name) ?></td>
                <td><?= h($venueSubType->slug) ?></td>
                <td><?= $venueSubType->has('venue_type') ? $this->Html->link($venueSubType->venue_type->name, ['controller' => 'VenueTypes', 'action' => 'view', $venueSubType->venue_type->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $venueSubType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $venueSubType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $venueSubType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venueSubType->id)]) ?>
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
