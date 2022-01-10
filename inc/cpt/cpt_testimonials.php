<?php

function cpt_testimonials() {
	$testimonial = new Odin_Post_Type(
		'Depoimentos',
		'testimonial'
	);

	$testimonial->set_labels(
		array(
			'menu_name' => __( 'Depoimentos', 'odin' )
		)
	);

	$testimonial->set_arguments(
		array(
			'supports' => array( 'title', 'editor' ),
			'menu_icon' => 'dashicons-people'
		)
	);
}

add_action( 'init', 'cpt_testimonials', 1 );