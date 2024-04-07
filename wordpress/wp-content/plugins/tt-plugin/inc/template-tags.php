<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;



// hide vc admin notic
function tt_hide_vc_admin_notice() {
    if(is_admin()) :
        setcookie('vchideactivationmsg', '1', strtotime('+3 years'), '/');
        setcookie('vchideactivationmsg_vc11', (defined('WPB_VC_VERSION') ? WPB_VC_VERSION : '1'), strtotime('+3 years'), '/');
    endif;
}
add_action('admin_init', 'tt_hide_vc_admin_notice');


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Redux News Flash Remove 
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! class_exists( 'reduxNewsflash' ) ):
    class reduxNewsflash {
        public function __construct( $parent, $params ) {

        }
    }
endif;

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Redux Ads Remove
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

add_filter( 'redux/' . 'nominee_theme_option' . '/aURL_filter', '__return_empty_string' );


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Remove demo mode active/deactive option
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
function nominee_remove_redux_demo_mode() { // Be sure to rename this function to something more unique
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}
add_action('init', 'nominee_remove_redux_demo_mode');



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Remove Query Strings From Static Resources
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if( ! function_exists( 'nominee_remove_query_strings_1' )){
    function nominee_remove_query_strings_1( $src ){
        $parts = explode( '?ver', $src );
        return $parts[0];
    }
}

if( ! function_exists( 'nominee_remove_query_strings_2' )){
    function nominee_remove_query_strings_2( $src ){
        $parts = explode( '&ver', $src );
        return $parts[0];
    }
}




//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// add charitable extra field
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if(class_exists('Charitable_Donation_Field')){
    function nominee_charitable_employer_field() {
        /**
         * Define a new employer field.
         */
        $field = new Charitable_Donation_Field( 'nominee_employer', array(
            'label' => esc_html__( 'Employer', 'tt-pl-textdomain' ),
            'data_type' => 'user',
            'donation_form' => array(
                'show_after' => 'email',
                'required'   => false,
            ),
            'admin_form' => true,
            'show_in_meta' => true,
            'show_in_export' => true,
            'email_tag' => array(
                'description' => esc_html__( 'Employer title' , 'tt-pl-textdomain' ),
            ),
        ) );
        /**
         * Register the field.
         */
        charitable()->donation_fields()->register_field( $field );


        /**
         * Define a new occupation field.
         */
        $field = new Charitable_Donation_Field( 'nominee_occupation', array(
            'label' => esc_html__( 'Occupation', 'tt-pl-textdomain' ),
            'data_type' => 'user',
            'donation_form' => array(
                'show_after' => 'email',
                'required'   => false,
            ),
            'admin_form' => true,
            'show_in_meta' => true,
            'show_in_export' => true,
            'email_tag' => array(
                'description' => esc_html__( 'Donor Occupation' , 'tt-pl-textdomain' ),
            ),
        ) );
        /**
         * Register the field.
         */
        charitable()->donation_fields()->register_field( $field );
    }
    add_action( 'init', 'nominee_charitable_employer_field' );
}