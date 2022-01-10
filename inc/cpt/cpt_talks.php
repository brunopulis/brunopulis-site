<?php

function cpt_talks() {
	$event = new Odin_Post_Type(
		'Talk',
		'talk'
	);

	$event->set_labels(
		array(
			'menu_name' => __( 'Talks', 'odin' )
		)
	);

	$event->set_arguments(
		array(
			'supports' => array( 'title' )
		)
	);
}

add_action( 'init', 'cpt_talks', 1 );