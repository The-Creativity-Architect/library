<?php
/**
 *
 * @package creativityarchitect
 */
if (get_theme_mod('creativity_architect_service_section_disable') != 'on') {
    ?>
    <section id="ht-service-post-section" class="ht-section">
        <div class="ht-service-left-bg"></div>
        <div class="ht-container">
            <div class="ht-service-posts ht-clearfix">
                <?php
                $creativity_architect_service_title = get_theme_mod('creativity_architect_service_title');
                $creativity_architect_service_sub_title = get_theme_mod('creativity_architect_service_sub_title');
                ?>
                <?php
                if ($creativity_architect_service_title || $creativity_architect_service_sub_title) {
                    ?>
                    <div class="ht-section-title-tagline">
                        <?php if ($creativity_architect_service_title) { ?>
                            <h2 class="ht-section-title"><?php echo esc_html($creativity_architect_service_title); ?></h2>
                        <?php } ?>

                        <?php if ($creativity_architect_service_sub_title) { ?>
                            <div class="ht-section-tagline"><?php echo esc_html($creativity_architect_service_sub_title); ?></div>
                        <?php } ?>
                    </div>
                <?php } ?>

                <div class="ht-service-post-wrap">
                    <?php
                    for ($i = 1; $i < 7; $i++) {
                        $creativity_architect_service_page_id = get_theme_mod('creativity_architect_service_page' . $i);
                        $creativity_architect_service_page_icon = get_theme_mod('creativity_architect_service_page_icon' . $i);

                        if ($creativity_architect_service_page_id) {
                            $args = array('page_id' => absint($creativity_architect_service_page_id));
                            $query = new WP_Query($args);
                            if ($query->have_posts()):
                                while ($query->have_posts()) : $query->the_post();
                                    ?>
                                    <div class="ht-service-post ht-clearfix">
                                        <div class="ht-service-icon"><i class="<?php echo esc_attr($creativity_architect_service_page_icon); ?>"></i></div>
                                        <div class="ht-service-excerpt">
                                            <h5><?php the_title(); ?></h5>
                                            <div class="ht-service-text">
                                                <?php
                                                if (has_excerpt() && '' != trim(get_the_excerpt())) {
                                                    the_excerpt();
                                                } else {
                                                    echo esc_html(creativity_architect_excerpt(get_the_content(), 100));
                                                }
                                                ?>
                                                <br/>
                                                <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'creativityarchitect'); ?> <i class="fas fa-chevron-right" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                endwhile;
                            endif;
                            wp_reset_postdata();
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php
}
