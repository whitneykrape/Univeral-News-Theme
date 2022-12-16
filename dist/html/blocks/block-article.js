<?php
/* wordpress-start */
/* Change to a block made in WordPress that can be loaded as a pattern. */
/**
 * Article Block
 */
return array(
    'title'      => __( 'Custom Blocks', 'twentytwentytwo' ),
    'categories' => array( 'custom' ),
    'blockTypes' => array( 'core/template-part/custom' ),
    'content'    => ' 
        <!-- wp:columns -->
        <div class="wp-block-columns"
            ><!-- wp:column {"width":"50%"} -->
            <div class="wp-block-column" style="flex-basis:50%">
                <!-- wp:post-featured-image /-->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"width":"50%"} -->
            <div class="wp-block-column" style="flex-basis:50%">
                <!-- wp:post-title /-->

                <!-- wp:post-excerpt /-->
            </div>
            <!-- /wp:column --></div>
        <!-- /wp:columns -->
    ',
);
/* wordpress-end */