<?php
/**
 * Template Name: Page Left Sidebar
 * Template Post Type: page
 * Description: Displays a page with a left sidebar.
 * @package journalandportfolio
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>


<div id="page-column-grid">
    <?php while ( have_posts() ) : the_post(); 
				get_template_part( 'template-parts/page/content', 'page' ); 
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			endwhile; ?>

    <?php getjournalandportfolioidebar();?>
</div>


<?php 
get_footer();
