<?php

 /* Render Product Loop
 *
 * @param array $product_ids Product IDs.
 * @param int   $columns     Number of columns.
 */
function irondesign_render_product_loop( $product_ids, $columns = 4 ) {

	if ( empty( $product_ids ) ) {
		return;
	}

	wc_set_loop_prop( 'columns', absint( $columns ) );

	woocommerce_product_loop_start();

	foreach ( $product_ids as $product_id ) {

		$post = get_post( $product_id );

		if ( ! $post ) {
			continue;
		}

		$GLOBALS['post'] = $post;

		setup_postdata( $post );

		wc_get_template_part(
			'content',
			'product'
		);

	}

	wp_reset_postdata();

	woocommerce_product_loop_end();

}