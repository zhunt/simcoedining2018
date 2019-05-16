<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\City $city
 */
use Cake\Core\Configure; ?>

<?php $this->Html->scriptStart(['block' => true]); ?>
$(document).ready(function() {
$('.select2').select2();
});

//window.googlemapKey = '<?= Configure::read('gmapApiKey'); ?>';

$(document).ready(function() {
$('.select2').select2();
});

$(function() { $('textarea').froalaEditor() });
<?php $this->Html->scriptEnd(); ?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Regions'), ['controller' => 'Regions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Region'), ['controller' => 'Regions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List City Neighbourhoods'), ['controller' => 'CityNeighbourhoods', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City Neighbourhood'), ['controller' => 'CityNeighbourhoods', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List City Regions'), ['controller' => 'CityRegions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City Region'), ['controller' => 'CityRegions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Intersections'), ['controller' => 'Intersections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Intersection'), ['controller' => 'Intersections', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Venues'), ['controller' => 'Venues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venue'), ['controller' => 'Venues', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cities form large-9 medium-8 columns content">
    <?= $this->Form->create($city) ?>
    <fieldset>
        <legend><?= __('Add City') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('slug');
            echo $this->Form->control('venue_count');
            echo $this->Form->control('region_id', ['options' => $regions, 'class' => 'select2']);
            echo $this->Form->control('locality');
            echo $this->Form->control('newest_venue_types');
            echo $this->Form->control('seo_title');
            echo $this->Form->control('seo_description');
            echo $this->Form->control('city_text');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
