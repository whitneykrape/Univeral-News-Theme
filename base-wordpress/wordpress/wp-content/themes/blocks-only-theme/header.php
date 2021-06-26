<?php
/**
 * 
 * Header pulling from twentytwentyone, as other pieces are. 
 *
 * @package WordPress
 * @subpackage Form Function IO Base
 * @since FFIOBase 1.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> <?php body_class(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ffiobase' ); ?></a>

	<?php 
		// Need to build the nav/overall header, using pieces from original theme is fine for now.
		get_template_part( 'template-parts/header/site-header' ); 
	?>

	<div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main container" role="main">
