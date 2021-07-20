<?php
/**
 *
 * @package creativityarchitect
 */
if (get_theme_mod('creativity_architect_client_logo_section_disable') != 'on') {
    ?>
    <section id="ht-logo-section" class="ht-section">
        <div class="ht-container">
            <?php
            $creativity_architect_logo_title = get_theme_mod('creativity_architect_logo_title');
            $creativity_architect_logo_sub_title = get_theme_mod('creativity_architect_logo_sub_title');
            ?>
            <?php if ($creativity_architect_logo_title || $creativity_architect_logo_sub_title) { ?>
                <div class="ht-section-title-tagline">
                    <?php if ($creativity_architect_logo_title) { ?>
                        <h2 class="ht-section-title"><?php echo esc_html($creativity_architect_logo_title); ?></h2>
                    <?php } ?>

                    <?php if ($creativity_architect_logo_sub_title) { ?>
                        <div class="ht-section-tagline"><?php echo esc_html($creativity_architect_logo_sub_title); ?></div>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php
            $creativity_architect_client_logo_image = get_theme_mod('creativity_architect_client_logo_image');
            $creativity_architect_client_logo_image = explode(',', $creativity_architect_client_logo_image);
            ?>

            <div class="ht_client_logo_slider owl-carousel">
                <?php
                foreach ($creativity_architect_client_logo_image as $creativity_architect_client_logo_image_single) {
                    $image = wp_get_attachment_image_src($creativity_architect_client_logo_image_single, 'full');
                    ?>
                    <img class="no-lazyload" src="<?php echo esc_url($image[0]); ?>">
                    <?php
                }
                ?>
            </div>
        </div>
    </section>
    <?php
}
