<section class="more-info-cta">
    <div class="container">
        <div class="col-lg-12">
            <div class="more-info-cta__wrapper">

            <h4><?php the_sub_field('heading');?></h4>

            <div class="more-info-cta__text">
                <?php the_sub_field('content');?>
            </div>

            </div>
        </div>
    </div>
    <?php 
    $cta = get_sub_field('cta');?>

    <a href="<?php echo $cta['url'];?>" class="btn btn-green"><?php echo $cta['title'];?><i class="fas fa-angle-right"></i></a>

</section>