<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function nominee_vc_template_home_landing1( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Landing One', 'nominee');
	$template[ 'custom_class' ] = 'nominee_vc_template_home_landing1';

	ob_start();
	?>[vc_row full_height="yes" columns_placement="top" overlay_color="yes" overlay_color_opt="blue-overlay-two" css=".vc_custom_1569847393487{margin-top: -100px !important;background-image: url(http://trendytheme.net/demo2/wp/nominee/wp-content/uploads/2015/12/statu_politicale.jpg?id=3210) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column][vc_single_image image="2886" img_size="full" css=".vc_custom_1569827122221{margin-bottom: 0px !important;padding-top: 30px !important;}"][vc_row_inner css=".vc_custom_1569397677166{padding-top: 120px !important;padding-bottom: 150px !important;}"][vc_column_inner width="1/2" offset="vc_col-md-8"][tt_landing_section_content title_intro="Let’s Stand Together" title="We Will Make History Together" link="url:http%3A%2F%2Ftrendytheme.net%2Fdemo2%2Fwp%2Fnominee%2F|title:Home||"]In our country, there are several political parties that stand for the election. The presence of the political party is actually a healthy situation for the nation. It gives people a choice to make a more evolved and effective decision. So, this is the basic backdrop of political parties. But what is a political party? Why do we need a political party? Let’s find out.[/tt_landing_section_content][/vc_column_inner][vc_column_inner width="1/2" offset="vc_col-md-4"][tt_donation_form_charitable post_source="3747" form_layout="portrait-form" custom_content="custom-content-allow" title="Trust us, Together We Can Create" css=".vc_custom_1569848265132{margin-top: 50px !important;}"]Appropriately develop innovative services for market positioning niches.[/tt_donation_form_charitable][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'nominee_vc_template_home_landing1' );