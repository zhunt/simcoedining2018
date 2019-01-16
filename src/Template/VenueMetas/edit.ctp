<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VenueMeta $venueMeta
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $venueMeta->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $venueMeta->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Venue Metas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Venues'), ['controller' => 'Venues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venue'), ['controller' => 'Venues', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="venueMetas form large-9 medium-8 columns content">
    <?= $this->Form->create($venueMeta) ?>
    <fieldset>
        <legend><?= __('Edit Venue Meta') ?></legend>
        <?php
            echo $this->Form->control('venue_id', ['options' => $venues]);
            echo $this->Form->control('meta_key');
            echo $this->Form->control('meta_value');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
