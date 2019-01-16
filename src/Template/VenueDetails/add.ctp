<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VenueDetail $venueDetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Venue Details'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Venues'), ['controller' => 'Venues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venue'), ['controller' => 'Venues', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="venueDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($venueDetail) ?>
    <fieldset>
        <legend><?= __('Add Venue Detail') ?></legend>
        <?php
            echo $this->Form->control('venue_id', ['options' => $venues]);
            echo $this->Form->control('meta_description');
            echo $this->Form->control('seo_title');
            echo $this->Form->control('website_url');
            echo $this->Form->control('email');
            echo $this->Form->control('social_1_txt');
            echo $this->Form->control('social_1_url');
            echo $this->Form->control('social_2_txt');
            echo $this->Form->control('social_2_url');
            echo $this->Form->control('phone_fax');
            echo $this->Form->control('phone_2_txt');
            echo $this->Form->control('phone_2');
            echo $this->Form->control('description');
            echo $this->Form->control('postal_code');
            echo $this->Form->control('last_verified', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
