</div><!-- #content -->

<footer>

	<div class="footer-top">

		<div class="container">

			<div class="row">

				<div class="col-lg-2 col-md-12 footer-logo-con">

					<a href="<?php echo get_home_url(); ?>" class="footer-logo">

						<img src="<?= get_stylesheet_directory_uri() ?>/assets/src/img/footer-logo.png" alt="">

					</a>

					<?php dynamic_sidebar('footer-disclaimer-txt'); ?>



				</div>

				<div class="col-xl-7 col-lg-6 col-md-12 footer-menu">

					<div class="row mb-5">

						<div class="col-12">

							<p class="more mt-2"> More than a shade better <a
									href="https://www.facebook.com/pages/Kenlow/835533366461429" target="_blank"><i
										class="fab fa-facebook-square"></i></a>
								<a href="https://www.instagram.com/kenlow_australia/" target="_blank"> <i
										class="fab fa-instagram" style="color:white"> </i></a>
							</p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-4 col-sm-6">
							<ul>
								<?php wp_nav_menu(array('menu' => 'footer-primary-menu', 'items_wrap' => '%3$s', 'container' => false)); ?>
							</ul>
						</div>

						<div class="col-md-4 col-sm-6">
							<ul>
								<?php wp_nav_menu(array('menu' => 'secondary-menu', 'items_wrap' => '%3$s', 'container' => false)); ?>
							</ul>
						</div>

						<div class="col-md-4 col-sm-12 location">
							<?php dynamic_sidebar('footer-location-txt'); ?>
						</div>

					</div>

				</div>

				<div class="col-xl-3 col-lg-4 col-md-12 footer-btn">

					<div class="row">

						<div class="col-lg-12 col-sm-6 col-6 btn-con">

							<a href="/free-measure-quote" class="btn btn-green">Request a free quote <i
									class="fas fa-angle-right"></i></a>

						</div>

						<div class="col-lg-12 col-sm-6 col-6 btn-con">

							<a href="tel:1800086664" class="btn btn-blue">Call Now &nbsp; <span class="headoffice">1800
									086 664</span> <i class="fas fa-phone"></i></a>

						</div>

						<div class="col-lg-12 col-sm-12 show-in-mobile">

							<p>&copy; <?php echo date("Y"); ?> Kenlow Pty Ltd <a href="#">Privacy Disclamer</a></p>

						</div>

					</div>



				</div>

			</div>

		</div>

	</div>

	<div class="footer-bottom" style="display:none;">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center d-none d-md-block">
					<div class="row">
						<div class="col-md-6 col-lg-7">
							<p>Would you like to request a call back?</p>
						</div>
						<div class="col-md-6 col-lg-5">
							<a href="#callback-modal" class="btn open-call-back-modal">Request a Call back <i
									class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-12 text-center d-block d-md-none">
					<div class="row">
						<div class="col-md-12">
							<a href="#callback-modal" class="btn-txt open-call-back-modal">Would you like to request a
								call back?</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	</div>

	<div id="callback-modal" style="display: none;">
		<?php echo do_shortcode('[gravityform id=2 title=false description=false tabindex=86 ajax="true" ]'); ?>
	</div>



</footer>

</div><!-- #page -->



<?php wp_footer(); ?>

<script>
	jQuery(document).ready(function () {
		// Check if fancyBox is already initialized on these elements
		if (typeof jQuery.fn.fancybox === 'function' && !jQuery(".open-call-back-modal").data('fancybox-initialized')) {
			jQuery(".open-call-back-modal").fancybox().data('fancybox-initialized', true);
		}
	});
</script>
<?php
global $load_gmaps;

if (isset($load_gmaps)) {

	echo '<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyCnCvZfmg1hJKDZyTkalJQA3Ve19xGhfuA&amp;sensor=false&amp;language=en"></script>';
	echo '<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gmap3/5.1.1/gmap3.min.js"></script>';
	?>
	<script type="text/javascript">
		jQuery(function () {
			jQuery("#mapcanvas-south").gmap3({
				map: {
					options: {
						zoom: 14,
						center: [-32.054466, 115.989344],
						mapTypeId: "blue",
						mapTypeControl: false,
						panControl: false,
						zoomControl: true,
						scaleControl: false,
						streetViewControl: true,
						rotateControl: false,
						rotateControlOptions: false,
						overviewMapControl: false,
						OverviewMapControlOptions: false,
						scrollwheel: false
					}
				},
				marker: {
					values:
						<?php
						//$addresses = get_post_meta( get_the_ID(), 'Address', true );
						//echo json_encode($addresses);
						?>
						[
						{ "address": "1970 Albany Hwy, Maddington WA 6109", options: { icon: "<?php echo get_site_url(); ?>/wp-content/uploads/2019/08/map_marker.png" } }
						]
				},
				styledmaptype: {
					id: "blue",
					options: {
						name: "Blue"
					},
					styles: [{ "elementType": "geometry", "stylers": [{ "visibility": "simplified" }] }, { "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "water", "elementType": "labels", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "poi", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "water", "stylers": [{ "color": "#0093d0" }] }, { "stylers": [{ "hue": "#0093D0" }] }]
				}
			});
			jQuery("#mapcanvas-north").gmap3({
				map: {
					options: {
						zoom: 14,
						center: [-31.914394, 115.828611],
						mapTypeId: "blue",
						mapTypeControl: false,
						panControl: false,
						zoomControl: true,
						scaleControl: false,
						streetViewControl: true,
						rotateControl: false,
						rotateControlOptions: false,
						overviewMapControl: false,
						OverviewMapControlOptions: false,
						scrollwheel: false
					}
				},
				marker: {
					values:
						<?php
						//$addresses = get_post_meta( get_the_ID(), 'Address', true );
						//echo json_encode($addresses);
						?>
						[
						{ "address": "267 Scarborough Beach Rd, Osborne Park WA 6017", options: { icon: "<?php echo get_site_url(); ?>/wp-content/uploads/2019/08/map_marker.png" } }
						]
				},
				styledmaptype: {
					id: "blue",
					options: {
						name: "Blue"
					},
					styles: [{ "elementType": "geometry", "stylers": [{ "visibility": "simplified" }] }, { "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "water", "elementType": "labels", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "poi", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "water", "stylers": [{ "color": "#0093d0" }] }, { "stylers": [{ "hue": "#0093D0" }] }]
				}
			});
		});
	</script>
	<?php
}
?>

</body>

</html>