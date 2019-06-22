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


