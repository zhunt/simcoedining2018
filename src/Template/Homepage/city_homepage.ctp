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


<!-- Popular Searches -->

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
                            <a class="nav-link" href="/search/city:<?= $city['slug'] ?>&feature:sports-bar">Sports Bars <i class="material-icons icon float-right">keyboard_arrow_right</i></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/search/city:<?= $city['slug'] ?>&feature:breakfast">Breakfast Places <i class="material-icons icon float-right">keyboard_arrow_right</i></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/search/city:<?= $city['slug'] ?>&feature:open-late">Late Eats <i class="material-icons icon float-right">keyboard_arrow_right</i></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/search/city:<?= $city['slug'] ?>&feature:delivery">Delivery <i class="material-icons icon float-right">keyboard_arrow_right</i></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/search/city:<?= $city['slug'] ?>&feature:take-away">Take Away <i class="material-icons icon float-right">keyboard_arrow_right</i></a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

</div>


<!-- Neighbourhoods and regions list section -->

<?php echo $this->cell('HomepageCityProducts', [$city, $city->id] ); // cuisines in this case ?>

    <!-- Neighbourhoods and regions list section end -->

<?php echo $this->cell('HomepageCityVenueTypes', [$city, $city->id] );  ?>

<!-- blog entries -->

<!-- latest articles -->

<div class="container mt-4">
    <div class="row justify-content-center mb-2">
        <div class="col">
            <h2 class="display-4 section-header">The Latest</h2>
            <h5>From <?= $city['name'] ?>, <?= $city['region']['province']['name'] ?></h5>
        </div>
    </div>


    <div class="row justify-content-center ">
        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">

            <div class="card">
                <img class="card-img-top" src="/img/dev/cafe-chairs-menu-6267.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>

        </div>

        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">

            <div class="card">
                <img class="card-img-top" src="/img/dev/cafe-chairs-menu-6267.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title <br><small>Card title second line</small></h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>

        </div>

        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">

            <div class="card">
                <img class="card-img-top" src="/img/dev/cafe-chairs-menu-6267.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>

        </div>


        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">

            <div class="card">
                <img class="card-img-top" src="/img/dev/cafe-chairs-menu-6267.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>

        </div>


    </div>
</div>



<!-- end if articles -->

<!-- end -->
<?php echo $this->element('public_footer'); ?>