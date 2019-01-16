<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VenueType $venueType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $venueType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $venueType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Venue Types'), ['action' => 'index']) ?></li>
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
<div class="venueTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($venueType) ?>
    <fieldset>
        <legend><?= __('Edit Venue Type') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('slug');
            echo $this->Form->control('venues._ids', ['options' => $venues]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
