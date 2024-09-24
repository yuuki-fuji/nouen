<?php

function theme_enqueue_assets()
{
    // jQueryを読み込む
  wp_enqueue_script('jquery');

  wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.0');

}
add_action('wp_enqueue_scripts', 'theme_enqueue_assets');
