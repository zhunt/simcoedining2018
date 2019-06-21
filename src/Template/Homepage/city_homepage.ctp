<?php

if ($city['seo_title']) {
    $this->assign('title', $city['seo_title']);
    $this->Html->meta('description', $city['seo_description'],['block' => true]);
} else {
    $this->assign('title', "Places to Eat in {$city['name']}, {$city['region']['province']['name']}");
}

// set canonical link
$this->assign('canonical', $canonical );

 ?>

    <div class="jumbotron jumbotron-fluid title-banner">
    <div class="container ">
        <h1 class="display-4 text-center"><?= $city['name'] ?> Dining</h1>
        <p class="lead text-center pb-2">Places to Eat in <?= $city['name'] ?>, <?= $city['region']['province']['name'] ?></p>

        <!-- search form -->

    </div>
</div>
<!-- end top banner -->

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb small pl-0">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/">Canada</a></li>
            <li class="breadcrumb-item"><a href="/"><?= $city['region']['province']['name'] ?></a></li>
            <li class="breadcrumb-item active"><b><?= $city['name'] ?></b></li>
        </ol>
    </nav>
</div>

<!-- about barrie -->
<div class="container">
    <div class="row">
        <!--  city row -->
        <div class="col">
            <h2 class="display-4 section-header">About <?= $city['name'] ?>, <?= $city['region']['province']['name'] ?></h2>
            <p>Explore restaurants, bars, and cafés by locality</p>
        </div>
    </div>

</div>

<php if ( $city['city_text']) : ?>
    <div class="container">
        <h3>About <?= $city['name'] ?></h3>
        <?= $city['city_text']; ?>
    </div>
</php endif; ?>


<!-- Popular Searches -->
<!--
<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="mt-4 section-header">Popular Searches</h3>
            <p>Discover restaurants in <?= $city['name'] ?> by type of meal</p>
        </div>
    </div>

    <div class="row">

        <div class="card w-100 popular-searches">
            <div class="card-body">

                <div class="n/av-scroller">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/search/?city=<?= $city['slug'] ?>&feature=sports-bar">Sports Bars <i class="material-icons icon float-right">keyboard_arrow_right</i></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/search/?city=<?= $city['slug'] ?>&feature=breakfast">Breakfast Places <i class="material-icons icon float-right">keyboard_arrow_right</i></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/search/?city=<?= $city['slug'] ?>&feature=open-late">Late Eats <i class="material-icons icon float-right">keyboard_arrow_right</i></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/search/?city=<?= $city['slug'] ?>&feature=delivery">Delivery <i class="material-icons icon float-right">keyboard_arrow_right</i></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/search/?city=<?= $city['slug'] ?>&feature=take-away">Take Away <i class="material-icons icon float-right">keyboard_arrow_right</i></a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

</div>
-->


<?php echo $this->cell('CitiesLatestVenues', [$city, $city->id], ['cache' => [ 'key' => 'city_newest_' . $city->id] ]  );  ?>


<!-- Neighbourhoods and regions list section -->

<?php echo $this->cell('HomepageCityProducts', [$city, $city->id], ['cache' => [ 'key' => 'city_products_' . $city->id] ] ); // cuisines in this case ?>

    <!-- Neighbourhoods and regions list section end -->

<?php echo $this->cell('HomepageCityVenueTypes', [$city, $city->id], ['cache' => [ 'key' => 'city_venues_' . $city->id] ] );  ?>


<?php echo $this->cell('HomepageCityNeighbourhoods', [$city, $city->id], ['cache' => [ 'key' => 'city_neighbourhoods_' . $city->id] ] );  ?>

<!-- blog entries -->

<!-- latest articles -->

<div class="container mt-4">
    <div class="row justify-content-center mb-2">
        <div class="col">
            <h2 class="display-4 section-header">The Latest</h2>
            <h5>From <?= $city['name'] ?>, <?= $city['region']['province']['name'] ?></h5>
        </div>
    </div>

    <?php echo $this->cell('CitiesLatestBlog', [$city, $city->id] );  ?>
</div>





<!-- end if articles -->

<!-- end -->
<?php echo $this->element('public_footer'); ?>