








<?php
/**
 * Title: Block Featured Article Single Wide
 * Slug: blocksslim/block-featured-articlesinglewide
 * Categories: slim
 * Block Types: template/template-part/content
 */
?>
<!-- wp:query {"queryId":11,"query":{"perPage":"1","pages":"1","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"displayLayout":{"type":"list","columns":2}} -->
<div class="wp-block-query">
    <!-- wp:post-template -->
        <!-- wp:post-featured-image {"isLink":true,"className":"block\u002d\u002darticle__image"} /-->

        <!-- wp:group {"className":"block\u002d\u002darticle__text","layout":{"type":"constrained"}} -->
        <div class="wp-block-group block--article__text">
            <!-- wp:post-title {"isLink":true} /-->

            <!-- wp:post-date /-->

            <!-- wp:post-excerpt {"moreText":"Link Out","className":"article-description"} /-->
        </div>
        <!-- /wp:group -->
    <!-- /wp:post-template -->
</div>
<!-- /wp:query -->
