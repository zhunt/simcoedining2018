<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CityNeighbourhood[]|\Cake\Collection\CollectionInterface $cityNeighbourhoods
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New City Neighbourhood'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Venues'), ['controller' => 'Venues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venue'), ['controller' => 'Venues', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cityNeighbourhoods index large-9 medium-8 columns content">
    <h3><?= __('City Neighbourhoods') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('slug') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cityNeighbourhoods as $cityNeighbourhood): ?>
            <tr>
                <td><?= $this->Number->format($cityNeighbourhood->id) ?></td>
                <td><?= h($cityNeighbourhood->name) ?></td>
                <td><?= h($cityNeighbourhood->slug) ?></td>
                <td><?= $cityNeighbourhood->has('city') ? $this->Html->link($cityNeighbourhood->city->name, ['controller' => 'Cities', 'action' => 'view', $cityNeighbourhood->city->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cityNeighbourhood->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cityNeighbourhood->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cityNeighbourhood->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cityNeighbourhood->id)]) ?>
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
