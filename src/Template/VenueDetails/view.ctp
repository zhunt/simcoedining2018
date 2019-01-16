<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VenueDetail $venueDetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Venue Detail'), ['action' => 'edit', $venueDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Venue Detail'), ['action' => 'delete', $venueDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venueDetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Venue Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venue Detail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Venues'), ['controller' => 'Venues', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venue'), ['controller' => 'Venues', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="venueDetails view large-9 medium-8 columns content">
    <h3><?= h($venueDetail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Venue') ?></th>
            <td><?= $venueDetail->has('venue') ? $this->Html->link($venueDetail->venue->name, ['controller' => 'Venues', 'action' => 'view', $venueDetail->venue->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Seo Title') ?></th>
            <td><?= h($venueDetail->seo_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Website Url') ?></th>
            <td><?= h($venueDetail->website_url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($venueDetail->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Social 1 Txt') ?></th>
            <td><?= h($venueDetail->social_1_txt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Social 1 Url') ?></th>
            <td><?= h($venueDetail->social_1_url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Social 2 Txt') ?></th>
            <td><?= h($venueDetail->social_2_txt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Social 2 Url') ?></th>
            <td><?= h($venueDetail->social_2_url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone Fax') ?></th>
            <td><?= h($venueDetail->phone_fax) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone 2 Txt') ?></th>
            <td><?= h($venueDetail->phone_2_txt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone 2') ?></th>
            <td><?= h($venueDetail->phone_2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Postal Code') ?></th>
            <td><?= h($venueDetail->postal_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($venueDetail->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Verified') ?></th>
            <td><?= h($venueDetail->last_verified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Meta Description') ?></h4>
        <?= $this->Text->autoParagraph(h($venueDetail->meta_description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($venueDetail->description)); ?>
    </div>
</div>
