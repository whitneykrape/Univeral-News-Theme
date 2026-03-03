/* Should just be article space, no wrapper. Not sure what the section content is for in Ghost. */



<div class="element__animated-wipeleft">
    {% for image in images %}
        <img src="{{ image.url }}" alt="{{ image.title }}">
    {% endfor %}
</div>







<?php

?>
<!-- wp:group {"layout":{"type":"constrained"}} -->
    <div class="element__animated-wipeleft">
        <!-- wp:image -->
        <figure class="wp-block-image"><img alt=""/></figure>
        <!-- /wp:image -->
    </div>
<!-- /wp:group -->'
