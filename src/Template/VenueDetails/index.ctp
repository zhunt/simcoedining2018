<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VenueDetail[]|\Cake\Collection\CollectionInterface $venueDetails
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Venue Detail'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Venues'), ['controller' => 'Venues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venue'), ['controller' => 'Venues', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="venueDetails index large-9 medium-8 columns content">
    <h3><?= __('Venue Details') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('venue_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('seo_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('website_url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('social_1_txt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('social_1_url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('social_2_txt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('social_2_url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone_fax') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone_2_txt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone_2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('postal_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_verified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($venueDetails as $venueDetail): ?>
            <tr>
                <td><?= $this->Number->format($venueDetail->id) ?></td>
                <td><?= $venueDetail->has('venue') ? $this->Html->link($venueDetail->venue->name, ['controller' => 'Venues', 'action' => 'view', $venueDetail->venue->id]) : '' ?></td>
                <td><?= h($venueDetail->seo_title) ?></td>
                <td><?= h($venueDetail->website_url) ?></td>
                <td><?= h($venueDetail->email) ?></td>
                <td><?= h($venueDetail->social_1_txt) ?></td>
                <td><?= h($venueDetail->social_1_url) ?></td>
                <td><?= h($venueDetail->social_2_txt) ?></td>
                <td><?= h($venueDetail->social_2_url) ?></td>
                <td><?= h($venueDetail->phone_fax) ?></td>
                <td><?= h($venueDetail->phone_2_txt) ?></td>
                <td><?= h($venueDetail->phone_2) ?></td>
                <td><?= h($venueDetail->postal_code) ?></td>
                <td><?= h($venueDetail->last_verified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $venueDetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $venueDetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $venueDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venueDetail->id)]) ?>
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
