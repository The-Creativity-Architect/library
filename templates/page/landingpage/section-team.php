<?php
/**
 *
 * @package creativityarchitect
 */
if (get_theme_mod('creativity_architect_team_section_disable') != 'on') {
    ?>
    <section id="ht-team-section" class="ht-section">
        <div class="ht-container">
            <?php
            $creativity_architect_team_title = get_theme_mod('creativity_architect_team_title');
            $creativity_architect_team_sub_title = get_theme_mod('creativity_architect_team_sub_title');
            ?>
            <?php if ($creativity_architect_team_title || $creativity_architect_team_sub_title) { ?>
                <div class="ht-section-title-tagline">
                    <?php if ($creativity_architect_team_title) { ?>
                        <h2 class="ht-section-title"><?php echo esc_html($creativity_architect_team_title); ?></h2>
                    <?php } ?>

                    <?php if ($creativity_architect_team_sub_title) { ?>
                        <div class="ht-section-tagline"><?php echo esc_html($creativity_architect_team_sub_title); ?></div>
                    <?php } ?>
                </div>
            <?php } ?>

            <div class="ht-team-member-wrap ht-clearfix">
                <?php
                for ($i = 1; $i < 5; $i++) {
                    $creativity_architect_team_page_id = get_theme_mod('creativity_architect_team_page' . $i);
                    $creativity_architect_team_page_icon = get_theme_mod('creativity_architect_team_page_icon' . $i);

                    if ($creativity_architect_team_page_id) {
                        $args = array('page_id' => absint($creativity_architect_team_page_id));
                        $query = new WP_Query($args);
                        if ($query->have_posts()):
                            while ($query->have_posts()) : $query->the_post();
                                $creativity_architect_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'creativityarchitect-team-thumb');
                                $creativity_architect_team_designation = get_theme_mod('creativity_architect_team_designation' . $i);
                                $creativity_architect_team_facebook = get_theme_mod('creativity_architect_team_facebook' . $i);
                                $creativity_architect_team_twitter = get_theme_mod('creativity_architect_team_twitter' . $i);
                                $creativity_architect_team_instagram = get_theme_mod('creativity_architect_team_instagram' . $i);
                                $creativity_architect_team_linkedin = get_theme_mod('creativity_architect_team_linkedin' . $i);
                                ?>
                                <div class="ht-team-member">

                                    <div class="ht-team-member-image">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            $image_url = $creativity_architect_image[0];
                                        } else {
                                            $image_url = get_template_directory_uri() . '/images/team-thumb.png';
                                        }
                                        ?>

                                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>" />
                                        <div class="ht-title-wrap">
                                            <h6><?php the_title(); ?></h6>
                                        </div>

                                        <a href="<?php the_permalink(); ?>" class="ht-team-member-excerpt">
                                            <div class="ht-team-member-excerpt-wrap">
                                                <div class="ht-team-member-span">
                                                    <h6><?php the_title(); ?></h6>

                                                    <?php if ($creativity_architect_team_designation) { ?>
                                                        <div class="ht-team-designation"><?php echo esc_html($creativity_architect_team_designation); ?></div>
                                                        <?php
                                                    }

                                                    if (has_excerpt() && '' != trim(get_the_excerpt())) {
                                                        the_excerpt();
                                                    } else {
                                                        echo esc_html(creativity_architect_excerpt(get_the_content(), 100));
                                                    }
                                                    ?>
                                                    <div class="ht-team-detail"><?php esc_html_e('Detail', 'creativityarchitect') ?></div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <?php if ($creativity_architect_team_facebook || $creativity_architect_team_twitter || $creativity_architect_team_instagram) { ?>
                                        <div class="ht-team-social-id">
                                            <?php if ($creativity_architect_team_facebook) { ?>
                                                <a target="_blank" href="<?php echo esc_url($creativity_architect_team_facebook) ?>"><i class="fab fa-facebook-f"></i></a>
                                            <?php } ?>

                                            <?php if ($creativity_architect_team_twitter) { ?>
                                                <a target="_blank" href="<?php echo esc_url($creativity_architect_team_twitter) ?>"><i class="fab fa-twitter"></i></a>
                                            <?php } ?>

                                            <?php if ($creativity_architect_team_instagram) { ?>
                                                <a target="_blank" href="<?php echo esc_url($creativity_architect_team_instagram) ?>"><i class="fab fa-instagram"></i></a>
                                            <?php } ?>

                                            <?php if ($creativity_architect_team_linkedin) { ?>
                                                <a target="_blank" href="<?php echo esc_url($creativity_architect_team_linkedin) ?>"><i class="fab fa-linkedin-in"></i></a>
                                                <?php } ?>
                                        </div>
                                    <?php } ?>
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
    </section>
    <?php
}
