










<?php
/**
 * Title: Block Article Slim
 * Slug: blocksslim/block-article-slim
 * Categories: slim
 * Block Types: template/template-part/content
 */
?>
<!-- wp:query {"queryId":11,"query":{"perPage":"1","pages":"1","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"displayLayout":{"type":"list"}} -->
<div class="wp-block-query">
    <!-- wp:post-template {"className":"block\u002d\u002dfeatureposts"} -->
        <!-- wp:group {"className":"block\u002d\u002darticle","layout":{"type":"constrained"}} -->
        <div class="wp-block-group block--article">
            <!-- wp:post-featured-image {"isLink":true,"className":"block\u002d\u002darticle__image"} /-->

            <!-- wp:group {"className":"block\u002d\u002darticle__text","layout":{"type":"constrained"}} -->
                <div class="wp-block-group block--article__text">
                    <!-- wp:post-title {"isLink":true,"className":"block\u002d\u002darticle__text\u002d\u002dtitle"} /-->

                    <!-- wp:post-date {"className":"block\u002d\u002darticle__date"} /-->

                    <!-- wp:post-excerpt {"className":"article-description"} /-->
                </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    <!-- /wp:post-template -->
</div><!-- /wp:query -->
