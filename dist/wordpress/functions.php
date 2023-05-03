<?php
if ( function_exists( 'register_block_pattern_category' ) ) {
	register_block_pattern_category(
		'slim',
		array( 'label' => __( '_Slim_', 'slim' ) )
	);
}

if ( ! function_exists( 'slim_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Slim 1.0
	 *
	 * @return void
	 */
	function slim_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

	}

endif;
add_action( 'after_setup_theme', 'slim_support' );

if ( ! function_exists( 'slim_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Slim 1.0
	 *
	 * @return void
	 */
	function slim_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style(
			'slim_styles',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'slim_styles' );

	}

endif;
add_action( 'wp_enqueue_scripts', 'slim_styles' );