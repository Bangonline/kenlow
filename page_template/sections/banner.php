<section class="banner <?php echo get_field('form'); ?>">
	<div class="bg-container">
		<?php $bgImg = get_field('banner_background_image'); ?>
		<img src="<?= $bgImg['url']; ?>" alt="<?= $bgImg['alt']; ?>"></a>
		<div class="banner-overlay"></div>
		<div class="skew-bg">
			<?php if (get_field('form') == 'yes') { ?>
				<img src="<?= get_stylesheet_directory_uri() ?>/assets/src/img/skew-bg.png" alt=""></a>
			<?php } else { ?>
				<img src="<?= get_stylesheet_directory_uri() ?>/assets/src/img/skew-bg-alt.png" alt=""></a>
			<?php } ?>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div
				class="<?php if (get_field('form') == 'yes') { ?>col-lg-6 <?php } else { ?>col-lg-6 <?php } ?> title-con d-flex flex-column justify-content-center">
				<div class="homepage-title-wrap">
					<?php if (is_front_page()): ?>
							<h1 class="homepage-title">
								<?php // All these code IS to accommodate the 50 year anniversary graphic. Will need to remove when the 50 years is completed. ?>
								<?= get_field('banner_title'); ?>
							</h1>
							<img class="badge-img" src="/wp-content/uploads/2019/11/50-years-anniversary.png">
						<?php else: ?>
						<h1><?= get_field('banner_title'); ?>
							<?php if (is_single()): ?>
								<?php the_title(); ?>
							<?php endif; ?>
						</h1>
					<?php endif; ?>
				</div>
				<?php if (get_field('banner_sub_title')): ?> 	<?= get_field('banner_sub_title'); ?><?php endif; ?>
				<?php if (is_singular('post')): ?>
					<p>Posted on <?php the_date('n/j/Y'); ?></p>
				<?php endif; ?>

			</div>
			<div class="<?php if (get_field('form') == 'yes') { ?>col-lg-1 <?php } else { ?>d-none <?php } ?>">

			</div>
			<div class="<?php if (get_field('form') == 'yes') { ?>col-lg-5 <?php } else { ?>d-none <?php } ?> form-con">
				<?php if (get_field('form') == 'yes'): ?>
					<?php echo do_shortcode('[gravityform id=8 title=false description=false ajax=true]'); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>

</section>