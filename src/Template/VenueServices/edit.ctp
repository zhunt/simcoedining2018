<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VenueService $venueService
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $venueService->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $venueService->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Venue Services'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Venue Types'), ['controller' => 'VenueTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venue Type'), ['controller' => 'VenueTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Venues'), ['controller' => 'Venues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venue'), ['controller' => 'Venues', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="venueServices form large-9 medium-8 columns content">
    <?= $this->Form->create($venueService) ?>
    <fieldset>
        <legend><?= __('Edit Venue Service') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('slug');
            echo $this->Form->control('venue_type_id', ['options' => $venueTypes]);
            echo $this->Form->control('venues._ids', ['options' => $venues]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
