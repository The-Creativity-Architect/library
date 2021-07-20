<?php 
/*************************************************************/
## Theme header style . It's header style, part of the theme.
/*************************************************************/

?>
	<header id="site-header" class="site-header">
		<div class="site-header-top">
			<div class="site-container">
				<div class="site-row">
					
					<div class="site-header-top-left site-column-9">
					
						<?php if ( has_nav_menu( 'primary' ) ) : ?>
						<nav class="primary-navigation" id="primary-navigation">
							
							<?php 
							$writtyNav = array(
								'theme_location'  => 'primary',
								'menu'            => '',
								'container'       => false,
								'container_class' => '',
								'container_id'    => '',
								'menu_class'      => '',
								'menu_id'         => '',
								'echo'            => true,
								'fallback_cb'     => '',
								'before'          => '',
								'after'           => '',
								'link_before'     => '',
								'link_after'      => '',
								'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								'depth'           => 0,
								
							); 
							
							wp_nav_menu($writtyNav);
							
							?>
						</nav>
						<a href="<?php echo esc_url( home_url() ) ; ?>" class="mobile-navigation-toggle"></a>
						<?php endif ?>
					</div>
					
					<?php journalandportfolio_getjournalandportfolioocial(); ?>
				</div>
			</div>
		</div>
		
		<div class="site-header-bottom">
			<div class="site-container">
				<div class="site-row">
					<div class="site-header-middle-center">
						<div class="site-brand">
						<?php
							$journalandportfolio_header_text = esc_attr(get_theme_mod('header_text'));
							if ($journalandportfolio_header_text): ?>
							<?php if(!isjournalandportfolioingle()): 
							echo '<h1 class="site-heading">'; 
							else: 
							echo '<h2 class="site-heading">'; 
							endif;  ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<?php bloginfo( 'name' ); ?>
							</a>
							<?php if(!isjournalandportfolioingle()): echo '</h1>'; else: echo '</h2>'; endif;  ?>
							
						<?php 
							elseif(has_custom_logo()): 
						?>
						
							<?php if(!isjournalandportfolioingle()): echo '<h1 class="site-logo">'; else: echo '<h2 class="site-logo">'; endif;  ?>
							<?php the_custom_logo(); ?>
							<?php if(!isjournalandportfolioingle()): echo '</h1>'; else: echo '</h2>'; endif;  ?>
							
						<?php
							else:
						?>
						
							<?php if(!isjournalandportfolioingle()): echo '<h1 class="site-heading">'; else: echo '<h2 class="site-heading">'; endif;  ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
							<?php if(!isjournalandportfolioingle()): echo '</h1>'; else: echo '</h2>'; endif;  ?>
							<?php if(get_bloginfo( 'description' ) != '') : ?>
							<p class="site-tagline"><?php bloginfo( 'description' ); ?></p>
							<?php endif; ?>

						<?php endif;  ?>
						
					
						<?php if($journalandportfolio_header_text && get_bloginfo( 'description' ) != ''): ?>
							<p class="site-tagline"><?php bloginfo( 'description' ); ?></p>
						<?php endif; ?>
						
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="mobile-navigation-toggle"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
    </header><!-- / header -->