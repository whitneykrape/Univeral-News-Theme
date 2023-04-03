
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
