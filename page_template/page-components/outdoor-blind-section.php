<?php
       $content = get_sub_field('text_content');
       $headline = get_sub_field('headline');
       $cta = get_sub_field('cta');
?>

<section class="outdoor-text">
    <div class="container">
        <div class="row">
            <div class="outdoor-text__wrapper">

                <div class="col-lg-12">
                    <h2><?php echo $headline;?></h2>

                    <div class="outdoor-text__text">
                        <?php echo $content;?>
                    </div>

                    <?php if($cta):?>
                    <div class="opening-text__cta">
                        <a class="btn btn-green" href="<?php echo $cta['url'];?>">
                                
                                <?php echo $cta['title'];?>

                                <i class="fas fa-angle-right"></i>
                        </a>
                    </div>
                <?php endif;?>
                </div>

            </div>
        </div>
    </div>
</section>