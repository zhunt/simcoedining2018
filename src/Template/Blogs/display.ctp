<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Blog $blog
 */


?>
<?php
// $this->set('meta', $wpPost['slug'] );
$this->assign('canonical', $canonicalPath );
$this->assign('title',  $wpPost['title'] );
$this->Html->meta('description',$wpPost['seo_desc'],['block' => true]);
//$this->assign('title',  $wpPost['title'] );

// insert Twitter feed here

// social_image_url

// set Twitter card meta

$this->Html->meta('twitter:card', 'summary_large_image',['block' => true]);
$this->Html->meta('og:image', $wpPost['social_image_url'],['block' => true]);
$this->Html->meta('twitter:image', $wpPost['social_image_url'],['block' => true]);

// other mete items are common to image and non-image cards

$this->Html->meta('twitter:site', '@simcoedining',['block' => true]);
$this->Html->meta('twitter:creator', '@simcoedining',['block' => true]);

$this->Html->meta('og:title', $wpPost['title'],['block' => true]);
$this->Html->meta('twitter:title', $wpPost['title'],['block' => true]);

$this->Html->meta('og:description',  $wpPost['seo_desc'] ,['block' => true]);
$this->Html->meta('twitter:description',  $wpPost['seo_desc'] ,['block' => true]);

$this->Html->meta('og:url', $canonicalPath,['block' => true]);



?>


<?php $this->append('headerCss');;?>
<style>
    p img {
        max-width: 100%;
        height: auto;
        margin: 0 auto;
        display: block;

    }
</style>
<?php $this->end(); ?>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            <h1><?php echo $wpPost['title'] ?></h1>
              <p><small><?php echo $blogTime ?></small></p>

            <h3 class="h5"><?php echo $wpPost['blog_lead']; ?></h3>


           <?php echo $wpPost['content'] ?>
        </div>


        <div class="col-12 col-md-4">
            <div class="panel">
                <!--
                <h4>Side column content goes here</h4>
                <p>Business books have since entered the limelight, and so have their writers, bagging home the joy of having their works recognized and even awarded for those who have been appearing at the top over the years.</p>
-->
            </div>

        </div>


    </div>
</div>

<?php echo $this->element('public_footer'); ?>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=zedhun"></script>



