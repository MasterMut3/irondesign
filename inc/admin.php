<?php
/**
 * Admin Functions
 *
 * @package IronDesign
 */

defined( 'ABSPATH' ) || exit;

/**
 * Coming Soon Meta Box
 */
function irondesign_coming_soon_meta() {

	add_meta_box(
		'coming_soon_options',
		__( 'Coming Soon Options', 'irondesign' ),
		'irondesign_coming_soon_meta_callback',
		'page',
		'normal',
		'high'
	);

}
add_action( 'add_meta_boxes', 'irondesign_coming_soon_meta' );

/**
 * Meta Box Output
 */
function irondesign_coming_soon_meta_callback( $post ) {

	wp_nonce_field(
		'coming_soon_meta',
		'coming_soon_meta_nonce'
	);

	$bg    = get_post_meta( $post->ID, 'coming_soon_bg', true );
	$title = get_post_meta( $post->ID, 'coming_soon_title', true );
	$desc  = get_post_meta( $post->ID, 'coming_soon_desc', true );
	$sub   = get_post_meta( $post->ID, 'coming_soon_sub', true );

	?>

	<p>

		<label>

			<strong><?php esc_html_e( 'Background Image URL', 'irondesign' ); ?></strong>

		</label><br>

		<input
			type="url"
			name="coming_soon_bg"
			value="<?php echo esc_url( $bg ); ?>"
			style="width:100%;padding:8px;">

	</p>

	<p>

		<label>

			<strong><?php esc_html_e( 'Title', 'irondesign' ); ?></strong>

		</label><br>

		<input
			type="text"
			name="coming_soon_title"
			value="<?php echo esc_attr( $title ); ?>"
			style="width:100%;padding:8px;">

	</p>

	<p>

		<label>

			<strong><?php esc_html_e( 'Description', 'irondesign' ); ?></strong>

		</label><br>

		<input
			type="text"
			name="coming_soon_desc"
			value="<?php echo esc_attr( $desc ); ?>"
			style="width:100%;padding:8px;">

	</p>

	<p>

		<label>

			<strong><?php esc_html_e( 'Sub Text', 'irondesign' ); ?></strong>

		</label><br>

		<input
			type="text"
			name="coming_soon_sub"
			value="<?php echo esc_attr( $sub ); ?>"
			style="width:100%;padding:8px;">

	</p>

	<?php

}

/**
 * Save Meta
 */
function irondesign_save_coming_soon_meta( $post_id ) {

	if (
		! isset( $_POST['coming_soon_meta_nonce'] ) ||
		! wp_verify_nonce(
			sanitize_text_field( wp_unslash( $_POST['coming_soon_meta_nonce'] ) ),
			'coming_soon_meta'
		)
	) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$fields = array(
		'coming_soon_bg',
		'coming_soon_title',
		'coming_soon_desc',
		'coming_soon_sub',
	);

	foreach ( $fields as $field ) {

		if ( isset( $_POST[ $field ] ) ) {

			update_post_meta(
				$post_id,
				$field,
				sanitize_text_field(
					wp_unslash( $_POST[ $field ] )
				)
			);

		}

	}

}

add_action(
	'save_post',
	'irondesign_save_coming_soon_meta'
);