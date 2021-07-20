<?php 
/*************************************************************/
## Theme footer style 1. It's footer style, part of the theme.
/*************************************************************/


?>
<footer id="site-footer" class="site-footer">
	<?php if (is_activejournalandportfolioidebar('footer-1') || is_activejournalandportfolioidebar('footer-2') || is_activejournalandportfolioidebar('footer-3')): ?>
	<div class="site-footer-top">
		<div class="site-container">
			<div class="site-row">
			
				<div class="site-column-4">
					<?php dynamicjournalandportfolioidebar('footer-1'); ?>
				</div>
			
				<div class="site-column-4">
					<?php dynamicjournalandportfolioidebar('footer-2'); ?>
				</div>
			
				<div class="site-column-4">
					<?php dynamicjournalandportfolioidebar('footer-3'); ?>
				</div>
			
			</div>
		</div>
	</div>
	<?php endif; ?>
	<div class="site-footer-bottom">
		<div class="site-container text-center">
			<?php 
				echo wp_kses_post(get_theme_mod('wrt_copyright')); 
			?>
			
			<?php echo __('Theme by', 'journalandportfolio') ?>
			<a href="<?php echo esc_url( __( 'http://www.scissorthemes.com/', 'journalandportfolio' ) ); ?>" traget="_blank"><?php printf( __( ' %s', 'journalandportfolio' ), 'Scissor Themes' ); ?></a>
			<?php echo __('Proudly powered by', 'journalandportfolio') ?>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'journalandportfolio' ) ); ?>" traget="_blank"><?php printf( __( ' %s', 'journalandportfolio' ), 'WordPress' ); ?></a>
			
		</div>
	</div>
	
</footer><!-- / footer -->