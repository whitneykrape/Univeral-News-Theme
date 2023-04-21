
<div class="element__animated-wipeleft">
    {% for image in images %}
        <img src="{{ image.url }}" alt="{{ image.title }}">
    {% endfor %}
</div>
<?php
return array(
    'title'      => __( 'Block Animated Wipeout', 'blocksslim' ),
    'categories' => array( 'slim' ),
    'content'    => '<!-- wp:group {"layout":{"type":"constrained"}} -->
                <div class="element__animated-wipeleft">
                    <!-- wp:image -->
                    <figure class="wp-block-image"><img alt=""/></figure>
                    <!-- /wp:image -->
                </div>
        <!-- /wp:group -->',
);
