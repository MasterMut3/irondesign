<?php
/**
 * IronDesign Header Template
 * 
 * Main site header with logo, navigation, and opening markup.
 * Closes with opening <main> tag (footer.php closes it).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	
	<!-- Skip to main content link (screen readers) -->
	<a class="skip-link screen-reader-text" href="#primary">
		<?php esc_html_e( 'Skip to main content', 'irondesign' ); ?>
	</a>
	
	<!-- Site Header -->
	<header id="masthead" class="site-header">
		<div class="container">
			
			<!-- Site Branding (Logo & Title) -->
			<div class="site-branding">
				<?php
				// Display custom logo if set, otherwise display site name
				if ( has_custom_logo() ) {
					the_custom_logo();
				} else {
					?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php bloginfo( 'name' ); ?>
					</a>
					<?php
				}
				?>
			</div><!-- .site-branding -->
			
			<!-- Primary Navigation Menu -->
			<nav id="site-navigation" class="main-navigation">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
					'fallback_cb'    => 'wp_page_menu',
				) );
				?>
			</nav><!-- .main-navigation -->
			
		</div><!-- .container -->
	</header><!-- .site-header -->
	
	<!-- Main Content Area (closes in footer.php) -->
	<main id="primary" class="site-main">