<?php
return array(
    'title'      => __( 'Block Moving Preview', 'blocksslim' ),
    'categories' => array( 'slim' ),
    'content'    => '<!-- wp:query {"queryId":14,"query":{"perPage":"1","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[]},"displayLayout":{"type":"list"},"align":"wide","layout":{"inherit":true}} -->
        <div class="wp-block-query alignwide"><!-- wp:post-template {"align":"wide"} -->
            <!-- wp:group {"layout":{"inherit":true,"type":"constrained"}} -->
            <div class="wp-block-group"><!-- wp:post-title {"isLink":true,"align":"wide","fontSize":"var(\u002d\u002dwp\u002d\u002dcustom\u002d\u002dtypography\u002d\u002dfont-size\u002d\u002dhuge, clamp(2.25rem, 4vw, 2.75rem))"} /-->

            <!-- wp:post-featured-image {"isLink":true,"align":"wide","style":{"spacing":{"margin":{"top":"calc(1.75 * var(\u002d\u002dwp\u002d\u002dstyle\u002d\u002dblock-gap))"}}}} /-->

            <!-- wp:columns {"align":"wide"} -->
            <div class="wp-block-columns alignwide"><!-- wp:column {"width":"650px"} -->
            <div class="wp-block-column" style="flex-basis:650px"><!-- wp:post-excerpt /-->

            <!-- wp:post-date {"format":"F j, Y","isLink":true,"style":{"typography":{"fontStyle":"italic","fontWeight":"400"}},"fontSize":"small"} /--></div>
            <!-- /wp:column -->

            <!-- wp:column {"width":""} -->
            <div class="wp-block-column"></div>
            <!-- /wp:column --></div>
            <!-- /wp:columns -->

            <!-- wp:spacer {"height":"16px"} -->
            <div style="height:16px" aria-hidden="true" class="wp-block-spacer"></div>
            <!-- /wp:spacer -->

            <!-- wp:separator {"opacity":"css","className":"alignwide is-style-wide"} -->
            <hr class="wp-block-separator has-css-opacity alignwide is-style-wide"/>
            <!-- /wp:separator -->

            <!-- wp:spacer {"height":"16px"} -->
            <div style="height:16px" aria-hidden="true" class="wp-block-spacer"></div>
            <!-- /wp:spacer --></div>
            <!-- /wp:group -->
            <!-- /wp:post-template -->

        </div>
        <!-- /wp:query -->',
);
