<?php
/**
 * Blocks Only functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Blocks_Only
 * @since Blocks Only 1.0
 */


if ( ! function_exists( 'blocksonly_support' ) ) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * @since Twenty Twenty-Two 1.0
     *
     * @return void
     */
    function blocksonly_support() {

        // Add support for block styles.
        add_theme_support( 'wp-block-styles' );

        // Enqueue editor styles.
        add_editor_style( 'style.css' );

    }

endif;

add_action( 'after_setup_theme', 'blocksonly_support' );

if ( ! function_exists( 'blocksonly_styles' ) ) :

    /**
     * Enqueue styles.
     *
     * @since Twenty Twenty-Two 1.0
     *
     * @return void
     */
    function blocksonly_styles() {
        // Register theme stylesheet.
        $theme_version = wp_get_theme()->get( 'Version' );

        $version_string = is_string( $theme_version ) ? $theme_version : false;
        wp_register_style(
            'blocksonly-style',
            get_template_directory_uri() . '/style.css',
            array(),
            $version_string
        );

        // Add styles inline.
        wp_add_inline_style( 'blocksonly-style', blocksonly_get_font_face_styles() );

        // Enqueue theme stylesheet.
        wp_enqueue_style( 'blocksonly-style' );

    }

endif;

add_action( 'wp_enqueue_scripts', 'blocksonly_styles' );

if ( ! function_exists( 'blocksonly_editor_styles' ) ) :

    /**
     * Enqueue editor styles.
     *
     * @since Twenty Twenty-Two 1.0
     *
     * @return void
     */
    function blocksonly_editor_styles() {

        // Add styles inline.
        wp_add_inline_style( 'wp-block-library', blocksonly_get_font_face_styles() );

    }

endif;

add_action( 'admin_init', 'blocksonly_editor_styles' );


// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';
