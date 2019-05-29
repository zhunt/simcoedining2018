<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BlogsVenue[]|\Cake\Collection\CollectionInterface $blogsVenues
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Blogs Venue'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Blogs'), ['controller' => 'Blogs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Blog'), ['controller' => 'Blogs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Venues'), ['controller' => 'Venues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venue'), ['controller' => 'Venues', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="blogsVenues index large-9 medium-8 columns content">
    <h3><?= __('Blogs Venues') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('blog_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('venue_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($blogsVenues as $blogsVenue): ?>
            <tr>
                <td><?= $this->Number->format($blogsVenue->id) ?></td>
                <td><?= $blogsVenue->has('blog') ? $this->Html->link($blogsVenue->blog->id, ['controller' => 'Blogs', 'action' => 'view', $blogsVenue->blog->id]) : '' ?></td>
                <td><?= $blogsVenue->has('venue') ? $this->Html->link($blogsVenue->venue->name, ['controller' => 'Venues', 'action' => 'view', $blogsVenue->venue->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $blogsVenue->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $blogsVenue->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $blogsVenue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blogsVenue->id)]) ?>
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
