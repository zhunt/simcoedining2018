
<?php // debug($venue);
$pageTitle = ($venue['seo_title']) ? $venue['seo_title'] : trim("{$venue['name']} {$venue['sub_name']}") . ", {$venue['city']['name']}";

if ($venue['venue_closed']) $pageTitle .= ' (Closed)';

$this->assign('title', trim($pageTitle) ) ?>


<?php $this->assign('canonical', $canonical ); ?>


<?php if ($venue['main_image_url']) {

     $this->Html->meta('twitter:card', 'summary_large_image',['block' => true]);
    $this->Html->meta('twitter:site', '@simcoedining',['block' => true]);
    $this->Html->meta('twitter:creator', '@simcoedining',['block' => true]);
    $this->Html->meta('twitter:title', $pageTitle,['block' => true]);
    $this->Html->meta('twitter:description',  substr( strip_tags($venue['venue_description']), 0, strpos( $venue['venue_description'], '.') ) ,['block' => true]);
    $this->Html->meta('twitter:image', $venue['main_image_url'],['block' => true]);
}
?>

<!-- navbar -->

<style xmlns="http://www.w3.org/1999/html">

    #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
    }
</style>




<?php // debug($venue); ?>
<!-- main site starts -->
<main role="main">

    <!-- Main jumbotron for a primary marketing message or call to action -->
<!--
    <div class="jumbotron title-background">
        <div class="container">


        </div>
    </div>
-->
    <!-- body of page -->
    <div class="container">


        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-8">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/city/<?= $venue['city']['slug'] ?>"><?= $venue['city']['name'] ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= "{$venue['name']}" ?></li>
                    </ol>
                </nav>

                <div class="card">
                    <div class="card-body venue-title">
                        <h1 class="h1"><?= "{$venue['name']} <small>{$venue['sub_name']}" ?></small></h1>
                        <h5 class="venue-address"><?= $venue['address'] ?> <!-- , <?= $venue['city']['name'] ?> --></h5>
                    </div>
                    <?php if ($venue['main_image_url']): ?>
                    <div class="card-body" style="padding-left: 0; padding-right: 0">
                        <img class="img-fluid" style="width: -webkit-fill-available;" src="<?= $venue['main_image_url'] ?>" alt="<?= "Image of {$venue['name']}" ?>" />
                    </div>
                    <?php endif; ?>
                    <div>
                        <div id="map" style="background-color: transparent; height: 10rem; margin-bottom: 1rem;"><?= $venue['geo_lat'] . ',' . $venue['geo_lat'] ?></div>
                    </div>

                    <div class="card-body venue-card">
                        <h5 class="card-title">About <?= $venue['name'] ?>:</h5>

                        <?php if ( $venue['venue_closed'] ): ?>

                        <h4 class="text-center closed" style="color: #f44336">Sorry, This <?= $venue['name'] ?> Location Has Been Reported Closed.</h4>

                        <?php endif; ?>


                        <?= $venue['venue_description'] ?>

                        <p><?= $venue['venue']['last_verified'] ?></p>

                        <!-- <b class="category-title">Type:</b> -->
                        <?= $this->Homepage->listOfSubcategories($venue['venue_types'], $venue['city']['slug'], 'store-type') ?>

                        <?php if ($venue['venue_products']): ?>
                        <b class="category-title">Cuisines:</b>
                        <?= $this->Homepage->listOfSubcategories($venue['venue_products'], $venue['city']['slug'], 'product') ?>
                        <?php endif; ?>

                        <?php if ($venue['venue_services']): ?>
                        <b class="category-title">Features:</b>
                        <?= $this->Homepage->listOfSubcategories($venue['venue_services'], $venue['city']['slug'], 'service') ?>
                        <?php endif; ?>

                        <?php if ($venue['venue_amenities']): ?>
                        <b class="category-title">Amenities:</b>
                        <?= $this->Homepage->listOfSubcategories($venue['venue_amenities'], $venue['city']['slug'], 'amenity') ?>
                        <?php endif; ?>

                    </div>

                </div>

                <hr>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Contact Info.:</h5>

                        <div class="row">

                            <div class="col">
                                <p>
                                    <?= $venue['address'] ?><br>
                                   <!--  <?= $venue['city']['name'] ?>
                                    <?= $venue['venue_detail']['postal_code'] ?><br> -->

                                </p>
                            </div>
                            <!--
                            <div class="col">
                                <p><b>Intersection:</b><br>
                                    <?= $venue['intersection']['name']?></p>
                            </div>
-->
                            <div class="col">
                                <!-- <p><b>Chain:</b> <?= "<a href=\"/search/?chain={$venue['chain']['slug']}&city={$venue['city']['slug']}\">{$venue['chain']['name']}</a>"; ?></p> -->

                                <p><b>Phone:</b>  <?= $venue['phone']?></p>

                                <?php if ($venue['website_url']): ?>
                                <p><b><?= "<a href=\"{$venue['website_url']}\" target=\"_blank\">Website</a>"; ?> </b></p>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>

                <hr>
            </div>

            <div class="col-md-4">
                <div class="card" >
                    <div class="card-body" <?php echo $venue['venue_closed'] ? 'style="display: none"' : ''; ?> >
                        <h5 class="card-title">Hours Of Operation</h5>

                        <div class="table-responsive">
                            <table class="table table-hover">

                                <thead>
                                <tr>
                                    <th scope="col">Day</th>
                                    <th scope="col">Hours</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr >
                                    <th scope="row">Mon.</td><td> <?= $venue['hours_mon'] ?> </td></tr>
                                <tr>
                                    <th scope="row">Tues.</td><td><?= $venue['hours_tue'] ?></td></tr>
                                <tr>
                                    <th scope="row">Wed.</td><td><?= $venue['hours_wed'] ?></td></tr>
                                <tr>
                                    <th scope="row">Thur.</td><td><?= $venue['hours_thu'] ?></td></tr>
                                <tr >
                                    <th scope="row">Fri.</td><td><?= $venue['hours_fri'] ?></td></tr>
                                <tr>
                                    <th scope="row">Sat.</td><td><?= $venue['hours_sat'] ?></td></tr>
                                <tr>
                                    <th scope="row">Sun.</td><td><?= $venue['hours_sun'] ?></td></tr>
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
                <hr>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Places Nearby</h5>
                        <?php echo $this->Homepage->nearbyListings($nearbyVenues); ?>
                    </div>
                </div>

            </div>


        </div> <!-- /container -->


</main>



<?php echo $this->element('public_footer'); ?>

<script>
    // Initialize and add the map
    function initMap() {
        // The location of Uluru
        var location = {lat:  <?= $venue['geo_lat'] ?>, lng:  <?= $venue['geo_lng'] ?>};
        // The map, centered at Uluru
        var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 16, center: location});
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({position: location, map: map});
    }
</script>

<?= $this->Homepage->venueMapJS() ?>
