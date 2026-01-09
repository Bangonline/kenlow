<?php

	// Utilities

	include( 'configure/utilities.php' );

	// CONFIG

	include( 'configure/configure.php' );

	// JAVASCRIPT & CSS

	include( 'configure/js-css.php' );

	// SHORTCODES

	include( 'configure/shortcodes.php' );

	// ACF

	include( 'configure/acf.php' );

	// HOOKS ADMIN

	if( is_admin() )
	{
		include( 'configure/admin.php' );
	}

	//delete_option( "core_updater.lock" );

	add_filter('post_link', 'rudr_post_type_permalink', 20, 3);
	add_filter('post_type_link', 'rudr_post_type_permalink', 20, 3);
	
	function rudr_post_type_permalink($permalink, $post_id, $leavename) {
	
		$post_type_name = 'product'; // post type name, you can find it in admin area or in register_post_type() function
		$post_type_slug = 'product'; // the part of your product URLs, not always matches with the post type name
		$tax_name = 'product_category'; // the product categories taxonomy name
	
		$post = get_post( $post_id );
	
		if ( strpos( $permalink, $post_type_slug ) === FALSE || $post->post_type != $post_type_name ) // do not make changes if the post has different type or its URL doesn't contain the given post type slug
			return $permalink;

		// IMPORTANT: Don't modify permalinks in any admin or editing context
		if (
			is_admin() || // Admin area
			(isset($_GET['fl_builder'])) || // Beaver Builder is active via URL parameter
			(isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'fl_builder') !== false) || // Referrer has Beaver Builder
			(defined('DOING_AJAX') && DOING_AJAX) // AJAX requests might be from editors
		) {
			return $permalink; // Return standard URL structure
		}

		$terms = wp_get_object_terms( $post->ID, $tax_name ); // get all terms (product categories) of this post (product)
	
		if ( !is_wp_error( $terms ) && !empty( $terms ) && is_object( $terms[0] ) ) // rewrite only if this product has categories
			$permalink = str_replace( $post_type_slug, $terms[0]->slug, $permalink );
	
		return $permalink;
	}
	
	
	add_filter('request', 'rudr_post_type_request', 1, 1 );
	
	function rudr_post_type_request( $query ){
		global $wpdb;
		
		$post_type_name = 'product'; // specify your own here
		$tax_name = 'product_category'; // and here
		
		// Don't modify query in any admin or editing context
		if (
			is_admin() || // Admin area
			(isset($_GET['fl_builder'])) || // Beaver Builder is active via URL parameter
			(isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'fl_builder') !== false) || // Referrer has Beaver Builder
			(defined('DOING_AJAX') && DOING_AJAX) // AJAX requests might be from editors
		) {
			return $query;
		}
		
		// Check if we're already on a product page
		if (isset($query[$post_type_name]) || isset($query['post_type']) && $query['post_type'] === $post_type_name) {
			return $query;
		}
		
		// Only proceed if the attachment key exists and is not empty
		if (!isset($query['attachment']) || empty($query['attachment'])) {
			return $query;
		}
		
		$slug = sanitize_text_field($query['attachment']); // Sanitize input
	
		// get the post with the given type and slug from the database
		$post_id = $wpdb->get_var($wpdb->prepare(
			"SELECT ID
			FROM $wpdb->posts
			WHERE post_name = %s
			AND post_type = %s",
			$slug, $post_type_name
		));
		
		// Only continue if we found a valid post ID
		if (!$post_id) {
			return $query;
		}
		
		$terms = wp_get_object_terms($post_id, $tax_name); // Get the post terms
		
		if (isset($slug) && $post_id && !is_wp_error($terms) && !empty($terms)) {
			unset($query['attachment']);
			$query[$post_type_name] = $slug;
			$query['post_type'] = $post_type_name;
			$query['name'] = $slug;
		}
		
		return $query;
	}

function theme_scripts() {
    // Properly enqueue jQuery from WordPress core
    wp_enqueue_script('jquery');
    
    // Your theme scripts that depend on jQuery
    // This script path was incorrect - the file doesn't exist at this location
    // The main.js file is already being enqueued in configure/js-css.php
    // So we're removing this duplicate enqueue that was causing a 404 error
}
add_action('wp_enqueue_scripts', 'theme_scripts', 10);

// Ensure this runs after other script enqueueing
add_action('wp_enqueue_scripts', '_add_javascript', 100);


/**
 * Advanced Gravity Forms Notification Controller
 * 
 * For more complex scenarios with multiple notifications and conditions
 */
function advanced_gravity_forms_notifications($is_disabled, $notification, $form, $entry) {
    
    // Configuration array for different notifications
    $notification_rules = [
        '5bd925fe86a28' => [
            'conditions' => [
                'AND' => [
                    'perth_area' => ['field_id' => '10', 'value' => 'North of the River']
                ],
                'OR' => [
                    'product' => [
                        'field_id' => '12', 
                        'values' => [
                            'Outdoor Blinds', 
                            'Awnings', 
                            'Commercial Canopies Awnings & Blinds', 
                            'Umbrellas - Residential', 
                            'Umbrellas - Commercial'
                        ]
                    ]
                ]
            ]
        ],
        '5bd92599d3c6d' => [
            'conditions' => [
                'AND' => [
                    'perth_area' => ['field_id' => '10', 'value' => 'South of the River']
                ],
                'OR' => [
                    'product' => [
                        'field_id' => '12', 
                        'values' => [
                            'Outdoor Blinds', 
                            'Awnings', 
                            'Commercial Canopies Awnings & Blinds', 
                            'Umbrellas - Residential', 
                            'Umbrellas - Commercial'
                        ]
                    ]
                ]
            ]
        ],
        '677b694e33543' => [
            'conditions' => [
                'OR' => [
                    'product' => [
                        'field_id' => '12', 
                        'values' => [
                            'Tool Bags', 
                            'Truck & Utility Canopies', 
                            'Caravan Awnings & Annexes', 
                            'Tarpaulins & Custom Covers'
                        ]
                    ]
                ]
            ]
        ]
    ];
    
    // Check if this notification has custom rules
    if (!isset($notification_rules[$notification['id']])) {
        return $is_disabled; // No custom rules, use default behavior
    }
    
    $rules = $notification_rules[$notification['id']];
    $should_send = true;
    
    // Process AND conditions (all must be true)
    if (isset($rules['conditions']['AND'])) {
        foreach ($rules['conditions']['AND'] as $condition) {
            $field_value = rgar($entry, $condition['field_id']);
            if ($field_value !== $condition['value']) {
                $should_send = false;
                break;
            }
        }
    }
    
    // Process OR conditions (at least one must be true)
    if ($should_send && isset($rules['conditions']['OR'])) {
        $or_satisfied = false;
        foreach ($rules['conditions']['OR'] as $condition) {
            $field_value = rgar($entry, $condition['field_id']);
            
            if (isset($condition['values'])) {
                // Check if field value is in array of acceptable values
                if (in_array($field_value, $condition['values'])) {
                    $or_satisfied = true;
                    break;
                }
            } elseif (isset($condition['value'])) {
                // Check single value
                if ($field_value === $condition['value']) {
                    $or_satisfied = true;
                    break;
                }
            }
        }
        $should_send = $or_satisfied;
    }
    
    // Log for debugging (remove in production)
    error_log("Notification {$notification['id']}: Should send = " . ($should_send ? 'YES' : 'NO'));
    
    // Return true to disable notification, false to enable it
    return !$should_send;
}

// Activate the advanced notification system
add_filter('gform_disable_notification', 'advanced_gravity_forms_notifications', 10, 4);

/**
 * Helper function to get Gravity Forms field IDs
 * This helps you identify the correct field IDs to use in your conditions
 */
function debug_gravity_form_fields($entry, $form) {
    if ($form['id'] == 8) { // Only for form ID 8
        error_log("=== Form 8 Field Values ===");
        foreach($form['fields'] as $field) {
            $field_value = rgar($entry, $field->id);
            error_log("Field ID {$field->id} ({$field->label}): {$field_value}");
        }
        error_log("=== End Form 8 Fields ===");
    }
}
// Uncomment this line temporarily to debug field IDs
// add_action('gform_after_submission', 'debug_gravity_form_fields', 10, 2);

/**
 * Enhanced Form Submit Button UX with Loading Spinner
 */
function add_gravity_forms_submit_spinner() {
    // Only add on frontend
    if (is_admin()) {
        return;
    }
    
    // Add CSS for loading spinner and button states
    wp_add_inline_style('main-css', '
        /* Loading Spinner for Submit Button */
        .gform_wrapper .gform_footer input[type="submit"] {
            position: relative;
            transition: all 0.3s ease;
        }
        
        .gform_wrapper.gform_submitting .gform_footer input[type="submit"] {
            opacity: 0.8;
            pointer-events: none;
            padding-right: 50px;
        }
        
        .gform_wrapper.gform_submitting .gform_footer input[type="submit"]:after {
            content: "";
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            width: 20px;
            height: 20px;
            border: 2px solid #fff;
            border-radius: 50%;
            border-top-color: transparent;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: translateY(-50%) rotate(0deg); }
            100% { transform: translateY(-50%) rotate(360deg); }
        }
        
        /* For custom-form styling */
        .custom-form .gform_wrapper.gform_submitting .gform_footer input[type="submit"]:after {
            border-color: #fff;
            border-top-color: transparent;
        }
        
        /* Success state */
        .gform_wrapper.gform_success .gform_footer input[type="submit"] {
            background-color: #28a745 !important;
            opacity: 1;
        }
    ');
    
    // Add JavaScript for enhanced form feedback
    wp_add_inline_script('jquery', '
        jQuery(document).ready(function($) {
            // Enhanced form submission handling
            $(document).on("gform_pre_submission", function(event, form, ajax) {
                var formId = form.id;
                var $wrapper = $("#gform_wrapper_" + formId);
                var $submitBtn = $("#gform_" + formId + " input[type=submit]");
                
                console.log("Form " + formId + " submission started");
                
                // Add submitting class for visual feedback
                $wrapper.addClass("gform_submitting");
                
                // Change button text and disable
                if ($submitBtn.length) {
                    $submitBtn.data("original-value", $submitBtn.val());
                    $submitBtn.val("Submitting...");
                    $submitBtn.prop("disabled", true);
                }
            });
            
            // Handle successful form submission
            $(document).on("gform_confirmation_loaded", function(event, form_id) {
                var $wrapper = $("#gform_wrapper_" + form_id);
                var $submitBtn = $("#gform_" + form_id + " input[type=submit]");
                
                console.log("Form " + form_id + " submitted successfully");
                
                // Remove submitting class and add success class
                $wrapper.removeClass("gform_submitting").addClass("gform_success");
                
                // Update button to show success
                if ($submitBtn.length) {
                    $submitBtn.val("Submitted Successfully!");
                    $submitBtn.prop("disabled", false);
                }
                
                // Scroll to confirmation message smoothly
                var $confirmation = $("#gforms_confirmation_message_" + form_id);
                if ($confirmation.length) {
                    $("html, body").animate({
                        scrollTop: $confirmation.offset().top - 100
                    }, 500);
                } else {
                    // If no specific confirmation message, scroll to form wrapper
                    $("html, body").animate({
                        scrollTop: $wrapper.offset().top - 100
                    }, 500);
                }
            });
            
            // Handle form errors/re-render
            $(document).on("gform_post_render", function(event, form_id, current_page) {
                var $wrapper = $("#gform_wrapper_" + form_id);
                var $submitBtn = $("#gform_" + form_id + " input[type=submit]");
                
                // Remove submitting state (in case of validation errors)
                $wrapper.removeClass("gform_submitting gform_success");
                
                // Restore original button text and state
                if ($submitBtn.length && $submitBtn.data("original-value")) {
                    $submitBtn.val($submitBtn.data("original-value"));
                    $submitBtn.prop("disabled", false);
                }
            });
            
            // Fallback for non-AJAX forms
            $(document).on("submit", ".gform_wrapper form", function(e) {
                var $form = $(this);
                var $wrapper = $form.closest(".gform_wrapper");
                var $submitBtn = $form.find("input[type=submit]");
                
                // Only apply if not already in submitting state
                if (!$wrapper.hasClass("gform_submitting")) {
                    setTimeout(function() {
                        $wrapper.addClass("gform_submitting");
                        
                        if ($submitBtn.length) {
                            $submitBtn.data("original-value", $submitBtn.val());
                            $submitBtn.val("Submitting...");
                            $submitBtn.prop("disabled", true);
                        }
                    }, 10);
                }
            });
            
            // Reset form states on page show (browser back button)
            $(window).on("pageshow", function() {
                $(".gform_wrapper").removeClass("gform_submitting gform_success");
                $("input[type=submit]").each(function() {
                    var $btn = $(this);
                    if ($btn.data("original-value")) {
                        $btn.val($btn.data("original-value"));
                        $btn.prop("disabled", false);
                    }
                });
            });
        });
    ');
}
add_action('wp_enqueue_scripts', 'add_gravity_forms_submit_spinner', 15);

