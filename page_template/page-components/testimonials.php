<?php $testiBG = get_sub_field('background_image'); ?>

<section class="testimonials" style="<?php if($testiBG){ ?>background: url(<?php echo $testiBG; }else{ ?>background: <?php echo '#00a950';  } ?>;">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2><?= get_sub_field('heading'); ?></h2>
				<?= get_sub_field('content'); ?>
				<h5><?= get_sub_field('author'); ?></h5>
			</div>
		</div>
	</div>
</section>
