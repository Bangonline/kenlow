<?php
get_header();	
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
	
    

    	<?php echo get_template_part('page_template/sections/banner');?>
		<div class="container blog blog-main">
			<div class="row">
				<div class="col-lg-7 blog-content">
					<h2 class="alt">Latest Kenlow updates</h2>
					<p>We'll keep you updated on any industry news</p>
					<ul class="blog-item-con">
						<?php
						global $paged;
						$curpage = $paged ? $paged : 1;
						$args = array(
						    'post_type' => 'post',
						    'order' => 'desc',
						    'posts_per_page' => 2,
						    'paged' => $paged
						);
						$query = new WP_Query($args);
						if($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
						?>
						<div id="post-<?php the_ID(); ?>" class="quote">
							

						

						<li class="blog-item">
							<h3 class="alt"><a href="<?= get_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p class="date">Posted on <?php echo get_the_date('n/j/Y'); ?></p>
							<p><?php the_excerpt(); ?></p>
						</li>
						<?php
						endwhile;
						    echo '
						    <div id="wp-pagination">
						        ';
						        for($i=1;$i<=$query->max_num_pages;$i++)
						            echo '<a class="'.($i == $curpage ? 'active ' : '').'page button" href="'.get_pagenum_link($i).'">'.$i.'</a>';
						        echo '
						    </div>
						    ';
						    wp_reset_postdata();
						endif;
						?>
					</ul>
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
       
        

   
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();