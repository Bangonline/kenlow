<?php $testiBG = get_field('testi_background_image'); ?>
<?php if(get_field('testi_title')): ?>
<section class="testimonials" style="<?php 
if($testiBG){ ?>background: url(<?php echo $testiBG; }else{ ?>background: <?php echo '#00a950';  } ?>;">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2><?= get_field('testi_title'); ?></h2>
				<?= get_field('testi_description'); ?>
				<h5><?= get_field('testi_author'); ?></h5>
				<?php /*
				<a href="<?= get_field('testi_cta_link'); ?>" class="btn btn-alt"><?= get_field('testi_cta_text'); ?> <i class="fas fa-angle-right"></i></a>
				*/ ?>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>