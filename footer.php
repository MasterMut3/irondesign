<?php
/**
 * IronDesign Footer Template
 * 
 * Closes main content area, displays site footer, and closes HTML document.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
	</main><!-- .site-main -->
	
	<!-- Site Footer -->
	<footer id="colophon" class="site-footer">
		<div class="container">
			
			<!-- Footer Content -->
			<div class="site-footer-content">
				<p class="site-footer-copyright">
					<?php
					/* translators: %1$s = current year, %2$s = site name */
					printf(
						esc_html__( '&copy; %1$s %2$s. All rights reserved.', 'irondesign' ),
						esc_html( date( 'Y' ) ),
						esc_html( get_bloginfo( 'name' ) )
					);
					?>
				</p>
			</div><!-- .site-footer-content -->
			
			<!-- Footer Navigation Menu -->
			<?php
			if ( has_nav_menu( 'footer' ) ) {
				?>
				<nav class="footer-navigation">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'footer',
						'menu_id'        => 'footer-menu',
						'fallback_cb'    => null,
					) );
					?>
				</nav><!-- .footer-navigation -->
				<?php
			}
			?>
			
		</div><!-- .container -->
	</footer><!-- .site-footer -->
	
	<?php wp_footer(); ?>
	
</body>
</html>