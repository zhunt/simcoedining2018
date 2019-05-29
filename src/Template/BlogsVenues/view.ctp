<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BlogsVenue $blogsVenue
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Blogs Venue'), ['action' => 'edit', $blogsVenue->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Blogs Venue'), ['action' => 'delete', $blogsVenue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blogsVenue->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Blogs Venues'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Blogs Venue'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Blogs'), ['controller' => 'Blogs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Blog'), ['controller' => 'Blogs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Venues'), ['controller' => 'Venues', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venue'), ['controller' => 'Venues', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="blogsVenues view large-9 medium-8 columns content">
    <h3><?= h($blogsVenue->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Blog') ?></th>
            <td><?= $blogsVenue->has('blog') ? $this->Html->link($blogsVenue->blog->id, ['controller' => 'Blogs', 'action' => 'view', $blogsVenue->blog->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Venue') ?></th>
            <td><?= $blogsVenue->has('venue') ? $this->Html->link($blogsVenue->venue->name, ['controller' => 'Venues', 'action' => 'view', $blogsVenue->venue->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($blogsVenue->id) ?></td>
        </tr>
    </table>
</div>
