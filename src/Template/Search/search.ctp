<?php
$this->assign('title', 'Search for: ' . $this->Text->toList($seoTags) . ', page ' . $this->Paginator->counter('{{page}} of {{pages}}') );
$this->Html->meta('robots','noindex,follow', ['block' => true]);
?>
<style xmlns="http://www.w3.org/1999/html">

    #map {
        height: 40vh;
        width: 100%;  /* The width is the width of the web page */
        border: 1px solid #82abc5;
    }
</style>

<div class="jumbotron jumbotron-fluid title-banner">
    <div class="container ">
        <h1 class="display-4 text-center">Simcoe Dining</h1>
        <p class="lead text-center pb-2">Searching for <?= $this->Text->toList($seoTags); ?></p>
        <!-- search form -->
    </div>
</div>
<!-- end top banner -->

<!-- search start -->


    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-8">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <?php if ($searchParamCity) {
                        echo "<li class=\"breadcrumb-item\"><a href=\"/city/{$searchParamCity['slug']}\">{$searchParamCity['name']}</a></li>";
                    }; ?>
                    <li class="breadcrumb-item active" aria-current="page">Search</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Search for: <?= $this->Text->toList($seoTags); ?></h5>


                    <div class="table-responsive">
                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">City</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $mapData = []; ?>
                            <?php foreach ($venues as $venue): ?>

                                <tr>
                                    <th scope="row"><a href="/<?= $venue->city->slug ?>/<?= $venue->slug ?>"><?= h($venue->name) ?></a></th>
                                    <td><?= h($venue->address) ?></td>
                                    <td><?= h($venue->city->name) ?></td>
                                </tr>
                                <?php $mapData[] = [ 'name'  => $venue->name,  'slug' => $venue->city->slug . '/' . $venue->slug, 'lat' => $venue->geo_lat, 'lng' => $venue->geo_lng, 'address' => $venue->address ]; ?>
                            <?php endforeach; ?>
                        </table>

                        <?php

                        $this->Paginator->setTemplates([
                            'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                            'prevDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                            'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                            'current' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                            'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                            'nextDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>'
                        ]); ?>

                        <nav aria-label="Page navigation example">
                            <ul class="pagination">

                                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                <?= $this->Paginator->numbers() ?>
                                <?= $this->Paginator->next(__('next') . ' >') ?>

                            </ul>
                        </nav>


                        <div id="map" class="panel map">Map Goes here</div>
                    </div>

                </div>

            </div>

            <hr>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">New Listings</h5>

                    <?php echo $this->Homepage->newestListings($newVenues); ?>

                </div>
            </div>
        </div>


    </div> <!-- /container -->




<!-- end of search -->

<!-- end -->
<?php echo $this->element('public_footer'); ?>

<?php // output all the venue data for map here

echo '<script>var mapdata=' . json_encode($mapData) . '</script>';

?>


<script>
    // Initialize and add the map

    var map;
    var markers = [];
    var bounds;

    function initMap() {

        bounds = new google.maps.LatLngBounds(); // put all markers into here;

        var mapCentre = {lat: 43.653226, 'lng': -79.383184 }; // default if empty

        if ( mapdata.length > 0) {
            mapCentre = {lat: mapdata[0].lat, lng: mapdata[0].lng };
        }

        map = new google.maps.Map(
            document.getElementById('map'), {zoom: 16, center: mapCentre});
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({position: mapCentre, map: map});

        for (var i = 0; i < mapdata.length; i++) {
            addMarker( mapdata[i]);
        }

        map.fitBounds(bounds); // auto-zoom
        map.panToBounds(bounds);
    }

    function addMarker(marker) {

        var infoWindow = new google.maps.InfoWindow({
            content: '<div><a href="/' + marker.slug + '">' + marker.name + '</a><br>' + marker.address + '</div>'
        });

        var newMarker = new google.maps.Marker({
            position: marker,
            map: map
        });

        var loc = new google.maps.LatLng(newMarker.position.lat(), newMarker.position.lng());
        bounds.extend(loc);

        newMarker.addListener('click', function() {
            infoWindow.open(map, newMarker);
        });

        markers.push( newMarker);
    }
</script>

<?= $this->Homepage->venueMapJS() ?>

