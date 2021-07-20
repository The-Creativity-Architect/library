<?php 
/*******************************************************/
## Masonry style standard post layout view 
/*******************************************************/
global $post;
$post_excerptjournalandportfoliotatus = get_theme_mod('journalandportfolio_blog_post_excerpt', 'enable');
?>
<article id="entry-<?php echo $post->ID; ?>" <?php post_class('entry-first'); echo 'style="text-align:center;"';?>>
	<div class="entry-row">
		<div class="entry-full-center">
			<?php 
				get_template_part('inc/theme/views/content-post-header');
				journalandportfolio_featured_image($post->ID, 'journalandportfolio-post-image');
			?>
			<div class="entry-content">
				<?php 
					if ($post_excerptjournalandportfoliotatus == 'enable'):
						the_excerpt();
					 else:
						the_content( '' );
					endif;
				?>
			</div>
			<?php get_template_part('inc/theme/views/content-post-footer'); ?>
		</div>
	</div>
</article>