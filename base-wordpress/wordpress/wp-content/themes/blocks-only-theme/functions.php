<?php
function ffiobaseStyle() {
    wp_enqueue_style('ffiobase-style', get_stylesheet_directory_uri() .'/style.css', array(), '2' );       
}
add_action('wp_enqueue_scripts', 'ffiobaseStyle');