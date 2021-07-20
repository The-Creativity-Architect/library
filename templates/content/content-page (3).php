<?php 
/*********************************************/
## page detail
/*********************************************/
	global $post;
?>
<article id="entry-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-row">
		<div class="entry-full-center">
			<div class="entry-header">
				<?php 
				if (isjournalandportfolioingle()) :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
					
				 else: 
					the_title( '<h2 class="entry-title">', '</h2>' );
					
				endif; ?>
			</div>
			<?php journalandportfolio_featured_image(get_the_ID(), 'WRT-post-image'); ?>
			
			<div class="entry-content">
				
				<?php the_content();?>
				
			</div>
			<div class="entry-paginated-link"><?php wp_link_pages(); ?></div>
		</div>
	</div>
</article>