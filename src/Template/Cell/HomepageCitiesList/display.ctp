<!-- Cities list section -->
<div class="container">
    <div class="row">
        <!--  city row -->
        <div class="col">
            <h2 class="mt-4 display-4 section-header">Popular locations in Canada</h2>
            <p class="section-header">From swanky upscale restaurants to the cosiest hidden gems serving the most incredible food, Zomato covers it all. Explore menus, and millions of restaurant photos and reviews from users just like you, to find your next great meal.</p>
        </div>
    </div>

    <div class="row">

        <div class="card w-100 cities-list">

            <div class="card-body">

                <div class="row">
                    <div class="col">
                        <h3>ONTARIO</h3>
                    </div>
                </div>

                <!-- citis in Ontario start -->
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4 ">
                        <ul class="list-unstyled">

                            <?php foreach( $citiesList[0] as $key => $val  ):  ?>
                            <li>
                                <div class="ui segment d-flex p-1">
                                    <a class="pl-2" href="/city/<?= $key ?>"><?= $val ?> Restaurants</a>
                                    <i class="material-icons icon float-right">keyboard_arrow_right</i>
                                </div>
                            </li>
                            <?php endforeach; ?>

                        </ul>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4 ">
                        <ul class="list-unstyled">
                            <?php foreach( $citiesList[1] as $key => $val  ):  ?>
                                <li>
                                    <div class="ui segment d-flex p-1">
                                        <a class="pl-2" href="/city/<?= $key ?>"><?= $val ?> Restaurants</a>
                                        <i class="material-icons icon float-right">keyboard_arrow_right</i>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <ul class="list-unstyled">
                            <?php foreach( $citiesList[2] as $key => $val  ):  ?>
                                <li>
                                    <div class="ui segment d-flex p-1">
                                        <a class="pl-2" href="/city/<?= $key ?>"><?= $val ?> Restaurants</a>
                                        <i class="material-icons icon float-right">keyboard_arrow_right</i>
                                    </div>
                                </li>
                            <?php endforeach; ?>

                        </ul>
                    </div>
                </div>

                <!--  city row -->
                <div class="row mt-2">
                    <div class="col">
                        <h3>QUEBEC</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4 ">
                        <ul class="list-unstyled">
                            <li>Toronto Restaurants</li>

                            <li>Kingston, Ontario Restaurants</li>

                            <li>Cambridge, Ontario Restaurants</li>

                            <li>London, Ontario Restaurants</li>

                            <li>Brantford Restaurants</li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4 ">
                        <ul class="list-unstyled">
                            <li>Toronto Restaurants</li>

                            <li>Kingston, Ontario Restaurants</li>

                            <li>Cambridge, Ontario Restaurants</li>

                            <li>London, Ontario Restaurants</li>

                            <li>Brantford Restaurants</li>
                        </ul>
                    </div>

                </div> <!--  city row end -->

            </div> <!-- card body -->

        </div> <!-- end of cities list -->
        <!-- -->



    </div> <!-- end of row -->

</div> <!-- end of container -->