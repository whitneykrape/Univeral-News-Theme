<?php
return array(
    'title'      => __( 'Block Article', 'blocksslim' ),
    'categories' => array( 'slim' ),
    'content'    => '<!-- wp:group {"layout":{"type":"constrained"}} -->
                <div class="wp-block-group">
                    <!-- wp:image -->
                    <figure class="wp-block-image"><img alt=""/></figure>
                    <!-- /wp:image -->

                    <!-- wp:heading -->
                    <h2>Heading</h2>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p>Paragraph</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph -->
                    <p>Read More</p>
                    <!-- /wp:paragraph -->
                </div>
        <!-- /wp:group -->',
);
