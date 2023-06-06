export default function FrontendArticleBlock(props) {
	return (
		<article { ...blockProps }>
			<a
				className="wp-block-image article-image imagelink"
				href={ imagelink }
				target="_blank"
				rel="noopener noreferrer"
			>
				{ mediaURL && <img src={ mediaURL } alt="" /> }
			</a>
			<div className="article-text-block">
				<RichText.Content
					tagName="h3"
					className="article-title"
					value={ title }
				/>
				<RichText.Content
					tagName="span"
					className="image-marker image-marker-date"
					value={ date }
				/>
				<RichText.Content
					tagName="p"
					className="article-description"
					value={ description }
				/>
				<RichText.Content tagName="p" className="article-read-more">
					<RichText.Content
						tagName="span"
						className="btn-sm article-link"
						value={ link }
					/>
				</RichText.Content>
			</div>
		</article>
	)
}