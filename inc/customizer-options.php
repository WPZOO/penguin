<?php
/**
 * Defines customizer options
 *
 * @package PENGU!N
 */

function penguin_options() {

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;


	// Logo
	$section = 'logo';

	$sections[] = array(
		'id'            => $section,
		'title'         => __( 'Logo', 'penguin' ),
		'priority'      => '80'
	);

	$options['logo-upload'] = array(
		'id' => 'logo-upload',
		'label'   => __( 'Upload your logo', 'penguin' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => '',
	);


	// Content
	$section = 'content';

	$sections[] = array(
		'id'            => $section,
		'title'         => __( 'Content', 'penguin' ),
		'priority'      => '100'
	);

	$contentchoices = array(
		'excerpt' => __( 'Excerpt (trimmed-down output)', 'penguin' ),
		'content' => __( 'Content (full post / custom more tag)', 'penguin' ),
	);

	$options['excerpt-content'] = array(
		'id'            => 'excerpt-content',
		'label'         => __( 'Content output of standard posts on home and archive pages.', 'penguin' ),
		'section'       => $section,
		'type'          => 'radio',
		'choices'       => $contentchoices,
		'default'       => 'excerpt'
	);


	// Adds the sections to the $options array
	$options['sections'] = $sections;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// To delete custom mods use: customizer_library_remove_theme_mods();

}
add_action( 'init', 'penguin_options' );


function change_default_order_options( $wp_customize ){
	$wp_customize->get_section('static_front_page')->priority = '50';
}
add_action( 'customize_register', 'change_default_order_options' );