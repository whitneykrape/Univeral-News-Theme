<?php

/**
 * Plugin Name: Article Block
 * Plugin URI: 
 * Description: 
 * Version: 0.0.1
 * Author: 
 *
 * @package block_template_article
 */

defined( 'ABSPATH' ) || exit;

/**
 * Load all translations for our plugin from the MO file.

add_action( 'init', 'block_template_load_textdomain' );

function block_template_load_textdomain() {
	load_plugin_textdomain( 'block-article', false, basename( __DIR__ ) . '/languages' );
}
*/

/**
 * Registers all block assets so that they can be enqueued through Gutenberg in
 * the corresponding context.
 *
 * Passes translations to JavaScript.
 */

function loadArticleBlock() {
  wp_enqueue_script(
    'article-block',
    plugin_dir_url(__FILE__) . '/build/index.js',
    array('wp-blocks','wp-editor'),
    true
  );

  register_block_type( 'wooden-blocks/article-block-es6', array(
      'api_version' => 2,
      'editor_script' => 'article-block-es6-script',
  ) );
}
   
add_action('enqueue_block_editor_assets', 'loadArticleBlock');
