<section class="blind-materials">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">


            <div class="blind-materials__wrapper">
            <h2><?php the_sub_field('heading');?></h2>


            <div class="blind-materials__text">
                <?php the_sub_field('content');?>
            </div>

            <div class="blind-materials__listing">
                <?php 
                    if( have_rows('blind_materials_listing') ):
                    while ( have_rows('blind_materials_listing') ) : the_row(); 
                    
                        $thumbnail = get_sub_field('thumbnails');
                        $title = get_sub_field('title');
                        $content = get_sub_field('content');
                        $cta = get_sub_field('cta');

                    ?>
                    <div class="blind-materials__listing-item">
                        <div class="row">
                            <div class="col-md-5">
                                <a href="<?php echo $cta;?>">
                                    <img loading="lazy" src="<?php echo $thumbnail['url'];?>" alt="<?php echo $thumbnail['alt'];?>">
                                </a>
                            </div>

                            <div class="col-md-7">
                                <h3><?php echo $title;?></h3>
                                <div class="blind-materials__listing-item-text">
                                    <?php echo $content;?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                    endwhile;
                    endif;
                ?>

            </div>

                </div>

            </div>
        </div>
    </div>
</section>