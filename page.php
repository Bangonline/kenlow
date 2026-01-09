<?php
get_header();	

if(is_page('contact-us')): $load_gmaps = true; endif;
?>


<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

    <?php while(have_posts()) : the_post(); ?>

    	<?php echo get_template_part('page_template/sections/banner');?>
		<?php if( get_field('visibility') == 'show' ){ echo get_template_part('page_template/sections/two-column'); } ?>
		<div class="container">
			<div class="row">
				<div class="col-12 generic">
					<?php the_field('content'); ?>
					<?php the_content(); ?>
				</div>
			</div>
		</div>
        <?php echo get_template_part('page_template/sections/testimonials'); ?>
        

    <?php endwhile; // End of the loop. ?>
   
    </main><!-- #main -->
</div><!-- #primary -->



<?php
get_footer();