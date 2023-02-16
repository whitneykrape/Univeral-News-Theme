
<div class="container">
	<h2 class="">Latest stories</h2>
	<div class="latest-stories">
	    <ul class=" navigation-list">
			<li class="six columns">
				<a href="../single-post-simple/" class="">
					<img src="../assets/img/placeholder.jpg" alt="Placeholder"/>
					<h2 class="">New Post</h2>
					<p class="">Fri, May 29, 2020</p>
					<p class="formattingtextbody">
						Sample body text adding a bunch more text to work with so we can then add images left and right, insert quotes, bold, span, italise, and in general, work with the text. Would be good to figure out an average length of paragraphs for a good perspective on sizing.
					</p>
					<p class="">Read more →</p>
				</a>
			</li>
			<li class="six columns">
				<a href="../single-post-simple/" class="">
					<img src="../assets/img/placeholder.jpg" alt="Placeholder"/>
					<h2 class="">New Post</h2>
					<p class="">Fri, May 29, 2020</p>
					<p class="formattingtextbody">
						Sample body text adding a bunch more text to work with so we can then add images left and right, insert quotes, bold, span, italise, and in general, work with the text. Would be good to figure out an average length of paragraphs for a good perspective on sizing.
					</p>
					<p class="">Read more →</p>
				</a>
			</li>
	    </ul>
	    <br class="clear">
	  </div>
</div>
{# Create an entry query with the 'section' and 'limit' parameters #}
{% set myEntryQuery = craft.entries()
    .section('blog_posts')
    .limit(3) %}
{# Fetch the entries #}
{% set entries = myEntryQuery.all() %}
<div class="">
	<div class="container">
		<h2 class="">Latest stories</h2>
		<div class="latest-stories">
		  <ul class="navigation-list">
		  		{% for entry in entries %}
				{% set myAssetQuery = craft.assets()
				    .volume('defaultvolume')
				    .kind('image') %}
				{# Fetch the assets #}
				{% set images = myAssetQuery.all() %}
				<li class="twelve columns">
					<a href="{{ entry.url }}" class="">
				    {% for image in images %}
				        <img src="{{ image.url }}" alt="{{ image.title }}">
				    {% endfor %}
						<h2 class="">{{ entry.blogTitle }}</h2>
						<p class="">{{ entry.postDate|datetime('D, M j, Y') }}</p>
						<p class="">Read more →</p>
					</a>
				</li>
				{% endfor %}
		  </ul>
		</div>
	</div>
</div>
<div class="">
	<div class="container">
		<h2 class="">Latest stories</h2>
	    <div class="latest-stories">
	        <ul class=" navigation-list">
	            {{#foreach posts}}
	                <li class="six columns">
	                {{!-- The tag below includes the markup for each post - partials/post-card.hbs --}}
	                {{> "post-card"}}
	                </li>
	            {{/foreach}}
	        </ul>
	        <br class="clear"/>
	    </div>
	</div>
</div>
	<?php
	return array(
	    'title'      => __( 'Latest Stores Text Block', 'slim-2022' ),
	    'categories' => array( 'slim' ),
	    'content'    => '<!-- wp:query {"queryId":11,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"displayLayout":{"type":"list"},"align":"wide","layout":{"inherit":true}} -->
	    <div class="wp-block-query alignwide"><!-- wp:post-template {"align":"wide"} -->
	    <!-- wp:group {"layout":{"inherit":true,"type":"constrained"}} -->
		    <div class="wp-block-group">
		    	<!-- wp:post-title {"isLink":true,"align":"wide","fontSize":"var(\u002d\u002dwp\u002d\u002dcustom\u002d\u002dtypography\u002d\u002dfont-size\u002d\u002dhuge, clamp(2.25rem, 4vw, 2.75rem))"} /-->
		    	<!-- wp:post-featured-image {"isLink":true,"align":"wide","style":{"spacing":{"margin":{"top":"calc(1.75 * var(\u002d\u002dwp\u002d\u002dstyle\u002d\u002dblock-gap))"}}}} /-->
		    <!-- wp:columns {"align":"wide"} -->
			    <div class="wp-block-columns alignwide"><!-- wp:column {"width":"650px"} -->
			    <div class="wp-block-column" style="flex-basis:650px"><!-- wp:post-excerpt /-->
			    <!-- wp:post-date {"format":"F j, Y","isLink":true,"style":{"typography":{"fontStyle":"italic","fontWeight":"400"}},"fontSize":"small"} /--></div>
			    <!-- /wp:column -->
			    <!-- wp:column {"width":""} -->
			    	<div class="wp-block-column"></div>
			    <!-- /wp:column --></div>
		    <!-- /wp:columns -->
		    <!-- wp:spacer {"height":"16px"} -->
		    	<div style="height:16px" aria-hidden="true" class="wp-block-spacer"></div>
		    <!-- /wp:spacer -->
		    <!-- wp:separator {"opacity":"css","className":"alignwide is-style-wide"} -->
		    	<hr class="wp-block-separator has-css-opacity alignwide is-style-wide"/>
		    <!-- /wp:separator -->
		    <!-- wp:spacer {"height":"16px"} -->
		    <div style="height:16px" aria-hidden="true" class="wp-block-spacer"></div>
		    <!-- /wp:spacer --></div>
	    <!-- /wp:group -->
	    <!-- /wp:post-template -->
	    <!-- wp:query-pagination {"paginationArrow":"arrow","align":"wide","layout":{"type":"flex","justifyContent":"space-between"}} -->
		    <!-- wp:query-pagination-previous {"fontSize":"small"} /-->
		    	<!-- wp:query-pagination-numbers /-->
		    <!-- wp:query-pagination-next {"fontSize":"small"} /-->
	    <!-- /wp:query-pagination --></div>
	    <!-- /wp:query -->',
	    );
