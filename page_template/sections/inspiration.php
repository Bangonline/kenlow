<?php 

$inspirationImg1 = get_field('inspiration_image_1');
$inspirationImg2 = get_field('inspiration_image_2');
$inspirationImg3 = get_field('inspiration_image_3');
$inspirationImg4 = get_field('inspiration_image_4');
$inspirationImg5 = get_field('inspiration_image_5');
$inspirationImg6 = get_field('inspiration_image_6');
?>
<?php if($inspirationImg1 && $inspirationImg2 && $inspirationImg3 && $inspirationImg4 && $inspirationImg5 && $inspirationImg6){ ?>

<section class="inspiration">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2><?php the_title(); ?> Photo Gallery</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8 d-flex flex-column justify-content-space-between">
				<div class="row">
					<div class="col-lg-12">
						<div class="img-con inspiration-01">
							<img src="<?= $inspirationImg1['url']; ?>" alt="<?= $inspirationImg1['alt'];  ?>">
						</div>
					</div>
				</div>
				<div class="row mt-20">
					<div class="col-lg-6">
						<div class="img-con inspiration-02">
							<img src="<?= $inspirationImg2['url']; ?>" alt="<?= $inspirationImg2['alt'];  ?>">
						</div>						
					</div>
					<div class="col-lg-6">
						<div class="img-con inspiration-03">
							<img src="<?= $inspirationImg3['url']; ?>" alt="<?= $inspirationImg3['alt'];  ?>">
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="img-con inspiration-04">
					<img src="<?= $inspirationImg4['url']; ?>" alt="<?= $inspirationImg4['alt'];  ?>">		
				</div>
				
			</div>
		</div>
		<div class="row mt-20">
			<div class="col-lg-8">
				<div class="img-con inspiration-05">
					<img src="<?= $inspirationImg5['url']; ?>" alt="<?= $inspirationImg5['alt'];  ?>">
				</div>
				
			</div>
			<div class="col-lg-4">
				<div class="img-con inspiration-06">
					<img src="<?= $inspirationImg6['url']; ?>" alt="<?= $inspirationImg6['alt'];  ?>">		
				</div>
				
			</div>
		</div>
	</div>
</section>

<?php } ?>