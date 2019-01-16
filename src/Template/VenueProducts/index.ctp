<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VenueProduct[]|\Cake\Collection\CollectionInterface $venueProducts
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Venue Product'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Venue Types'), ['controller' => 'VenueTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venue Type'), ['controller' => 'VenueTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Venues'), ['controller' => 'Venues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venue'), ['controller' => 'Venues', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="venueProducts index large-9 medium-8 columns content">
    <h3><?= __('Venue Products') ?></h3>
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
            <?php foreach ($venueProducts as $venueProduct): ?>
            <tr>
                <td><?= $this->Number->format($venueProduct->id) ?></td>
                <td><?= h($venueProduct->name) ?></td>
                <td><?= h($venueProduct->slug) ?></td>
                <td><?= $venueProduct->has('venue_type') ? $this->Html->link($venueProduct->venue_type->name, ['controller' => 'VenueTypes', 'action' => 'view', $venueProduct->venue_type->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $venueProduct->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $venueProduct->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $venueProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venueProduct->id)]) ?>
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
