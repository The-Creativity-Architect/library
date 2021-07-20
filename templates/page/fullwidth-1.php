<?php
/**
 * Template Name: Fullwidth 1
 * Template Post Type: post
 * The template used for displaying fullwidth page content in fullwidth.php
 *
 * @package Bootstrap Blog
 */
get_header(); ?>
<div class="inside-page full-width">
	<div class="container">
		<section class="page-section">		          
		      <div class="detail-content">	

	              <?php while ( have_posts() ) : the_post(); ?>
	                  <?php get_template_part( 'template-parts/content', 'single' ); ?>
	              <?php endwhile; // End of the loop. ?>

	              <?php comments_template(); ?>         

	          </div> <!-- /.end of detail-content -->		  
		</section><!-- /.end of section -->
	</div>
</div>
<?php get_footer(); ?>
