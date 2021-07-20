<?php
/**
 *
 * @package creativityarchitect
 */
if (get_theme_mod('creativity_architect_about_page_disable') != 'on') {
    ?>
    <section id="ht-about-us-section" class="ht-section">
        <div class="ht-container ht-clearfix">
            <div class="ht-about-sec">
                <?php
                $creativity_architect_about_page_id = get_theme_mod('creativity_architect_about_page');
                if ($creativity_architect_about_page_id) {
                    $args = array(
                        'page_id' => absint($creativity_architect_about_page_id)
                    );
                    $query = new WP_Query($args);
                    if ($query->have_posts()):
                        while ($query->have_posts()) : $query->the_post();
                            ?>
                            <h2 class="ht-section-title"><?php the_title(); ?></h2>
                            <div class="ht-content">
                                <?php
                                if (has_excerpt() && '' != trim(get_the_excerpt())) {
                                    the_excerpt();
                                } else {
                                    the_content();
                                }
                                ?>
                            </div>
                            <?php
                        endwhile;
                    endif;
                    wp_reset_postdata();
                }
                ?>

                <div class="ht-progress-bar-sec">
                    <?php
                    for ($i = 1; $i < 6; $i++) {
                        $creativity_architect_about_progressbar_title = get_theme_mod('creativity_architect_about_progressbar_title' . $i);
                        $creativity_architect_about_progressbar_percentage = get_theme_mod('creativity_architect_about_progressbar_percentage' . $i);
                        $creativity_architect_about_progressbar_disable = get_theme_mod('creativity_architect_about_progressbar_disable' . $i);
                        if (!$creativity_architect_about_progressbar_disable) {
                            ?>
                            <div class="ht-progress">
                                <h6><?php echo esc_html($creativity_architect_about_progressbar_title); ?></h6>
                                <div class="ht-progress-bar">
                                    <div class="ht-progress-bar-length" style="width:<?php echo absint($creativity_architect_about_progressbar_percentage); ?>%">
                                        <span><?php echo absint($creativity_architect_about_progressbar_percentage) . "%"; ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="ht-about-image">
                <?php
                $creativity_architect_about_widget = get_theme_mod('creativity_architect_about_widget');
                if ($creativity_architect_about_widget) {
                    dynamic_sidebar($creativity_architect_about_widget);
                } else {
                    $creativity_architect_about_image = get_theme_mod('creativity_architect_about_image');
                    if ($creativity_architect_about_image) {
                        echo '<img alt="' . esc_html(get_the_title()) . '" src="' . esc_url($creativity_architect_about_image) . '"/>';
                    }
                }
                ?>
            </div>

        </div>
    </section>
    <?php
}
