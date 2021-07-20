<?php $post_details = get_theme_mod( 'slider_details_show_hide', array( 'date', 'categories', 'summary', 'readmore' ) ); ?>
<div class="slider-banner slider-banner-1">
  <div id="owl-slider" class="owl-carousel"> 
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <div class="item">
          <div class="banner-news-list">
          <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'journalandportfolio_slider' ); ?>
              <div class="banner-news-image">
              <?php if( ! empty( $image ) ) : ?>                 
                <img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php echo esc_attr( $title ); ?>" class="img-responsive">
              <?php endif; ?>
              </div>
              <div class="banner-news-caption">
                <?php
                  if( in_array( 'categories', $post_details ) ) :
                    $categories = get_the_category();
                    $separator = ' ';
                    $output = '';
                    if ( ! empty( $categories ) ) :
                      foreach ( $categories as $value ) {
                        $output .= '<h6 class="category"><a class="news-category" href="'. esc_url( get_category_link( $value->term_id ) ) . '">' . esc_html( $value->name ) . '</a></h6>' . $separator;
                      }
                      echo trim( $output, $separator );
                    endif;
                  endif
                ?>
                <h3 class="news-title"><a href="<?php echo esc_url( get_the_permalink( $post->ID ) ); ?>"><?php the_title(); ?></a></h3>
                <?php if( in_array( 'date', $post_details ) ) : ?>
                  <div class="info">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    <?php echo get_the_date(); ?>
                  </div>
                <?php endif; ?>

                <?php if( in_array( 'summary', $post_details ) ) : ?>
                    <div class="summary"> 
                      <?php echo journalandportfolio_excerpt( 25 ); ?>
                    </div>
                  <?php endif; ?>
                <?php if( in_array( 'readmore', $post_details ) ) : ?>
                  <a href="<?php echo esc_url( get_the_permalink( $post->ID ) ); ?>" class="readmore"><?php esc_html_e( 'Read More', 'journalandportfolio' ); ?></a>
                <?php endif; ?>
              </div> 
          </div>
        </div>
    <?php endwhile; wp_reset_postdata(); ?>
  </div> 
</div>

