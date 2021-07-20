<?php
/**
 * Blog Layout | Grid.
 *
 * @package creativity-architect
 * @subpackage Template Parts
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

$template_parts        = creativity_architect_blog_layout();
$template_parts_header = $template_parts['template_parts_header'];
$template_parts_footer = $template_parts['template_parts_footer'];
$style                 = $template_parts['style'];
$post_classes          = array( 'creativity-architect-blog-layout-grid' );
$post_classes[]        = 'creativity-architect-post-style-' . $style;

?>

<div class="creativity-architect-article-wrapper">

	<article id="post-<?php the_ID(); ?>" <?php post_class( $post_classes ); ?> itemscope="itemscope" itemtype="https://schema.org/CreativeWork">

		<header class="article-header">

			<?php
			if ( ! empty( $template_parts_header ) && is_array( $template_parts_header ) ) {
				foreach ( $template_parts_header as $part ) {
					get_template_part( 'inc/template-parts/blog/blog-' . $part );
				}
			}
			?>

		</header>

		<section class="entry-summary article-content" itemprop="text">

			<?php the_excerpt(); ?>

			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'creativity-architect' ),
				'after'  => '</div>',
			) );
			?>

		</section>

		<?php if ( $template_parts_footer != false ) { ?>

			<footer class="article-footer">

				<?php
				if ( ! empty( $template_parts_footer ) && is_array( $template_parts_footer ) ) {
					foreach ( $template_parts_footer as $part ) {
						get_template_part( 'inc/template-parts/blog/blog-' . $part );
					}
				}
				?>

			</footer>

		<?php } ?>

	</article>

</div>
