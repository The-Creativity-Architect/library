<?php
/**
 * Template Name: For Page Builders
 * Template Post Type: page
 * Description: A template for several page builders.
 * @package journalandportfolio
 */

get_header(); ?>

<div id="page-content">	

		<?php
		while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/page/content', 'page' );

		endwhile; // End of the loop.
		?>


	</div>

<?php get_footer(); ?>
