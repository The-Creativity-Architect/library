<?php
/**
 * Displays the Site-Header Masthead/Branding of site.
 *
 * @package WordPress
 * @subpackage creativity_architect
 * @since Narrative Architect 1.0
 */
?>

<section id="branding?>"
<div element_type="widget" id="favicon">
	<div class="elementor-widget-container">
		<img width="512" height="512" src="http://localhost:10004/wp-content/uploads/2021/06/LOGO.png" class="elementor-animation-grow-rotate" data-permalink="http://localhost:10004/?attachment_id=74" data-orig-file="http://localhost:10004/wp-content/uploads/2021/06/LOGO.png" data-orig-size="512,512" />
	</div>

	<div class="elementor-widget-wrap">
		<div id="site-title">
			<div class="elementor-widget-container">
				<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); // Title it with the blog name ?>" rel="home"><?php bloginfo( 'name' ); // Display the blog name ?></a></h1>
		</div>
	</div>

	<div id="site-tagline">
		<div class="elementor-widget-container">
			<h3><?php bloginfo( 'description' ); ?></h3>
	</div>

	<div id="author-bio">
		<div class="elementor-widget-container">
			<p><?php get_the_author_meta( 'description', 'display' ); ?></p>
	</div>
</div>
</div><!-- /brand -->

<div class="elmentor-widget-container">
	<nav class="social-navigation">
			<?php wp_nav_menu( array( 'social-menu' => 'social' ) ); // Display the user-defined menu in Appearance > Menus ?>
			<div id="social-menu">
				<div class="elementor-widget-container">
					<div class="elementor-social-icons-wrapper">
						<div class="elementor-grid-item">
							<a class="elementor-social-icon-facebook" target="_blank">
								<span class="elementor-screen-only">Facebook</span>
									<i class="fab fa-facebook"></i>
							</a>
						</div>
						<div class="elementor-grid-item">
							<a class="elementor-social-icon-twitter" target="_blank">
								<span class="elementor-screen-only">Twitter</span>
									<i class="fab fa-twitter"></i>
							</a>
						</div>

						<div class="elementor-grid-item">
							<a class="elementor-social-icon-instagram" target="_blank">
								<span class="elementor-screen-only">Instagram</span>
									<i class="fab fa-instagram"></i>
							</a>
						</div>

						<div class="elementor-grid-item">
							<a class="elementor-social-icon-pinterest" target="_blank">
								<span class="elementor-screen-only">Pinterest</span>
									<i class="fab fa-pinterest"></i>
							</a>
						</div>

						<div class="elementor-grid-item">
							<a class="elementor-social-icon-tumblr" target="_blank">
								<span class="elementor-screen-only">Tumblr</span>
									<i class="fab fa-tumblr"></i>
							</a>
						</div>

						<div class="elementor-grid-item">
							<a class="elementor-social-icon-envelope-open-text" target="_blank">
								<span class="elementor-screen-only">Envelope-open-text</span>
									<i class="fas fa-envelope-open-text"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</nav><!-- .site-navigation .main-navigation -->
</section>
