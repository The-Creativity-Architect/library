<?php
/**
 * Template Name: Fullwidth 2
 * Template Post Type: post
 * The template used for displaying fullwidth page content in fullwidth.php
 *
 * @package Bootstrap Blog
 */
get_header(); ?>
<div class="inside-page full-width">
		<section class="page-section">		          
		      <div class="detail-content">	

					<?php while ( have_posts() ) : the_post(); ?>
					  
					<?php $post_details = get_theme_mod( 'detail_post_show_hide_details', array( 'date', 'categories', 'tags' ) ); ?>
					
					<div class="single-post">
					
					<div class="post-content">
					
					<div class="image-title-overlay">
					
					<?php if ( has_post_thumbnail() ) : ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' ); ?>
					<figure class="feature-image" style="background-image:url(<?php echo esc_url( $image[0] ); ?>);" >					</figure>
					<?php endif; ?> 

					<div class="post-title-overlay">
					<h1 class="page-title"><?php the_title(); ?></h1>

					<?php if( is_array( $post_details ) && ! empty( $post_details ) ) : ?>
					<div class="info">
					<ul class="list-inline">


					<?php if( in_array( 'author', $post_details ) ) { ?>
					<li>
					<a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
					  <?php $avatar = get_avatar( get_the_author_meta( 'ID' ), $size = 60 ); ?>
					  <?php if( $avatar ) : ?>
					    <div class="author-image"> 
					      <?php echo $avatar; ?>
					    </div>
					  <?php endif; ?>
					  <?php echo esc_html( get_the_author() ); ?>
					</a>
					</li>
					<?php } ?>

					<?php if( in_array( 'date', $post_details ) ) { ?>
					<?php $archive_year  = get_the_time('Y'); $archive_month = get_the_time('m'); $archive_day = get_the_time('d'); ?>
					<li><i class="fa fa-clock-o"></i> <a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day ) ); ?>"><?php echo get_the_date(); ?></a></li>
					<?php } ?>

					<?php if( in_array( 'categories', $post_details ) ) { ?>
					<li>
					  <?php $categories = get_the_category();
					  if( ! empty( $categories ) ) :
					    foreach ( $categories as $cats ) { ?>
					       <h6 class="category"><a href="<?php echo esc_url( get_category_link( $cats->term_id ) ); ?>"><?php echo esc_html( $cats->name ); ?></a></h6>
					    <?php }
					  endif; ?>
					</li>
					<?php } ?>

					<?php if( in_array( 'tags', $post_details ) ) { ?>
					<?php $tags = get_the_tags();
					if( ! empty( $tags ) ) :
					  foreach ( $tags as $value ) { ?>
					    <li><a href="<?php echo esc_url( get_category_link( $value->term_id ) ); ?>"><?php echo esc_html( $value->name ); ?></a></li>
					  <?php }
					endif; ?>
					<?php } ?>


					<?php if( in_array( 'number_of_comments', $post_details ) ) { ?>
					<li><i class="fa fa-comments-o"></i> <?php comments_popup_link( __( 'zero comment', 'bootstrap-blog' ), __( 'one comment', 'bootstrap-blog' ), __( '% comments', 'bootstrap-blog' ) ); ?></li>
					<?php } ?>

					</ul>
					</div>
					<?php endif; ?>
					</div>
					</div>




					<div class="container">
					<article>
					<?php the_content(); ?>

					<?php
					wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bootstrap-blog' ),
					'after'  => '</div>',
					) );
					?>     
					</article>
					</div>

					</div>

					<div class="container">
					<?php $author_block = get_theme_mod( 'show_hide_author_block_details', 'author' ); ?>

					<?php if( is_array( $author_block ) && in_array( 'author', $author_block ) ) : ?>
					<div class="author-post clearfix">
					<?php $avatar = get_avatar( get_the_author_meta( 'ID' ), $size = 75 ); ?>
					<?php if( $avatar ) : ?>
					<div class="author-image"> 
					<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo $avatar; ?></a>
					</div>
					<?php endif; ?>
					<div class="author-details">
					<h4><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></h4>
					<p><?php echo esc_html( get_the_author_meta('description') ); ?></p>
					</div>
					</div>
					<?php endif; ?>

					</div>
					</div>


	              <?php endwhile; // End of the loop. ?>
<div class="container">
	              <?php comments_template(); ?>  </div>       

	          </div> <!-- /.end of detail-content -->		  
		</section><!-- /.end of section -->
</div>
<?php get_footer(); ?>
