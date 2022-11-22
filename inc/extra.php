<?php
/*Add Image Size ------------------------------*/
add_image_size('quax_60x60', 60, 60, true); // Testimonials Author Image
add_image_size('quax_80x80', 80, 80, true); // Testimonials Two Author Image
add_image_size('quax_370x250', 370, 250, true); // Blog Thumbnail Image
add_image_size('quax_360x300', 360, 300, true );



// Elementor is anchor external target
function quax_is_external($settings_key)
{
    if (isset($settings_key['is_external'])) {
        echo $settings_key['is_external'] == true ? 'target="_blank"' : '';
    }
}

/**
 * Check if the url is external or nofollow
 * @param $settings_key
 * @param bool $is_echo
 * @return string
 */
function quax_el_btn($settings_key, $is_echo = true)
{
    if ($is_echo == true) {
        echo !empty($settings_key['url']) ? "href='{$settings_key['url']}'" : '';
        echo $settings_key['is_external'] == true ? 'target="_blank"' : '';
        echo $settings_key['nofollow'] == true ? 'rel="nofollow"' : '';
    } else {
        $output = !empty($settings_key['url']) ? "href='{$settings_key['url']}'" : '';
        $output .= $settings_key['is_external'] == true ? 'target="_blank"' : '';
        $output .= $settings_key['nofollow'] == true ? 'rel="nofollow"' : '';
        return $output;
    }
}

// Check if the url is external or nofollow
function quax_is_exno($settings_key)
{
    echo $settings_key['is_external'] == true ? 'target="_blank"' : '';
    echo $settings_key['nofollow'] == true ? 'rel="nofollow"' : '';
}


function quax_icon_array($k, $replace = 'icon', $separator = '-')
{
    $v = array();
    foreach ($k as $kv) {
        $kv = str_replace($separator, ' ', $kv);
        $kv = str_replace($replace, '', $kv);
        $v[] = array_push($v, ucwords($kv));
    }
    foreach ($v as $key => $value) if ($key & 1) unset($v[$key]);
    return array_combine($k, $v);
}


function quax_enter_title($input)
{
    global $post_type;
    if (is_admin() && 'Enter title here' == $input && 'team' == $post_type)
        return 'Enter here the team member name';
    return $input;
}
add_filter('gettext', 'quax_enter_title');

// Category array
function quax_cat_array($term = 'category')
{
    $cats = get_terms(array(
        'taxonomy' => $term,
        'hide_empty' => true
    ));
    $cat_array = array();
    $cat_array[] = '';
    foreach ($cats as $cat) {
        $cat_array[$cat->slug] = $cat->name;
    }
    return $cat_array;
}

// Get blog category list
function quax_taxonomy_terms($term = 'category')
{
    $cats = get_the_terms(get_the_ID(), $term);
    if (!empty($cats)) {
        $cats_count = count($cats);
        $i = 1;
        foreach ($cats as $cat) {
            $separator = ($i == $cats_count) ? '' : ', ';
            echo '<a href="' . get_term_link($cat->term_id) . '" class="category_tag">' . $cat->name . '</a>' . $separator;
            ++$i;
        }
    }
}


// Limit latter
function quax_get_limit_char($string, $limit_length, $suffix = '...')
{
    if ( strlen($string) > $limit_length ) {
        return strip_shortcodes(substr($string, 0, $limit_length) . $suffix);
    } else {
        return strip_shortcodes(esc_html($string));
    }
}

// Quax Product Gallery -----------------------
function quax_product_gallery()
{
    global $product;
    $gallery_ids = $product->get_gallery_image_ids();
    foreach ($gallery_ids as $gallery_id) {
?>
        <a href="<?php the_permalink() ?>">
            <?php echo wp_get_attachment_image($gallery_id, 'full', array('class' => 'primary_thumb')); ?>
        </a>
    <?php
    }
}


//Additional Image Size==================
function quax_additional_image_size()
{
    $imgsizes = wp_get_additional_image_sizes();

    $img_size = array();
    $img_size[] = '';
    foreach ($imgsizes as $img_key => $val) {
        $img_size[$img_key] = $img_key . ' [ ' . $val['width'] . 'x' . $val['height'] . ' ]';
    }
    return $img_size;
}

