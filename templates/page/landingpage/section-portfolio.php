<?php
/**
 *
 * @package creativityarchitect
 */
if (get_theme_mod('creativity_architect_section_disable') != 'on') {
    ?>
    <section id="ht-_s-section" class="ht-section">
        <div class="ht-container">
            <?php
            $creativity_architect_title = get_theme_mod('creativity_architect_title');
            $creativity_architect_sub_title = get_theme_mod('creativity_architect_sub_title');
            ?>

            <?php if ($creativity_architect_title || $creativity_architect_sub_title) { ?>
                <div class="ht-section-title-tagline">
                    <?php if ($creativity_architect_title) { ?>
                        <h2 class="ht-section-title"><?php echo esc_html($creativity_architect_title); ?></h2>
                    <?php } ?>

                    <?php if ($creativity_architect_sub_title) { ?>
                        <div class="ht-section-tagline"><?php echo esc_html($creativity_architect_sub_title); ?></div>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php
            $creativity_architect_cat = get_theme_mod('creativity_architect_cat');

            if ($creativity_architect_cat) {
                $creativity_architect_cat_array = explode(',', $creativity_architect_cat);
                ?>
                <div class="ht-_s-cat-name-list">
                    <i class="fas fa-th-large" aria-hidden="true"></i>
                    <?php
                    foreach ($creativity_architect_cat_array as $creativity_architect_cat_single) {
                        $category_slug = "";
                        $category_slug = get_category($creativity_architect_cat_single);
                        if (is_object($category_slug)) {
                            $category_slug = 'creativityarchitect-_s-' . $category_slug->term_id;
                            ?>
                            <div class="ht-_s-cat-name" data-filter=".<?php echo esc_attr($category_slug); ?>">
                                <?php echo esc_html(get_cat_name($creativity_architect_cat_single)); ?>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            <?php } ?>

            <div class="ht-_s-post-wrap">
                <div class="ht-_s-posts ht-clearfix">
                    <?php
                    if ($creativity_architect_cat) {
                        $count = 1;
                        $args = array('cat' => $creativity_architect_cat, 'posts_per_page' => -1);
                        $query = new WP_Query($args);
                        if ($query->have_posts()):
                            while ($query->have_posts()) : $query->the_post();
                                $categories = get_the_category();
                                $category_slug = "";
                                $cat_slug = array();

                                foreach ($categories as $category) {
                                    $cat_slug[] = 'creativityarchitect-_s-' . $category->term_id;
                                }

                                $category_slug = implode(" ", $cat_slug);

                                if (has_post_thumbnail()) {
                                    $image_url = get_template_directory_uri() . '/images/_s-small-blank.png';
                                    $creativity_architect_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'creativityarchitect-_s-thumb');
                                    $creativity_architect_image_large = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                                } else {
                                    $image_url = get_template_directory_uri() . '/images/_s-small.png';
                                    $creativity_architect_image = "";
                                }
                                ?>
                                <div class="ht-_s <?php echo esc_attr($category_slug); ?>">
                                    <div class="ht-_s-outer-wrap">
                                        <div class="ht-_s-wrap" style="background-image: url(<?php echo esc_url($creativity_architect_image[0]) ?>);">

                                            <img  class="no-lazyload" src="<?php echo esc_url($image_url); ?>" alt="<?php esc_attr(get_the_title()); ?>">

                                            <div class="ht-_s-caption">
                                                <h5><?php the_title(); ?></h5>
                                                <a class="ht-_s-link" href="<?php echo esc_url(get_permalink()); ?>"><i class="fas fa-link"></i></a>

                                                <?php if (has_post_thumbnail()) { ?>
                                                    <a class="ht-_s-image" data-lightbox-gallery="gallery1" href="<?php echo esc_url($creativity_architect_image_large[0]) ?>"><i class="fas fa-search"></i></a>
                                                    <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                    }
                    ?>
                </div>
                <?php ?>
            </div>
        </div>
    </section>
    <?php
}
