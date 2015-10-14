<?php

/**
 * Allow article images and image resizing
 */
add_theme_support('post-thumbnails');

/**
 * WordPress Theme Customizer settings 
 * @param  $wp_customize The WP customize object that we're extending. 
 */
function bb_theme_customizer($wp_customize) {
	// Homepage banner image
	$wp_customize->add_section(
		'bb_homepage_banner_options',
		array(
			'title'       => "Homepage banner image",
			'description' => "Displayed if there are no upcoming meets to show. Please make sure this image is already compressed, as no automatic compression will take place.",
			"priority"    => 201
		)
	);
	$wp_customize->add_setting(
		'bb_homepage_banner_image',
		array(
			'default'     => '',
			'transport'   => 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'bb_homepage_banner_image',
			array(
				'label'     => 'Upload image',
				'section'   => 'bb_homepage_banner_options',
				'settings'  => 'bb_homepage_banner_image'
			)
		)
	);
}
add_action('customize_register', 'bb_theme_customizer');

/**
 * Take a string and make a colour out of it 
 * @param  $string The string to make a colour out of
 * @return The resulting colour
 */

function bb_generate_colour($string) {
	return '#' . substr(md5($string), 0, 6);
}