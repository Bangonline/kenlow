<?php
get_header();	
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

	<?php echo get_template_part('page_template/sections/banner');?>
	
    <?php while(have_posts()) : the_post(); ?>
		<div class="container blog">
			<div class="row">
				<div class="col-lg-7 blog-content">
					<h2>Latest Kenlow updates</h2>
					<p>We'll keep you updated on any industry news</p>
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