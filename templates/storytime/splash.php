<?php
/**
 * Template Name: Front Page Splash
 * Template Post Type: page
 * Description: Display a page a full window photo
 * @package journalandportfolio
 */


get_header( 'splash' ); ?>

<header id="splash" <?php if ( has_header_image() ) { ?> style="background-image: url(
    <?php esc_url( header_image() ); ?>);"
    <?php } ?>>
    <div class="site-branding">

        <?php if ( has_custom_logo() ) : ?>
        <?php the_custom_logo(); ?>
        <?php endif; ?>

        <?php if ( esc_attr(get_theme_mod( 'showjournalandportfolioite_title', true ) ) ) : ?>
        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <?php bloginfo( 'name' ); ?></a></h1>
        <?php endif; ?>

        <?php	if (esc_attr(get_theme_mod( 'showjournalandportfolioite_desc', true ) ) ) :
				$journalandportfolio_description = get_bloginfo( 'description', 'display' );
					if ( $journalandportfolio_description || is_customize_preview() ) : ?>
        <p class="site-description">
            <?php echo esc_html( $journalandportfolio_description );  ?>
        </p>
        <?php 
					endif;
				endif; ?>

    </div>

    <?php 
		// Check if there is a social menu.
		if ( has_nav_menu( 'splash' ) ) { 
			get_template_part( 'template-parts/navigation/nav', 'splash' ); 
		}
?>

</header>

<?php 
	get_footer( 'splash' );
