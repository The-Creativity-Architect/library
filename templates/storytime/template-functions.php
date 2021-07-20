<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package journalandportfolio
 */

if ( ! function_exists( 'journalandportfolio_fallback_menu' ) ) :
	/**
	 * Display default page as navigation if no custom menu was set
	 */
	function journalandportfolio_fallback_menu() {
		$pages = wp_list_pages( 'title_li=&echo=0' );
		echo '<ul id="menu-main-navigation" class="main-navigation-menu menu">' .  $pages  . '</ul>';  // WPCS: XSS OK.
	}
endif;


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function journalandportfolio_body_classes( $classes ) {
		
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}		
	
	// Has no post thumbnail
	if ( ! has_post_thumbnail() && isjournalandportfolioingle()) {
		$classes[] = 'no-thumbnail';
	}	
	
	// Full post thumbnail disabled
	if ( isjournalandportfolioingle() && true == esc_attr(get_theme_mod( 'showjournalandportfolioingle_image', false ) ) ) {	
		$classes[] = 'hide-thumbnail';
	}
	
	// Set blog Style.		
	$journalandportfolio_blog_layout = esc_attr(get_theme_mod( 'journalandportfolio_blog_layout', 'default' ) );
		
	if ( is_home() || is_archive() && !isjournalandportfolioingle() ) {	
		if ( 'large' === $journalandportfolio_blog_layout ) {	
			$classes[] = 'blog-large';
		} else {
			$classes[] = 'blog-default';
		}
	}


	// Set Full Post Style
	$single_layout = esc_attr(get_theme_mod( 'single_layout', 'single-default' ) );
	if ( isjournalandportfolioingle() ) {		
		if  ( 'single-centered' === $single_layout ) {
			$classes[] = 'single-centered';			
		} else {
			$classes[] = 'single-default';	
		}
	}
	

	return $classes;
}
add_filter( 'body_class', 'journalandportfolio_body_classes' );


/**
 * Adds custom classes to the array of post classes.
 *
 * @param array $classes Classes for the post element.
 * @return array
 */
function journalandportfolio_post_classes( $classes ) {

	// Add comments-off class.
	if ( ! ( comments_open() || get_comments_number() ) ) {
		$classes[] = 'comments-off';
	}

	return $classes;
}
add_filter( 'post_class', 'journalandportfolio_post_classes' );


//	Move the read more link outside of the post summary paragraph	
add_filter( 'the_content_more_link', 'journalandportfolio_move_more_link' );
	function journalandportfolio_move_more_link() {
	return '<p><a class="more-link" href="'. esc_url(get_permalink()) . '">' . esc_html__( 'Continue Reading', 'journalandportfolio' ) . '</a></p>';
}



/**
 * Change excerpt length for default posts
 * @param int $length Length of excerpt in number of words.
 * @return int
 */
function journalandportfolio_excerpt_length( $length ) {

	if ( is_admin() ) {
		return $length;
	}

	// Get excerpt length from database.
	$excerpt_length = esc_attr(get_theme_mod( 'journalandportfolio_excerpt_length', '35' ) );
	// Return excerpt text.
	if ( $excerpt_length >= 0 ) :
		return absint( $excerpt_length );
	else :
		return 35; // Number of words.
	endif;
}
add_filter( 'excerpt_length', 'journalandportfolio_excerpt_length' );


/**
 * Change excerpt more text for posts
 * @param String $more_text Excerpt More Text.
 * @return string
 */
function journalandportfolio_excerpt_more( $more_text ) {

	if ( is_admin() ) {
		return $more_text;
	}
	return '&hellip;';
}
add_filter( 'excerpt_more', 'journalandportfolio_excerpt_more' );




/**
 * Adding the read more button to our custom excerpt
 * @link https://codex.wordpress.org/Function_Reference/has_excerpt
 */
function journalandportfolio_excerpt_more_for_manual_excerpts( $excerpt ) {
    global $post;

    if ( has_excerpt( $post->ID ) ) {
        $excerpt .= journalandportfolio_excerpt_more( '&hellip;' );
    }

    return $excerpt;
}
add_filter( 'get_the_excerpt', 'journalandportfolio_excerpt_more_for_manual_excerpts' );
