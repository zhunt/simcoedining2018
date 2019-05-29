<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BlogCategory $blogCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Blog Category'), ['action' => 'edit', $blogCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Blog Category'), ['action' => 'delete', $blogCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blogCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Blog Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Blog Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Blogs'), ['controller' => 'Blogs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Blog'), ['controller' => 'Blogs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="blogCategories view large-9 medium-8 columns content">
    <h3><?= h($blogCategory->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($blogCategory->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($blogCategory->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($blogCategory->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Blogs') ?></h4>
        <?php if (!empty($blogCategory->blogs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Wordpress Guid') ?></th>
                <th scope="col"><?= __('Date Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($blogCategory->blogs as $blogs): ?>
            <tr>
                <td><?= h($blogs->id) ?></td>
                <td><?= h($blogs->wordpress_guid) ?></td>
                <td><?= h($blogs->date_modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Blogs', 'action' => 'view', $blogs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Blogs', 'action' => 'edit', $blogs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Blogs', 'action' => 'delete', $blogs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blogs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
