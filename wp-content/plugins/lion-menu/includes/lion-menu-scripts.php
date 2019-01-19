<?php

// Add Scripts
function lm_add_scripts(){
    // Add Main CSS
    wp_enqueue_style('lm-main-style', plugins_url(). '/lion-menu/css/style.css');
    // Add Main JS
    wp_enqueue_script('lm-main-script', plugins_url(). '/lion-menu/js/script.js');
}

add_action('wp_enqueue_scripts', 'lm_add_scripts');
