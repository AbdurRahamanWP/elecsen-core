<div class="testimonial_slider_two" id="testimonial_carousel_two">
    <?php
    if (!empty($testimonials)) {
        $i = 1;
        foreach ($testimonials as $testimonial) { ?>
            <div class="item">
                <div class="testimonial_two_content" data-text="0<?php echo esc_attr($i++) ?>">
                    <?php
                    if (!empty($testimonial['author_image']['id'])) {
                        echo wp_get_attachment_image($testimonial['author_image']['id'], 'quax_80x80');
                    }

                    if (!empty($testimonial['author_name'])) {
                        echo '<h2>' . esc_html($testimonial['author_name']) . '</h2>';
                        echo '<span>' . esc_html($testimonial['designation']) . '</span>';
                    }
                    
                    if (!empty($testimonial['contents'])) {
                        echo wp_kses_post(wpautop($testimonial['contents']));
                    } ?>
                </div>
            </div>
            <?php
        }
    } ?>
</div>