<section class="callback" style="display: none;">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<h3><?= the_field('callback_title'); ?></h3>
			</div>
			<div class="col-lg-9 d-flex flex-column justify-content-center">
				<?= the_field('callback_description'); ?>
				<a href="#callback-modal" class="btn open-call-back-modal"><?= the_field('callback_cta_text'); ?> <i
						class="fas fa-angle-right"></i></a>
			</div>
		</div>
	</div>
</section>