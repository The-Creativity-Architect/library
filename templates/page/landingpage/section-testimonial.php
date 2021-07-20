<?php
/**
 *
 * @package creativityarchitect
 */
if (get_theme_mod('creativity_architect_testimonial_section_disable') != 'on') {
    ?>
    <section id="ht-testimonial-section" class="ht-section">
        <div class="ht-container">
            <?php
            $creativity_architect_testimonial_title = get_theme_mod('creativity_architect_testimonial_title');
            $creativity_architect_testimonial_sub_title = get_theme_mod('creativity_architect_testimonial_sub_title');
            ?>
            <?php if ($creativity_architect_testimonial_title || $creativity_architect_testimonial_sub_title) { ?>
                <div class="ht-section-title-tagline">
                    <?php if ($creativity_architect_testimonial_title) { ?>
                        <h2 class="ht-section-title"><?php echo esc_html($creativity_architect_testimonial_title); ?></h2>
                    <?php } ?>

                    <?php if ($creativity_architect_testimonial_sub_title) { ?>
                        <div class="ht-section-tagline"><?php echo esc_html($creativity_architect_testimonial_sub_title); ?></div>
                    <?php } ?>
                </div>
            <?php } ?>

            <div class="ht-testimonial-wrap">
                <div class="ht-testimonial-slider owl-carousel">
                    <?php
                    $creativity_architect_testimonial_page = get_theme_mod('creativity_architect_testimonial_page');

                    if (is_array($creativity_architect_testimonial_page)) {
                        $args = array(
                            'post_type' => 'page',
                            'post__in' => $creativity_architect_testimonial_page,
                            'posts_per_page' => 8,
                            'ignore_sticky_posts' => true,
                            'orderby' => 'post__in'
                        );
                        $query = new WP_Query($args);
                        if ($query->have_posts()):
                            while ($query->have_posts()) : $query->the_post();
                                $creativity_architect_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'creativityarchitect-thumb');
                                ?>
                                <div class="ht-testimonial">
                                    <div class="ht-testimonial-excerpt">
                                        <i class="fas fa-quote-left"></i>
                                        <?php

                                        if (has_excerpt() && '' != trim(get_the_excerpt())) {
                                            the_excerpt();
                                        } else {
                                            echo esc_html(creativity_architect_excerpt(get_the_content(), 300));
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    if (has_post_thumbnail()) {
                                        ?>
                                        <img src="<?php echo esc_url($creativity_architect_image[0]) ?>" alt="<?php the_title(); ?>">
                                        <?php
                                    }
                                    ?>
                                    <h6><?php the_title(); ?></h6>
                                </div>
                                <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php
}
