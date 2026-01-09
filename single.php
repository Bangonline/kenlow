<?php
get_header();	
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
	
    <?php while(have_posts()) : the_post(); ?>

    	<?php echo get_template_part('page_template/sections/banner');?>
		<div class="container blog">
			<div class="row">
				<div class="col-lg-7 blog-content">
					<?= get_field('content'); ?>
				</div>
				<div class="col-lg-1"></div>
				<div class="col-lg-4 side-bar-con">
					<div class="inner">
						<!-- custom sidebar -->
						<?php if ( is_active_sidebar( 'custom-side-bar' ) ) : ?>
						    <?php dynamic_sidebar( 'custom-side-bar' ); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
       
        

    <?php endwhile; // End of the loop. ?>
   
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();