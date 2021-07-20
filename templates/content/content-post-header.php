<?php 
/****************************************/
## Blog post header content.
/***************************************/

global $post;

$date_format = 'l, F j, Y';

?>
	<div class="entry-header">
		<div class="entry-meta">
			<span class="entry-cat"><?php the_category(' ')?></span>
		</div>
		<?php 
		if (! isjournalandportfolioingle()) :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );

		 else: 
			the_title( '<h1 class="entry-title">', '</h1>' );

		endif; 
		
	   ?>
		<div class="entry-meta">
			<span class="entry-author"><?php echo __('By', 'journalandportfolio'); ?> <?php the_author_posts_link(); ?> </span>
			<span class="entry-date"><?php echo __('on', 'journalandportfolio'); ?> <a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>"><?php the_time($date_format); ?></a></span>
		</div>
	</div>