<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col">
            <h2 class="display-4 section-header">The Latest</h2>
            <h5>From All Across SimcoeDining</h5>
        </div>
    </div>


    <div class="row justify-content-center ">

        <?php foreach( $wpPosts as $post): ?>
        <div class="col-12 col-md-6 col-lg- 4 col-xl-3 mb-4">

            <div class="card">
                <img class="card-img-top" src="<?= $post['image_url'] ?>" alt="<?= h($post['excerpt'] . ' title image' ) ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $post['title'] ?></h5>
                    <p class="card-text"><?= h($post['excerpt']); ?>.</p>
                    <a href="/blog/<?= $post['slug'] ?>" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>

        </div>
        <?php endforeach; ?>

    </div>
</div>