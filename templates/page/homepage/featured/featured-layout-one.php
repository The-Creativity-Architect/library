<div class="featured-blog"> 
  <div class="container">
    <?php if( $title ) : ?>
      <h5 class="section-heading"><?php echo esc_html( $title ); ?></h5>
    <?php endif; ?>
    <div class="featured-blog-view-1">
      <?php while ( $query ->have_posts() ) : $query ->the_post(); ?>           
        <div class="featured-blog-items"> 
          <div class="news-snippet">
            <?php if ( has_post_thumbnail() ) : ?>
              <a href="<?php the_permalink(); ?>" rel="bookmark" class="featured-image"><?php the_post_thumbnail( 'medium' ); ?></a>                      
            <?php endif; ?>

            <!-- summary -->
            <div class="summary">
              <?php
                if( in_array( 'categories', $post_details ) ) {
                  $categories = get_the_category();
                  if( ! empty( $categories ) ) :
                    foreach ( $categories as $value ) { ?>
                      <h6 class="category"><a href="<?php echo esc_url( get_category_link( $value->term_id ) ); ?>"><?php echo esc_html( $value->name ); ?></a></h6>
                    <?php }
                  endif;
                }
              ?>

              <h4 class="news-title">
                <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php the_title(); ?></a>
              </h4>

              <?php if( is_array( $post_details ) && ! empty( $post_details ) ) : ?>
                <div class="info">

                  <ul class="list-inline">

                    <?php if( in_array( 'author', $post_details ) ) { ?>
                      <li>
                        <a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                          <?php $avatar = get_avatar( get_the_author_meta( 'ID' ), $size = 60 );
                          if( $avatar ) : ?>
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
                      <li>
                        <i class="fa fa-clock-o"></i>
                        <a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day ) ); ?>"><?php echo get_the_date(); ?></a>
                      </li>
                    <?php } ?>

                    <?php if( in_array( 'tags', $post_details ) ) { ?>
                      <?php $tags = get_the_tags();
                      if( ! empty( $tags ) ) :
                        foreach ( $tags as $value ) { ?>
                          <li>
                            <a href="<?php echo esc_url( get_category_link( $value->term_id ) ); ?>"><?php echo esc_html( $value->name ); ?></a>
                          </li>
                        <?php }
                      endif; ?>
                    <?php } ?>


                    <?php if( in_array( 'number_of_comments', $post_details ) ) { ?>
                      <li>
                        <i class="fa fa-comments-o"></i>
                        <?php comments_popup_link( __( 'zero comment', 'journalandportfolio' ), __( 'one comment', 'journalandportfolio' ), __( '% comments', 'journalandportfolio' ) ); ?>
                      </li>
                    <?php } ?>

                  </ul>
                </div>
              <?php endif; ?>

              <?php if( in_array( 'description', $post_details ) ) { ?>
                <div class="summary-excerpt">
                  <?php the_excerpt(); ?>                
                </div>
              <?php } ?>

              <?php if( in_array( 'read-more', $post_details ) ) { ?>

                <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" title="" class="readmore">
                  <?php esc_html_e( 'Read More','journalandportfolio' ); ?>                
                </a>
              <?php } ?>

            </div>
            <!-- summary -->
          </div>
        </div>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
  </div> 
</div> 