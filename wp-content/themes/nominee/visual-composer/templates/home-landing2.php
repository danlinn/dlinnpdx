<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function nominee_vc_template_home_landing2( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Landing Two', 'nominee');
	$template[ 'custom_class' ] = 'nominee_vc_template_home_landing2';

	ob_start();
	?>[vc_row full_height="yes" columns_placement="top" overlay_color="yes" overlay_color_opt="custom-color" css=".vc_custom_1569848959349{margin-top: -100px !important;padding-bottom: 100px !important;background: #353535 url(http://trendytheme.net/demo2/wp/nominee/wp-content/uploads/2019/09/landing-bg.jpg?id=3754) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" custom_overlay_color="rgba(10,10,10,0.25)"][vc_column][vc_single_image image="2886" img_size="full" css=".vc_custom_1569842652092{margin-bottom: 0px !important;padding-top: 30px !important;}"][vc_row_inner css=".vc_custom_1569393858792{margin-bottom: 45px !important;}"][vc_column_inner css=".vc_custom_1569849117732{padding-top: 80px !important;}" offset="vc_col-md-7"][tt_landing_section_content enable_subtitle="disable" title="We Will Make History Together" title_font_size="38px" link="url:http%3A%2F%2Ftrendytheme.net%2Fdemo2%2Fwp%2Fnominee%2F|title:Home||"]In our country, there are several political parties that stand for the election. The presence of the political party is actually a healthy situation for the nation. It gives people a choice to make a more evolved and effective decision. So, this is the basic backdrop of political parties. But what is a political party? Why do we need a political party? Let’s find out.[/tt_landing_section_content][/vc_column_inner][vc_column_inner offset="vc_col-md-5"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/2" offset="vc_col-md-4"][tt_donation_form_charitable post_source="3747" form_layout="portrait-form" custom_content="custom-content-allow" title="Together We Can Create!"][/tt_donation_form_charitable][/vc_column_inner][vc_column_inner width="1/2" offset="vc_col-md-8"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'nominee_vc_template_home_landing2' );