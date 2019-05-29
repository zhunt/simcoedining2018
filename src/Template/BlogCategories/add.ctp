<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BlogCategory $blogCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Blog Categories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Blogs'), ['controller' => 'Blogs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Blog'), ['controller' => 'Blogs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="blogCategories form large-9 medium-8 columns content">
    <?= $this->Form->create($blogCategory) ?>
    <fieldset>
        <legend><?= __('Add Blog Category') ?></legend>
        <?php
            echo $this->Form->control('slug');
            echo $this->Form->control('name');
            echo $this->Form->control('blogs._ids', ['options' => $blogs]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
