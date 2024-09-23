<?php

/**
 * WP Base Theme functions and definitions
 *
 * @author Dennis Kjellin
 * @package WP Base Theme
 * @since 1.0.0
 */

// Require necessary files
require_once get_template_directory() . '/inc/main-navbar-walker.php';

// Theme support
function theme_support() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'theme_support');

// Register menus
function wp_register_menus() {
    register_nav_menus(array(
        'main-menu' => 'Main menu',
    ));
}
add_action('init', 'wp_register_menus');

// Add custom walker class to the main menu
function np_add_menu_walker($args) {
    $args['walker'] = new main_navbar_walker();
    return $args;
}
add_filter('wp_nav_menu_args', 'np_add_menu_walker');

// Enqueue styles and scripts
function enqueue_custom_scripts() {
    wp_enqueue_style('wp-base-theme-css', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_script('wp-base-main-js', get_template_directory_uri() . '/js/main.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

function enqueue_browser_sync() {
    // Check if we're in the development environment (adjust as needed)
    if (defined('WP_ENV') && WP_ENV === 'development') {
        wp_enqueue_script(
            'browser-sync',
            'http://localhost:3000/browser-sync/browser-sync-client.js',
            array(),
            null,
            true // Load in the footer
        );
    }
}
add_action('wp_enqueue_scripts', 'enqueue_browser_sync');;