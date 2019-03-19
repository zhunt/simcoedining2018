<?php $this->assign('title', 'SimcoeDining'); ?>

<?php $this->assign('canonical', 'https://www.simcoedining.com/' ); ?>

<div class="jumbotron jumbotron-fluid title-banner">
    <div class="container ">
        <h1 class="display-4 text-center">Simcoe Dining</h1>
        <p class="lead text-center pb-2">Places to Eat in Ontario</p>

        <!-- search form -->

    </div>
</div>

<?php echo $this->cell('HomepageLatestBlog', [], [ 'cache' => true ]); ?>

<?php echo $this->cell('HomepageCitiesList', [], [ 'cache' => true ]); ?>

<?php echo $this->element('public_footer', [ 'cache' => true ]); ?>