<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Blog $blog
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Blogs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Blog Categories'), ['controller' => 'BlogCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Blog Category'), ['controller' => 'BlogCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Blog Locations'), ['controller' => 'BlogLocations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Blog Location'), ['controller' => 'BlogLocations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Venues'), ['controller' => 'Venues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venue'), ['controller' => 'Venues', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="blogs form large-9 medium-8 columns content">
    <?= $this->Form->create($blog) ?>
    <fieldset>
        <legend><?= __('Add Blog') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('title_image_url');
            echo $this->Form->control('home_page_description');
            echo $this->Form->control('wordpress_guid');
            echo $this->Form->control('flag_published');
            echo $this->Form->control('blog_content');
            echo $this->Form->control('blog_lead');
            echo $this->Form->control('seo_desc');
            echo $this->Form->control('date_created', ['empty' => true]);
            echo $this->Form->control('date_modified', ['empty' => true]);
            echo $this->Form->control('blog_categories._ids', ['options' => $blogCategories]);
            echo $this->Form->control('blog_locations._ids', ['options' => $blogLocations]);
            echo $this->Form->control('venues._ids', ['options' => $venues]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script src="/js/admin_app.js"></script>