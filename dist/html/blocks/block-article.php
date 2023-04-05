
<article class="article article-sm sm">
  <a href="{{ entry.url }}" class="">
    <h2 class="">{{ entry.blogTitle }}</h2>
    {% for image in images %}
        <img src="{{ image.url }}" alt="{{ image.title }}">
    {% endfor %}
    <p>{{ entry.excerpt }}</p>
    <p class="">{{!-- entry.postDate|datetime('D, M j, Y') --}}</p>
    <p class="">Read more →</p>
  </a>
</article>
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
