<?php
get_header();	
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        
    <?php $args = array(
        "post_type" => "testimonial",
        "posts_per_page" => -1
    ); 
    
    $query = new WP_Query($args);?>
    
    <section class="banner no">
    	<div class="bg-container">
    		<div class="banner-overlay"></div>
    		<div class="skew-bg">
				<img src="/wp-content/themes/kenlow/assets/src/img/skew-bg-alt.png" alt="">
			</div>
    	</div>
    	
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-8  title-con d-flex flex-column justify-content-center">
    				<h1>Testimonials</h1>
				</div>
    			<div class="d-none "></div>
    			<div class="d-none  form-con"></div>
    		</div>
    	</div>
	
    </section>
	
	<div class="container testi--listing">
        <?php while($query->have_posts()) : $query->the_post(); ?>
			<div class="row">
				<div class="col-lg-12 testi-content">
					<h2><?=get_the_title();?></h2>
					<p><?=get_the_content()?></p>
					<span class="author--name"><?=get_field('ta_author_name');?></span>
				</div>
			</div>
        <?php endwhile; // End of the loop. ?>
	</div>
   
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();