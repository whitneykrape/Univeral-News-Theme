
<?php
return array(
    'title'      => __( 'Image Feature Short 01', 'slim-2022' ),
    'categories' => array( 'slim' ),
    'content'    => '
<article> Start here.
<!-- wp:cover {"url":"image","id":4432,"dimRatio":30,"isDark":false,"className":"block__image-feature-short-01"} -->
<div class="wp-block-cover is-light block__image-feature-short-01"><span aria-hidden="true" class="has-background-dim-30 wp-block-cover__gradient-background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-4432" alt="" src="image" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3,"textColor":"background"} -->
<h3 class="has-background-color has-text-color">South Shore Wine Company</h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"textColor":"background"} -->
<p class="has-background-color has-text-color">Brand description with a bunch of extra text.</p>
<!-- /wp:paragraph -->
<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"gold","textColor":"foreground","style":{"spacing":{"padding":{"top":"5px","bottom":"5px","left":"15px","right":"15px"}}},"className":"is-style-fill"} -->
<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-foreground-color has-gold-background-color has-text-color has-background" style="padding-top:5px;padding-right:15px;padding-bottom:5px;padding-left:15px">LEARN MORE</a></div>
<!-- /wp:button -->
<!-- wp:button {"backgroundColor":"gold","textColor":"foreground","style":{"spacing":{"padding":{"top":"5px","bottom":"5px","left":"15px","right":"15px"}}},"className":"is-style-fill"} -->
<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-foreground-color has-gold-background-color has-text-color has-background" style="padding-top:5px;padding-right:15px;padding-bottom:5px;padding-left:15px">SHOP</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column"></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:cover -->',
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
            srcset="{{img_url feature_image size="s"}} 300w,
                    {{img_url feature_image size="m"}} 600w,
                    {{img_url feature_image size="l"}} 1000w,
                    {{img_url feature_image size="xl"}} 2000w"
            sizes="(max-width: 1000px) 400px, 700px"
            src="{{img_url feature_image size="m"}}"
            alt="{{title}}"
        />
    </a>
    {{/if}}
    {{#if feature_image}}
        /* preview-start */
        <p>{{excerpt_short}}</p>
        <p>{{excerpt words="44"}}</p>
    {{else}}
        <p>{{excerpt_long}}</p>
        <p>{{excerpt words="30"}}</p>
    {{/if}}
    /* preview-start */
    <time datetime="{{date}}">{{date}}</time>
    <time datetime="{{date format="YYYY-MM-DD"}}">{{date format="D MMM YYYY"}}</time>
    <p class="">Read more →</p>
</article>
*/
