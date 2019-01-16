<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VenueMeta $venueMeta
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Venue Meta'), ['action' => 'edit', $venueMeta->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Venue Meta'), ['action' => 'delete', $venueMeta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venueMeta->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Venue Metas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venue Meta'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Venues'), ['controller' => 'Venues', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venue'), ['controller' => 'Venues', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="venueMetas view large-9 medium-8 columns content">
    <h3><?= h($venueMeta->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Venue') ?></th>
            <td><?= $venueMeta->has('venue') ? $this->Html->link($venueMeta->venue->name, ['controller' => 'Venues', 'action' => 'view', $venueMeta->venue->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Meta Key') ?></th>
            <td><?= h($venueMeta->meta_key) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($venueMeta->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Meta Value') ?></h4>
        <?= $this->Text->autoParagraph(h($venueMeta->meta_value)); ?>
    </div>
</div>
