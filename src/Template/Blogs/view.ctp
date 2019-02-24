<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Blog $blog
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Blog'), ['action' => 'edit', $blog->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Blog'), ['action' => 'delete', $blog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blog->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Blogs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Blog'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="blogs view large-9 medium-8 columns content">
    <h3><?= h($blog->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Guid') ?></th>
            <td><?= h($blog->guid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($blog->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Modified') ?></th>
            <td><?= h($blog->date_modified) ?></td>
        </tr>
    </table>
</div>
