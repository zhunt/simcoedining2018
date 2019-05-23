<div class="container">
    <div class="row">
        <!--  city row -->
        <div class="col">
            <h3 class="mt-4 section-header">Newest in <?php echo "{$city}, {$province}" ?></h3>

        </div>
    </div>

    <div class="row">

        <?php foreach( $newVenues as $venue): ?>
        <div class="col-sm col-md-6 col-lg-4">
            <div class="card mt-2">
                <img class="card-img-top"
                     srcset = "<?php foreach ($venue['srcset_images'] as $size => $filename ) { echo " {$filename} {$size}, ";} ?>"
                     alt="picture of <?= h($venue['title']) ?>" loading="auto" >
                <div class="card-body">
                    <h5 class="card-title"><?= h($venue['title']) ?></h5>

                    <p class="card-text">
                        <ul class="list-unstyled">
                        <?php foreach ($venue['venues'] as $singleVenue): ?>
                        <li><?= $singleVenue ?></li>
                        <?php endforeach; ?>

                        </ul>
                    </p>
                   <!-- <p><a href="" class="card-text float-right">More</a></p> -->
                </div>
            </div>
        </div>

        <?php endforeach; ?>

      <!--

        <div class="col-sm col-md-6 col-lg-4">
            <div class="card mt-2">
                <img class="card-img-top" src="https://res.cloudinary.com/yyztech-group-media/image/upload/v1558497690/alcohol-ale-bar-159291_evczoe.jpg" alt="picture of alcohol at bar" >
                <div class="card-body">
                    <h5 class="card-title">Bars</h5>

                    <p class="card-text">
                    <ul class="list-unstyled">
                        <li>Joe's Restaurant</li>
                        <li>Joe's Restaurant</li>
                        <li>Joe's Restaurant</li>
                        <li>Joe's Restaurant</li>
                    </ul>
                    </p>
                    <p><a href="" class="card-text float-right">More</a></p>
                </div>
            </div>
        </div>


        <div class="col-sm col-md-6 col-lg-4">
            <div class="card mt-2">
                <img class="card-img-top" src="https://res.cloudinary.com/yyztech-group-media/image/upload/v1558497691/aroma-aromatic-art-434213_ohzqlk.jpg" alt="picture of coffee cup" >
                <div class="card-body">
                    <h5 class="card-title">Cafe</h5>

                    <p class="card-text">
                    <ul class="list-unstyled">
                        <li>Joe's Restaurant</li>
                        <li>Joe's Restaurant</li>
                        <li>Joe's Restaurant</li>
                        <li>Joe's Restaurant</li>
                    </ul>
                    </p>
                    <p><a href="" class="card-text float-right">More</a></p>
                </div>
            </div>
        </div>

        <div class="col-sm col-md-6 col-lg-4">
            <div class="card mt-2">
                <img class="card-img-top" src="https://res.cloudinary.com/yyztech-group-media/image/upload/v1558497691/audience-club-dark-2114365_oryjjs.jpg" alt="picture of crowd at nighclub" >
                <div class="card-body">
                    <h5 class="card-title">Nighclub</h5>

                    <p class="card-text">
                    <ul class="list-unstyled">
                        <li>Joe's Restaurant</li>
                        <li>Joe's Restaurant</li>
                        <li>Joe's Restaurant</li>
                        <li>Joe's Restaurant</li>
                    </ul>
                    </p>
                    <p><a href="" class="card-text float-right">More</a></p>
                </div>
            </div>
        </div>

        -->

</div>


