<div class="container">
    <div class="row">
        <!--  city row -->
        <div class="col">
            <h3 class="mt-4 section-header">Venue Types in <?= $city ?>, <?= $province ?></h3>
            <p>Explore restaurants, bars, and cafés by locality</p>
        </div>
    </div>

    <div class="row">

        <div class="card w-100 regions-list">

            <div class="card-body">

                <div class="row">
                    <div class="col">
                        <h4>Venue Types</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4 ">
                        <ul class="list-unstyled">
                            <?php foreach ($venueTypeList[0] as $venueType): ?>
                                <li>
                                    <a title="<?= $venueType['name'] ?> in <?= $city ?>" href="/search/venueType=<?= $venueType['slug'] ?>&city=<?= $citySlug ?>"><?= $venueType['name'] ?> <small class="text-muted d-none d-md-block">(<?= $venueType['total_venues'] ?> places)</small></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4 ">
                        <ul class="list-unstyled">
                            <?php foreach ($venueTypeList[1] as $venueType): ?>
                                <li>
                                    <a title="<?= $venueType['name'] ?> in <?= $city ?>" href="/search/venueType=<?= $venueType['slug'] ?>&city=<?= $citySlug ?>"><?= $venueType['name'] ?> <small class="text-muted d-none d-md-block">(<?= $venueType['total_venues'] ?> places)</small></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <ul class="list-unstyled">
                            <?php foreach ($venueTypeList[2] as $venueType): ?>
                                <li>
                                    <a title="<?= $venueType['name'] ?> in <?= $city ?>" href="/search/venueType=<?= $venueType['slug'] ?>&city=<?= $citySlug ?>"><?= $venueType['name'] ?> <small class="text-muted d-none d-md-block">(<?= $venueType['total_venues'] ?> places)</small></a>
                                </li>
                            <?php endforeach; ?>

                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>