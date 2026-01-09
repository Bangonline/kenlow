<?php
get_header();	
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
	
    <?php while(have_posts()) : the_post(); ?>
    	<?php echo get_template_part('page_template/sections/banner');?>
		
        <?php
        // Check if product_template is set to beaver
        if (get_field('product_template') == 'beaver') {
            ?>
            <div class="container one-col">
                <?php
                the_content();
			    echo get_template_part('page_template/sections/inspiration');
                ?>
            </div>
            <?php
        } else {
            // If product_template is not beaver, fall back to other ACF fields
            if (get_field('product_template') == 'default') { ?>
                <div class="container two-col">
                    <div class="row">
                        <div class="col-lg-6">
                            <h2><?= get_field('heading'); ?></h2>
                        </div>
                        <div class="col-lg-6"></div>
                        <div class="col-lg-6">
                            <?= get_field('left_content'); ?>
                        </div>
                        <div class="col-lg-6">
                            <?= get_field('right_content'); ?>
                        </div>
                    </div>
                </div>
                <?php 
                echo get_template_part('page_template/sections/inspiration'); ?>
                
                <section class="request-quote-btn">
                    <a href="/free-measure-quote/" class="btn btn-green">Request a free quote <i class="fas fa-angle-right"></i></a>
                </section>
		
        		<?php echo get_template_part('page_template/sections/testimonials'); ?>
        
                <?php
            } else { ?>	
                <div class="container one-col">
                    <div class="row">
                        <div class="col-lg-12">
                            <?= the_field('toolbag_content'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <?php 
                        if (have_rows('toolbag_item')):
                            while (have_rows('toolbag_item')) : the_row(); 
                            ?>
                            <div class="col-lg-4">
                                <?php $toolbagImg = get_sub_field('tool_bag_image'); ?>
                                <img class="tool-bag-img" src="<?php echo $toolbagImg['url']; ?>" alt="<?php echo $toolbagImg['alt']; ?>">
                                <h3><?= get_sub_field('tool_bag_name'); ?></h3>
                                <?= get_sub_field('tool_bag_detail'); ?>
                            </div>
                            <?php 
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>
		
        		<?php echo get_template_part('page_template/sections/testimonials'); ?>
        
            <?php } 
        } ?>
        
    <?php endwhile; // End of the loop. ?>
   
    </main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();