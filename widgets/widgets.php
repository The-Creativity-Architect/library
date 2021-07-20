<?php
/**
 * Book Landing Page Widgets
 *
 * @packet The_Creativity_Architect
 */
 
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function creativity_architect_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'the-creativity-architect' ),
		'id'            => 'right-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'the-creativity-architect' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
    if( creativity_architect_is_newsletter_activated() ){

		 register_sidebar( array(
			'name'          => esc_html__( 'Subscription Widget', 'the-creativity-architect' ),
			'id'            => 'bottom-widget',
			'description'   => '',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}
}
add_action( 'widgets_init', 'creativity_architect_widgets_init' );

/**
 * Load widget featured post.
 */
require get_template_directory() . '/inc/widgets/widget-featured-post.php';

/**
 * Load widget featured post.
 */
require get_template_directory() . '/inc/widgets/widget-popular-post.php';

/**
 * Load widget recent post.
 */
require get_template_directory() . '/inc/widgets/widget-recent-post.php';

/**
 * Load widget social link.
 */
require get_template_directory() . '/inc/widgets/widget-social-links.php';
