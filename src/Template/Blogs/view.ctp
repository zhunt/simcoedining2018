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
        <li><?= $this->Html->link(__('List Blog Categories'), ['controller' => 'BlogCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Blog Category'), ['controller' => 'BlogCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Blog Locations'), ['controller' => 'BlogLocations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Blog Location'), ['controller' => 'BlogLocations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Venues'), ['controller' => 'Venues', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venue'), ['controller' => 'Venues', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="blogs view large-9 medium-8 columns content">
    <h3><?= h($blog->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($blog->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title Image Url') ?></th>
            <td><?= h($blog->title_image_url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Wordpress Guid') ?></th>
            <td><?= h($blog->wordpress_guid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Seo Desc') ?></th>
            <td><?= h($blog->seo_desc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($blog->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Created') ?></th>
            <td><?= h($blog->date_created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Modified') ?></th>
            <td><?= h($blog->date_modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Home Page Description') ?></h4>
        <?= $this->Text->autoParagraph(h($blog->home_page_description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Blog Content') ?></h4>
        <?= $this->Text->autoParagraph(h($blog->blog_content)); ?>
    </div>
    <div class="row">
        <h4><?= __('Blog Lead') ?></h4>
        <?= $this->Text->autoParagraph(h($blog->blog_lead)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Blog Categories') ?></h4>
        <?php if (!empty($blog->blog_categories)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($blog->blog_categories as $blogCategories): ?>
            <tr>
                <td><?= h($blogCategories->id) ?></td>
                <td><?= h($blogCategories->slug) ?></td>
                <td><?= h($blogCategories->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'BlogCategories', 'action' => 'view', $blogCategories->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'BlogCategories', 'action' => 'edit', $blogCategories->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'BlogCategories', 'action' => 'delete', $blogCategories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blogCategories->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Blog Locations') ?></h4>
        <?php if (!empty($blog->blog_locations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($blog->blog_locations as $blogLocations): ?>
            <tr>
                <td><?= h($blogLocations->id) ?></td>
                <td><?= h($blogLocations->slug) ?></td>
                <td><?= h($blogLocations->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'BlogLocations', 'action' => 'view', $blogLocations->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'BlogLocations', 'action' => 'edit', $blogLocations->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'BlogLocations', 'action' => 'delete', $blogLocations->], ['confirm' => __('Are you sure you want to delete # {0}?', $blogLocations->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Venues') ?></h4>
        <?php if (!empty($blog->venues)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Sub Name') ?></th>
                <th scope="col"><?= __('Seo Title') ?></th>
                <th scope="col"><?= __('Seo Description') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Geo Lat') ?></th>
                <th scope="col"><?= __('Geo Lng') ?></th>
                <th scope="col"><?= __('Main Image Url') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Website Url') ?></th>
                <th scope="col"><?= __('Region Id') ?></th>
                <th scope="col"><?= __('City Id') ?></th>
                <th scope="col"><?= __('City Region Id') ?></th>
                <th scope="col"><?= __('City Neighbourhood Id') ?></th>
                <th scope="col"><?= __('Intersection Id') ?></th>
                <th scope="col"><?= __('Publish State Id') ?></th>
                <th scope="col"><?= __('Venue Closed') ?></th>
                <th scope="col"><?= __('Chain Id') ?></th>
                <th scope="col"><?= __('Last Verified') ?></th>
                <th scope="col"><?= __('Hours Sun') ?></th>
                <th scope="col"><?= __('Hours Mon') ?></th>
                <th scope="col"><?= __('Hours Tue') ?></th>
                <th scope="col"><?= __('Hours Wed') ?></th>
                <th scope="col"><?= __('Hours Thu') ?></th>
                <th scope="col"><?= __('Hours Fri') ?></th>
                <th scope="col"><?= __('Hours Sat') ?></th>
                <th scope="col"><?= __('Venue Description') ?></th>
                <th scope="col"><?= __('Client Type Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($blog->venues as $venues): ?>
            <tr>
                <td><?= h($venues->id) ?></td>
                <td><?= h($venues->name) ?></td>
                <td><?= h($venues->slug) ?></td>
                <td><?= h($venues->sub_name) ?></td>
                <td><?= h($venues->seo_title) ?></td>
                <td><?= h($venues->seo_description) ?></td>
                <td><?= h($venues->address) ?></td>
                <td><?= h($venues->geo_lat) ?></td>
                <td><?= h($venues->geo_lng) ?></td>
                <td><?= h($venues->main_image_url) ?></td>
                <td><?= h($venues->phone) ?></td>
                <td><?= h($venues->website_url) ?></td>
                <td><?= h($venues->region_id) ?></td>
                <td><?= h($venues->city_id) ?></td>
                <td><?= h($venues->city_region_id) ?></td>
                <td><?= h($venues->city_neighbourhood_id) ?></td>
                <td><?= h($venues->intersection_id) ?></td>
                <td><?= h($venues->publish_state_id) ?></td>
                <td><?= h($venues->venue_closed) ?></td>
                <td><?= h($venues->chain_id) ?></td>
                <td><?= h($venues->last_verified) ?></td>
                <td><?= h($venues->hours_sun) ?></td>
                <td><?= h($venues->hours_mon) ?></td>
                <td><?= h($venues->hours_tue) ?></td>
                <td><?= h($venues->hours_wed) ?></td>
                <td><?= h($venues->hours_thu) ?></td>
                <td><?= h($venues->hours_fri) ?></td>
                <td><?= h($venues->hours_sat) ?></td>
                <td><?= h($venues->venue_description) ?></td>
                <td><?= h($venues->client_type_id) ?></td>
                <td><?= h($venues->created) ?></td>
                <td><?= h($venues->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Venues', 'action' => 'view', $venues->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Venues', 'action' => 'edit', $venues->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Venues', 'action' => 'delete', $venues->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venues->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
