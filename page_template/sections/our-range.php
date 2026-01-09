<section class="our-range">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 d-flex flex-column align-items-center">
				<h2><?= get_field('range_title'); ?></h2>
				<div class="sub">
					<?= get_field('range_sub'); ?>
				</div>
			</div>
		</div>
		<div class="row">
			

			<?php 
			if( have_rows('range') ):
			while ( have_rows('range') ) : the_row(); ?>
			<div class="col-lg-3 col-sm-6">
				<div class="item" data-aos="fade-down" data-aos-delay="<?php echo get_row_index(); ?>00" data-aos-easing="linear">
					<div class="img-con">
						<?php $rangeImg = get_sub_field('range_image'); ?>
						<a href="<?= get_sub_field('range_cta_link'); ?>">
							<img src="<?= $rangeImg['url']; ?>" alt="<?= $rangeImg['alt']; ?>">
						</a>
					</div>
					<div class="detail">
						<h3><?= get_sub_field('range_name'); ?></h3>
						<?= get_sub_field('range_description'); ?>
					</div>
					<a href="<?= get_sub_field('range_cta_link'); ?>" class="btn btn-blue"><?= get_sub_field('range_cta_text'); ?> <i class="fas fa-angle-right"></i></a>
				</div>
			</div>
			<?php 
			endwhile;
			endif;
			?>
			
		</div>
	</div>
</section>