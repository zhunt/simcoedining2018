<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Region $region
 */
?>
<?php $this->Html->scriptStart(['block' => true]); ?>
$(document).ready(function() {
$('.select2').select2();
});
<?php $this->Html->scriptEnd(); ?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Regions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Provinces'), ['controller' => 'Provinces', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Province'), ['controller' => 'Provinces', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Venues'), ['controller' => 'Venues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venue'), ['controller' => 'Venues', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="regions form large-9 medium-8 columns content">
    <?= $this->Form->create($region) ?>
    <fieldset>
        <legend><?= __('Add Region') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('slug');
            echo $this->Form->control('province_id', ['options' => $provinces, 'class' => 'select2']);
            echo $this->Form->control('administrative_area_level_2');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
