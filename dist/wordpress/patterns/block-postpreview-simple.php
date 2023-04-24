
/* wordpress-start */
<?php
/**
 * Title: Block Preview Post Simple
 * Slug: blocksslim/block-preview-postsimple
 * Categories: slim
 * Block Types: template/template-part/content
 */
?>
<div class="column col-{{columnwidth}}">
	<a href="single-post-simple/" class="">
		<img src="../../assets/img/{{post.image}}.jpg" alt="Placeholder"/>
	</a>

		<h2 class="">{{post.title}}</h2>
		<p class="">{{post.date}}</p>

		<p class="formattingtextbody">
			{{post.excerpt}}
		</p>
		
		<p class="">
			<a href="single-post-simple/" class="">
				Read more &#8594;
			</a>
		</p>
</div>
/* wordpress-end */