/* wordpress-start */
/* This is a place where custom WP block as plugin makes sense. */
<article { ...blockProps }>
    <div className="article-text-block">
        <RichText.Content tagName="p" className="article-read-more">
            <RichText.Content
                tagName="span"
                className="btn-sm article-link"
                value={ link }
            />
        </RichText.Content>
    </div>
</article>
/* wordpress-end */