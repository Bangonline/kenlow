<section class="free-quote">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="logo-con">
					<img src="<?= get_stylesheet_directory_uri() ?>/assets/src/img/logo-body.png" alt="">
				</div>
				<h3><?= get_field('free_quote_title'); ?></h3>
				<a href="<?= get_field('free_quote_cta_link'); ?>" class="btn btn-green"><?= get_field('free_quote_cta_text'); ?> <i class="fas fa-angle-right"></i></a>
			</div>
			<div class="col-lg-1">
				
			</div>
			<div class="col-lg-7">
				<?= get_field('free_quote_right_section'); ?>
			</div>
		</div>
	</div>
</section>