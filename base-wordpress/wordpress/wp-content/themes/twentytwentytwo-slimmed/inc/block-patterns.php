<?php
/**
 * Slim Blocks: Block Patterns
 *
 * @since Slim Blocks 1.0
 */

/**
 * Registers block patterns and categories.
 *
 * @since Slim Blocks 1.0
 *
 * @return void
 */
function slimblocks_register_block_patterns() {
	$block_pattern_categories = array(
		// 'featured' => array( 'label' => __( 'Featured', 'twentytwentytwo' ) ),
		// 'footer'   => array( 'label' => __( 'Footers', 'twentytwentytwo' ) ),
		// 'header'   => array( 'label' => __( 'Headers', 'twentytwentytwo' ) ),
		// 'query'    => array( 'label' => __( 'Query', 'twentytwentytwo' ) ),
		// 'pages'    => array( 'label' => __( 'Pages', 'twentytwentytwo' ) ),
		// 'single'   => array( 'label' => __( 'Single', 'twentytwentytwo' ) ),
		'slim'    	  => array( 'label' => __( 'Slim', 'twentytwentytwo' ) ),
	);

	/**
	 * Filters the theme block pattern categories.
	 *
	 * @since Slim Blocks 1.0
	 *
	 * @param array[] $block_pattern_categories {
	 *     An associative array of block pattern categories, keyed by category name.
	 *
	 *     @type array[] $properties {
	 *         An array of block category properties.
	 *
	 *         @type string $label A human-readable label for the pattern category.
	 *     }
	 * }
	 */
	$block_pattern_categories = apply_filters( 'slimblocks_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}

	$patterns_directory    	= __DIR__ . '/patterns/';
	$patterns_files 		= array_diff(scandir($patterns_directory), array('..', '.'));
	$patterns_files 		= array_map(function($e) {
	    return pathinfo($e, PATHINFO_FILENAME);
	}, $patterns_files);

	/*
	$block_patterns = array(
		'footer-default',
		'header-default',
		'hidden-404',
		'page-layout-two-columns',
		'query-default',
	);
	*/
	$block_patterns 		= $patterns_files;

	/**
	 * Filters the theme block patterns.
	 *
	 * @since Slim Blocks 1.0
	 *
	 * @param array $block_patterns List of block patterns by name.
	 */
	$block_patterns = apply_filters( 'slimblocks_block_patterns', $block_patterns );

	foreach ( $block_patterns as $block_pattern ) {
		$pattern_file = get_theme_file_path( '/inc/patterns/' . $block_pattern . '.php' );

		register_block_pattern(
			'twentytwentytwo-slimmed/' . $block_pattern,
			require $pattern_file
		);
	}
}
add_action( 'init', 'slimblocks_register_block_patterns', 9 );
