<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VenueMeta[]|\Cake\Collection\CollectionInterface $venueMetas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Venue Meta'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Venues'), ['controller' => 'Venues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venue'), ['controller' => 'Venues', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="venueMetas index large-9 medium-8 columns content">
    <h3><?= __('Venue Metas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('venue_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('meta_key') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($venueMetas as $venueMeta): ?>
            <tr>
                <td><?= $this->Number->format($venueMeta->id) ?></td>
                <td><?= $venueMeta->has('venue') ? $this->Html->link($venueMeta->venue->name, ['controller' => 'Venues', 'action' => 'view', $venueMeta->venue->id]) : '' ?></td>
                <td><?= h($venueMeta->meta_key) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $venueMeta->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $venueMeta->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $venueMeta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venueMeta->id)]) ?>
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
