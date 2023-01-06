/* Should just be article space, no wrapper. Not sure what the section content is for in Ghost. */

<?php
/* wordpress-start */
/* Change to a block made in WordPress that can be loaded as a pattern. */
/* Not a block, a pattern. */

// WordPress CMS
<article class="article article-sm sm">
    <h2 class="">
        {{title}}
    </h2>

    /* Have a series of comments and sequence those commits in Gulp so it trips down to just what is needed for each use. (Combine more of these pieces and comment in line.) */
    
    {{#if feature_image}}
    <a class="post-card-image-link" href="{{url}}">
        {{!-- This is a responsive image, it loads different sizes depending on device
        https://medium.freecodecamp.org/a-guide-to-responsive-images-with-ready-to-use-templates-c400bd65c433 --}}
        <img class="post-card-image"

            /* preview-start */
            srcset="{{img_url_feature_image_small}} 300w,
                    {{img_url_feature_image_medium}} 600w,
                    {{img_url_feature_image_large}} 1000w,
                    {{img_url_feature_image_extralarge}} 2000w"
            sizes="(max-width: 1000px) 400px, 700px"
            src="{{img_url_feature_image_medium}}"
            /* preview-end */
            /* ghost-start */
            srcset="{{img_url feature_image size="s"}} 300w,
                    {{img_url feature_image size="m"}} 600w,
                    {{img_url feature_image size="l"}} 1000w,
                    {{img_url feature_image size="xl"}} 2000w"
            sizes="(max-width: 1000px) 400px, 700px"
            src="{{img_url feature_image size="m"}}"
            /* ghost-end */

            alt="{{title}}"
        />
    </a>
    {{/if}}

    {{#if feature_image}}
        /* preview-start */
        <p>{{excerpt_short}}</p>
        /* preview-end */
        /* ghost-start */
        <p>{{excerpt words="44"}}</p>
        /* ghost-end */
    {{else}}
        /* preview-start */
        <p>{{excerpt_long}}</p>
        /* preview-end */
        /* ghost-start */
        <p>{{excerpt words="30"}}</p>
        /* ghost-end */
    {{/if}}

    /* preview-start */
    <time datetime="{{date}}">{{date}}</time>
    /* preview-end */
    /* ghost-start */
    <time datetime="{{date format="YYYY-MM-DD"}}">{{date format="D MMM YYYY"}}</time>
    /* ghost-end */

    <p class="">Read more →</p>
</article>

/* wordpress-end */