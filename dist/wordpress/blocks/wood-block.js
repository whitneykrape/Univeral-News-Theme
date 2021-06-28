!function(e,t,a,i,l,n){var r=a.__,o=i.createElement,c=t.RichText,s=t.MediaUpload,m=(t.AlignmentToolbar,t.BlockControls,t.InspectorControls),d=wp.components.TextControl;e.registerBlockType("wooden-blocks/article-block",{title:r("Wooden Blocks: Article","wooden-blocks"),icon:"index-card",category:"layout",attributes:{title:{type:"array",source:"children",selector:".article-title"},date:{type:"array",source:"children",selector:".image-marker"},mediaID:{type:"number"},mediaURL:{type:"string",source:"attribute",selector:"img",attribute:"src"},description:{type:"array",source:"children",selector:".article-description"},link:{type:"array",source:"children",selector:".article-link"},imagelink:{type:"string"}},example:{attributes:{title:r("Article Title","wooden-blocks"),date:r("Article Date","wooden-blocks"),mediaURL:"",description:r("Article Description","wooden-blocks"),link:r("Article Link","wooden-blocks"),imagelink:r("Article Image Link","wooden-blocks")}},edit:function(e){function t(t){e.setAttributes({imagelink:t})}var i=e.attributes,n=function(t){return e.setAttributes({mediaURL:t.url,mediaID:t.id})};return[o(m,null,o(d,{label:"Image Link",help:"Link to Add to the Image Thumbnail",value:i.imagelink,onChange:t})),o("div",{className:e.className},o(c,{tagName:"h3",inline:!0,placeholder:a.__("Article Title","wooden-blocks"),value:i.title,onChange:function(t){e.setAttributes({title:t})},className:"article-title"}),o(c,{tagName:"span",inline:!1,placeholder:a.__("Article Date","wooden-blocks"),value:i.date,onChange:function(t){e.setAttributes({date:t})},className:"image-marker image-marker-date"}),o("div",{className:"article-image"},o(s,{onSelect:n,allowedTypes:"image",value:i.mediaID,render:function(e){return o(l.Flex,{className:i.mediaID?"image-button":"button button-large",onClick:e.open},i.mediaID?o("img",{src:i.mediaURL}):r("Upload Image","wooden-blocks"))}})),o(c,{tagName:"p",placeholder:a.__("Article Description","wooden-blocks"),value:i.description,onChange:function(t){e.setAttributes({description:t})},className:"article-description"}),o(c,{tagName:"span",inline:!1,placeholder:a.__("Article Link","wooden-blocks"),value:i.link,onChange:function(t){e.setAttributes({link:t})},className:"article-link"}))]},save:function(e){var t=e.attributes;return o("article",{className:e.className+" article article-sm"},t.mediaURL&&o("a",{className:"wp-block-image article-image imagelink",href:t.imagelink,target:"_blank",rel:"noopener noreferrer"},o(c.Content,{tagName:"span",className:"image-marker image-marker-date",value:t.date}),o("img",{src:t.mediaURL})),o(c.Content,{tagName:"h3",className:"article-title",value:t.title}),o(c.Content,{tagName:"p",className:"article-description",value:t.description}),o("p",{className:"article-read-more"},o(c.Content,{tagName:"span",className:"btn-sm article-link",value:t.link})))}})}(window.wp.blocks,window.wp.editor,window.wp.i18n,window.wp.element,window.wp.components,window._);