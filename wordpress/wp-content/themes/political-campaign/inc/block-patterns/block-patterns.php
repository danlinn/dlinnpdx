<?php
/**
 * Political Campaign: Block Patterns
 *
 * @package Political Campaign
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'political-campaign',
		array( 'label' => __( 'Political Campaign', 'political-campaign' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'political-campaign/banner-section',
		array(
			'title'      => __( 'Banner Section', 'political-campaign' ),
			'categories' => array( 'political-campaign' ),
			'content'    => "<!-- wp:cover {\"url\":\"". esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner.png\",\"id\":445,\"dimRatio\":50,\"minHeight\":600,\"align\":\"full\",\"className\":\"political-campaign-banner-section\"} -->\n<div class=\"wp-block-cover alignfull political-campaign-banner-section\" style=\"min-height:600px\"><span aria-hidden=\"true\" class=\"wp-block-cover__background has-background-dim\"></span><img class=\"wp-block-cover__image-background wp-image-445\" alt=\"\" src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner.png\" data-object-fit=\"cover\"/><div class=\"wp-block-cover__inner-container\"><!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"600px\",\"className\":\"political-campaign-column-1 ms-5 col-md-8\"} -->\n<div class=\"wp-block-column political-campaign-column-1 ms-5 col-md-8\" style=\"flex-basis:600px\"><!-- wp:heading {\"level\":1} -->\n<h1>Creating A Country For Every Citizen</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"className\":\"banner-section-button\"} -->\n<div class=\"wp-block-button banner-section-button\"><a class=\"wp-block-button__link wp-element-button\">SEE MORE DETAILS</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);

	register_block_pattern(
		'political-campaign/campaign-priciples-section',
		array(
			'title'      => __( 'Campaign Priciples Section', 'political-campaign' ),
			'categories' => array( 'political-campaign' ),
			'content'    => "<!-- wp:group {\"className\":\"political-campaign-campaign-principles   py-5\",\"layout\":{\"type\":\"constrained\"}} -->\n<div class=\"wp-block-group political-campaign-campaign-principles py-5\"><!-- wp:paragraph {\"align\":\"center\",\"style\":{\"color\":{\"text\":\"#e22b25\"}}} -->\n<p class=\"has-text-align-center has-text-color\" style=\"color:#e22b25\">Policy Positions</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"className\":\"mb-5\"} -->\n<h2 class=\"has-text-align-center mb-5\">Campaign Principles</h2>\n<!-- /wp:heading -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"className\":\"political-campaign-campaign-principles-colimg col-md-4\"} -->\n<div class=\"wp-block-column political-campaign-campaign-principles-colimg col-md-4\"><!-- wp:image {\"id\":471,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-full\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/campaign-image.png\" alt=\"\" class=\"wp-image-471\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"level\":3} -->\n<h3>Environment</h3>\n<!-- /wp:heading --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"political-campaign-campaign-principles-colimg col-md-4\"} -->\n<div class=\"wp-block-column political-campaign-campaign-principles-colimg col-md-4\"><!-- wp:image {\"id\":437,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-full\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/campaign-image1.png\" alt=\"\" class=\"wp-image-437\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"level\":3} -->\n<h3>Healthcare</h3>\n<!-- /wp:heading --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"political-campaign-campaign-principles-colimg col-md-4\"} -->\n<div class=\"wp-block-column political-campaign-campaign-principles-colimg col-md-4\"><!-- wp:image {\"id\":447,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-full\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/campaign-image2.png\" alt=\"\" class=\"wp-image-447\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"level\":3} -->\n<h3>Tax Returns</h3>\n<!-- /wp:heading --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"political-campaign-campaign-principles-colimg col-md-4\"} -->\n<div class=\"wp-block-column political-campaign-campaign-principles-colimg col-md-4\"><!-- wp:image {\"id\":439,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-full\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/campaign-image3.png\" alt=\"\" class=\"wp-image-439\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"level\":3} -->\n<h3>Economy</h3>\n<!-- /wp:heading --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"political-campaign-campaign-principles-colimg col-md-4\"} -->\n<div class=\"wp-block-column political-campaign-campaign-principles-colimg col-md-4\"><!-- wp:image {\"id\":440,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-full\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/campaign-image4.png\" alt=\"\" class=\"wp-image-440\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"level\":3} -->\n<h3>Educations</h3>\n<!-- /wp:heading --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:group -->",
		)
	);
}