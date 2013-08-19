<?php
add_action( 'init', 'prowp_register_my_post_types' );

function prowp_register_my_post_types() {
	register_post_type( 'products', 
	array(
	'labels' => array(
	'name' => 'Products'
	),
	'public' => true,
	)
	);
}
?>