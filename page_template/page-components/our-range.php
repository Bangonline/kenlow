<section class="our-range">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 d-flex flex-column align-items-center">
				<h2><?= get_sub_field('heading'); ?></h2>

				<?php if(get_sub_field('sub_heading')):?>
				<div class="sub">
					<?= get_sub_field('sub_heading'); ?>
				</div>
				<?php endif;?>
			</div>
		</div>
		<div class="row">
			

			<?php 
			if( have_rows('range_listing') ):
			while ( have_rows('range_listing') ) : the_row(); 
			
			$cta = get_sub_field('range_cta');
			?>
			<div class="col col-lg-6 col-sm-6 col-xs-12">
				<div class="item" data-aos="fade-down" data-aos-delay="<?php echo get_row_index(); ?>00" data-aos-easing="linear">
					<div class="img-con">
						<?php $rangeImg = get_sub_field('range_image'); ?>
						<a href="<?= get_sub_field('range_cta_link'); ?>">
							<img loading="lazy" src="<?= $rangeImg['url'];  ?>" alt="<?= $rangeImg['alt'];  ?>">
						</a>
					</div>
					<div class="detail">
						<h3><?= get_sub_field('range_name'); ?></h3>
						<?= get_sub_field('range_description'); ?>
					</div>
					<a href="<?= $cta['url']; ?>" class="btn btn-blue"><?= $cta['title']; ?> <i class="fas fa-angle-right"></i></a>
				</div>
			</div>
			<?php 
			endwhile;
			endif;
			?>
			
		</div>
	</div>
</section>