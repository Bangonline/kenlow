<?php
function _add_javascript()
{
	// Properly enqueue jQuery from WordPress core
	wp_enqueue_script('jquery');

	// Bootstrap depends on jQuery, so add it as a dependency
	wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array('jquery'), null, true);

	// FancyBox depends on jQuery
	wp_enqueue_script('fancybox-js', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js', array('jquery'), null, true);

	// Main JS should depend on jQuery if it uses it
	wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/dist/js/main.js', array('jquery', 'bootstrap-js', 'fancybox-js'), null, true);
}
add_action('wp_enqueue_scripts', '_add_javascript', 100);

function _add_stylesheets()
{
	wp_enqueue_style('bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css', array(), null, 'all');
	wp_enqueue_style('avenir-font-css', get_template_directory_uri() . '/assets/dist/fonts/font.css', array(), null, 'all');
	wp_enqueue_style('roboto-font-css', 'https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,500i,700,900&display=swap', array(), null, 'all');
	wp_enqueue_style('fontawesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css', array(), null, 'all');
	// wp_enqueue_style('aos-css', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css', array(), null, 'all' );
	wp_enqueue_style('fancybox-css', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css', array(), null, 'all');

	wp_enqueue_style('main-css', get_template_directory_uri() . '/assets/dist/css/main.css', array(), 1.1, 'all');

	wp_enqueue_style('update-css', get_template_directory_uri() . '/assets/dist/css/update.css', array(), 1.1, 'all');
}
add_action('wp_enqueue_scripts', '_add_stylesheets');
