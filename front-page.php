<?php
/**
 * Front Page
 *
 * @package IronDesign
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

?>

<main id="primary" class="site-main">

	<?php
	get_template_part( 'template-parts/hero' );

	get_template_part( 'template-parts/categories' );

	get_template_part( 'template-parts/featured-products' );

	get_template_part( 'template-parts/new-arrivals' );

	get_template_part( 'template-parts/banner' );

	get_template_part( 'template-parts/wholesale' );

	get_template_part( 'template-parts/features' );

	get_template_part( 'template-parts/newsletter' );
	?>

</main>

<?php

get_footer();