<div class="container">

    <div class="row">
        <!--  city row -->
        <div class="col">
            <h3 class="mt-4 section-header">Cuisines and Best Of <?= $city ?>, <?= $province ?></h3>
            <p>Explore restaurants, bars, and cafés by locality</p>
        </div>
    </div>

    <div class="row">

        <div class="card w-100 regions-list">

            <div class="card-body">

                <div class="row">
                    <div class="col">
                        <h4>Neighbourhoods</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4 ">
                        <ul class="list-unstyled">
                            <?php foreach ($cuisinesList[0] as $cuisine): ?>
                                <li>
                                    <a title="<?= $cuisine['name'] ?> Restaurants in <?= $city ?>" href="/search/neighbourhood=<?= $cuisine['slug'] ?>&city=<?= $citySlug ?>"><?= $cuisine['name'] ?> <small class="text-muted d-none d-md-block">(<?= $cuisine['total_venues'] ?> places)</small></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4 ">
                        <ul class="list-unstyled">
                            <?php foreach ($cuisinesList[1] as $cuisine): ?>
                                <li>
                                    <a title="<?= $cuisine['name'] ?> Restaurants in <?= $city ?>" href="/search/neighbourhood=<?= $cuisine['slug'] ?>&city=<?= $citySlug ?>"><?= $cuisine['name'] ?> <small class="text-muted d-none d-md-block">(<?= $cuisine['total_venues'] ?> places)</small></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <ul class="list-unstyled">
                            <?php foreach ($cuisinesList[2] as $cuisine): ?>
                                <li>
                                    <a title="<?= $cuisine['name'] ?> Restaurants in <?= $city ?>" href="/search/neighbourhood=<?= $cuisine['slug'] ?>&city=<?= $citySlug ?>"><?= $cuisine['name'] ?> <small class="text-muted d-none d-md-block">(<?= $cuisine['total_venues'] ?> places)</small></a>
                                </li>
                            <?php endforeach; ?>

                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>