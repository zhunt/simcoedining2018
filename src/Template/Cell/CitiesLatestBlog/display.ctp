<div class="row justify-content-center ">

    <?php foreach( $wpPosts as $post): ?>
    <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">

        <div class="card">
            <img class="card-img-top" src="<?= $post['image_url'] ?>" alt="<?= h($post['excerpt'] . ' title image' ) ?>">
            <div class="card-body">
                <h5 class="card-title"><?= $post['title'] ?></h5>
                <p class="card-text"><?= h($post['excerpt']); ?></p>
                <a href="/blog/<?= $post['slug'] ?>"  class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

    </div>


    <?php endforeach; ?>
<!--
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

-->

</div>