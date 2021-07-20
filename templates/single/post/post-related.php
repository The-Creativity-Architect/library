<?php 
global $post;
$categories = get_the_category($post->ID);
$related_no = 3;

$date_format = 'l, F j, Y';
if ($categories):

	$category_ids = array();
	foreach($categories as $individual_category): 
	$category_ids[] = $individual_category->term_id;
	endforeach;
 
	$args = array('post__not_in' => array($post->ID),'posts_per_page'=> $related_no , 'category__in'=> $category_ids);
	
	$related_query = new wp_query( $args );
	
	if($related_query->have_posts()): $count=0; ?>
	<div class="widget widget_related_posts">
		<h6 class="widget-title"><span><?php echo __('Related Posts', 'journalandportfolio') ?></span></h6>
		<div class="entry-list entry-big-thumb">
			<?php while ($related_query->have_posts() ) : $related_query->the_post()?>
				<article class="entry">
					<?php journalandportfolio_featured_image(get_the_ID(), 'medium'); ?>
					<div class="entry-meta">
						<span class="entry-cat"><?php the_category(' ')?></span>
					</div>
					<?php the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" title="'.the_title_attribute( 'echo=0' ).'">', '</a></h4>' ); ?>
				</article>
			<?php endwhile; ?>
		</div>
	</div>
<?php 
	endif;
	
endif; //if ($categories)
  wp_reset_query();  // Restore global post data stomped by the_post().
  
 ?>