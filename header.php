<!DOCTYPE HTML>
<html <?php language_attributes(); ?> style="margin-top:0 !important;">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<style>
		header .header-bottom .inner ul .item .child-item a {
			color: #0093d0;
		}

		.product-template-default .site-content iframe {
			width: 100%;
		}

		@media (max-width: 991px) {
			header .header-bottom .inner ul .item .child-item a {
				color: #fff;
			}

			header .header-bottom .inner ul .item a i {
				top: 0;
			}

			section.inspiration .img-con img {
				object-fit: unset;
				height: auto;
			}
		}

		.testi--listing {
			padding-bottom: 60px;
		}

		.testi--listing .testi-content {
			padding-top: 15px;
			padding-bottom: 15px;
		}

		.testi--listing .row {
			border-bottom: 1px solid #0093d0;
		}

		.testi--listing .row:last-of-type {
			border-bottom: 0;
		}

		.testi--listing .row:nth-of-type(even) {
			text-align: right;
		}

		.testi--listing .testi-content {}

		.testi--listing .testi-content h2 {
			font-family: "AvenirNextBold";

		}

		.testi--listing .testi-content p {}

		.testi--listing .testi-content .author--name {
			display: inline-block;
			margin-top: 19px;
		}
	</style>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<header>

			<div class="header-top d-flex align-items-center">
				<div class="container d-flex justify-content-between align-items-center">
					<div class="header-top-left">
						<ul>
							<?php wp_nav_menu(array('menu' => 'secondary-menu', 'items_wrap' => '%3$s', 'container' => false)); ?>
						</ul>
					</div>

					<div class="header-top-right d-flex">
						<p><span>Free Measure and on-site quote - </span>Call us</p>
						<a href="tel:1800086664" class="headoffice">1800 086 664</a>
					</div>
				</div>
			</div>

			<div class="header-bottom">

				<div class="green-overlay"></div>

				<div class="container-fluid">
					<div class="inner d-flex justify-content-between align-items-center">
						<a class="logo" href="<?php echo get_home_url(); ?>"><img src="<?= get_stylesheet_directory_uri() ?>/assets/src/img/logo.png" alt=""></a>
						<nav class="navbar navbar-expand-lg navbar-light w-100">
							<button type="button" data-toggle="collapse" data-target="#navbarContent" class="navbar-toggler custom-toggler">
								<span class="navbar-toggler-icon"></span>
							</button>
							<div id="navbarContent" class="collapse navbar-collapse">
								<div class="container">
									<div class="row">
										<div class="col-12">
											<ul class="navbar-nav mx-auto d-flex">
												<!-- Megamenu-->
												<?php
												$megaMenuQuery = wp_get_nav_menu_items("Main Menu");
												if ($megaMenuQuery && !is_wp_error($megaMenuQuery)) :
												foreach ($megaMenuQuery as $mmqItem) :
													$megaMenuHeading = get_field('mm_menu_item_heading', $mmqItem);
													$megaMenuDescription = get_field('mm_main_item_description', $mmqItem);
													$pArgs = array(
														"post_type" => "product",
														'post_status' => 'publish',
														"tax_query" => array(
															array(
																"taxonomy" => "product_category",
																"field"		 => "slug",
																"terms"		 => basename($mmqItem->url)
															)
														),
														"posts_per_page" => -1
													);
													$pQuery = new WP_Query($pArgs);
													// var_dump($mmqItem);

												?>
													<li class="item">
														<a href="<?php if ($mmqItem->xfn) : ?><?php echo '/' . $mmqItem->xfn . '/'; ?><?php else : ?>#<?php endif; ?>" <?php if (!$mmqItem->xfn) : ?>data-toggle="dropdown" <?php endif; ?> aria-expanded="false"><?= $mmqItem->title ?> <i class="fas fa-angle-down"></i></a>
														<div aria-labelledby="megamenu" class="dropdown-menu border-0 m-0 child-item">
															<div class="container">
																<div class="row">
																	<div class="col-lg-3">
																		<?php if ($megaMenuHeading) : ?>
																			<div class="mega-menu-title"><?= $megaMenuHeading ?></div>
																		<?php endif; ?>
																		<?php if ($megaMenuDescription) : ?>
																			<p><?= $megaMenuDescription ?></p>
																		<?php endif; ?>
																	</div>
																	<?php
																	while ($pQuery->have_posts()) : $pQuery->the_post(); ?>
																		<div class="col-lg-3">
																			<a href="<?php the_permalink(); ?>">
																				<img src="<?= get_the_post_thumbnail_url() ?>" alt="<?= get_the_post_thumbnail_caption(); ?>">
																			</a>
																			<a href="<?php the_permalink(); ?>"><?php the_title(); ?> <i class="fas fa-angle-right"></i></a>
																		</div>
																	<?php


																	endwhile;

																	wp_reset_postdata();
																	?>
																</div>
															</div>
													</li>
												<?php


												endforeach;
												endif;
												?>

												<?php wp_nav_menu(array('menu' => 'secondary-menu', 'items_wrap' => '%3$s', 'container' => false)); ?>

											</ul>

											<div class="btn-mobile show-mobile">
												<a href="/free-measure-quote" class="btn btn-green">Request a free quote <i class="fas fa-angle-right"></i></a>
												<a href="tel:1800086664" class="btn">Call Now 1800 086 664 <i class="fas fa-phone"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</nav>

						<div class="btn-con">
							<a href="/free-measure-quote/" class="btn btn-green">Request a free quote <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</header>

		<div id="content" class="site-content">