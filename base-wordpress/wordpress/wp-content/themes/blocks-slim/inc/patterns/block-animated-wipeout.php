
<div class="animated wipeout">
    {% for image in images %}
        <img src="{{ image.url }}" alt="{{ image.title }}">
    {% endfor %}
</div>
<?php
return array(
    'title'      => __( 'Block Animated Wipeout', 'blocksslim' ),
    'categories' => array( 'slim' ),
    'content'    => '<!-- wp:group {"layout":{"type":"constrained"}} -->
                <div class="wp-block-group animated wipeout">
                    <!-- wp:image -->
                    <figure class="wp-block-image"><img alt=""/></figure>
                    <!-- /wp:image -->
                </div>
        <!-- /wp:group -->',
);
