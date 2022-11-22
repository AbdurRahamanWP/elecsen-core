<div class="testimonial_slider" id="testimonial_carousel">
    <?php
    if (!empty($testimonials)) {
        $i = 1;
        foreach ($testimonials as $testimonial) { ?>
            <div class="item">
                <div class="testimonial_content" data-text="0<?php echo esc_attr($i++) ?>">
                    <?php
                    if (!empty($testimonial['contents'])) {
                        echo '<div class="testimonial_desc">';
                        echo wp_kses_post(wpautop($testimonial['contents']));
                        echo '</div>';
                    } ?>
                    <div class="testimonial_author">
                        <?php
                        if (!empty($testimonial['author_image']['id'])) {
                            echo wp_get_attachment_image($testimonial['author_image']['id'], 'quax_60x60');
                        }
                        if (!empty($testimonial['author_name'])) {
                            echo '<div class="testimonial_author_meta">';
                            echo '<h2>' . esc_html($testimonial['author_name']) . '</h2>';
                            echo '<span>' . esc_html($testimonial['designation']) . '</span>';
                            echo '</div>';
                        } ?>
                    </div>
                </div>
            </div>
            <?php
        }
    } ?>
</div>