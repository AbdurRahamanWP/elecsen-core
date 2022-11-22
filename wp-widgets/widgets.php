<?php

// Require widget files
require plugin_dir_path(__FILE__) . 'Quax_widget_recent_post.php';


// Register Widgets
add_action('widgets_init', function () {
    register_widget('Quax_widget_recent_post');
});
