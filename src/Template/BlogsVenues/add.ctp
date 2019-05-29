<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BlogsVenue $blogsVenue
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Blogs Venues'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Blogs'), ['controller' => 'Blogs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Blog'), ['controller' => 'Blogs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Venues'), ['controller' => 'Venues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venue'), ['controller' => 'Venues', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="blogsVenues form large-9 medium-8 columns content">
    <?= $this->Form->create($blogsVenue) ?>
    <fieldset>
        <legend><?= __('Add Blogs Venue') ?></legend>
        <?php
            echo $this->Form->control('blog_id', ['options' => $blogs]);
            echo $this->Form->control('venue_id', ['options' => $venues]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
