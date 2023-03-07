
<?php
return array(
    'title'      => __( 'Image Feature Short 01', 'slim-2022' ),
    'categories' => array( 'slim' ),
    'content'    => '<!-- wp:block-article/article-block {"mediaID":21,"imagelink":"http://ff-pitin.local/_becauseyouhaveto"} -->
    <article class="wp-block-block-article-article-block">
        <a class="wp-block-image article-image imagelink" href="http://ff-pitin.local/_becauseyouhaveto" target="_blank" rel="noopener noreferrer"><img src="http://FF-PITIN.local/_becauseyouhaveto/sparewordpress/wp-content/uploads/2022/01/placeholder.jpg" alt=""/></a>
        <div class="article-text-block">
            <h3 class="article-title">test</h3>
            <span class="image-marker image-marker-date">2022-01-12T09:45:00</span>
            <p class="article-description">description</p><p class="article-read-more"></p>
        </div>
    </article>
    <!-- /wp:block-article/article-block -->',
);
    {{#if feature_image}}
    <a class="post-card-image-link" href="{{url}}">
        {{!-- This is a responsive image, it loads different sizes depending on device
        https:
        <img class="post-card-image"
            srcset="{{img_url_feature_image_small}} 300w,
                    {{img_url_feature_image_medium}} 600w,
                    {{img_url_feature_image_large}} 1000w,
                    {{img_url_feature_image_extralarge}} 2000w"
            sizes="(max-width: 1000px) 400px, 700px"
            src="{{img_url_feature_image_medium}}"
            alt="{{title}}"
        />
    </a>
    {{/if}}
    {{#if feature_image}}
        /* preview-start */
        <p>{{excerpt_short}}</p>
    {{else}}
        <p>{{excerpt_long}}</p>
    {{/if}}
    /* preview-start */
    <time datetime="{{date}}">{{date}}</time>
    <p class="">Read more →</p>
</article>
*/
