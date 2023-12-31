<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;


// VC Custom shortcode dir
if (! function_exists('nominee_shortcodes_template_dir')) :
	function nominee_shortcodes_template_dir(){
		vc_set_shortcodes_templates_dir( get_template_directory() . '/visual-composer/shortcodes' );
	}
	nominee_shortcodes_template_dir();
endif;


// VC Admin element stylesheet
if ( ! function_exists( 'nominee_vc_admin_styles' ) ) :
	function nominee_vc_admin_styles() {
		wp_enqueue_style( 'nominee_vc_admin_style', get_template_directory_uri() . '/visual-composer/assets/css/vc-element-style.css', array(), '1.0', 'all' );
	}
	add_action( 'admin_enqueue_scripts', 'nominee_vc_admin_styles' );
endif;

// VC set default editor post type
$posttype_list = array(
    'page',
    'tt-event'
);
vc_set_default_editor_post_types( $posttype_list );


// Remove vc default template
if ( ! function_exists( 'nominee_remove_default_templates' ) ) :
	function nominee_remove_default_templates( $data ) {
		return array(); 
	}
	add_filter( 'vc_load_default_templates', 'nominee_remove_default_templates' );
endif;

// include custom template
include_once(get_template_directory() . '/visual-composer/templates/home-one.php');
include_once(get_template_directory() . '/visual-composer/templates/home-two.php');
include_once(get_template_directory() . '/visual-composer/templates/home-onepage.php');
include_once(get_template_directory() . '/visual-composer/templates/ability-section.php');
include_once(get_template_directory() . '/visual-composer/templates/about-section.php');
include_once(get_template_directory() . '/visual-composer/templates/address-section.php');
include_once(get_template_directory() . '/visual-composer/templates/archivement-section.php');
include_once(get_template_directory() . '/visual-composer/templates/campaign-section.php');
include_once(get_template_directory() . '/visual-composer/templates/contact-section.php');
include_once(get_template_directory() . '/visual-composer/templates/counting-section.php');
include_once(get_template_directory() . '/visual-composer/templates/donation-section.php');
include_once(get_template_directory() . '/visual-composer/templates/event-single-page.php');
include_once(get_template_directory() . '/visual-composer/templates/header-text-rotator.php');
include_once(get_template_directory() . '/visual-composer/templates/header-image-background.php');
include_once(get_template_directory() . '/visual-composer/templates/header-slider.php');
include_once(get_template_directory() . '/visual-composer/templates/header-parallax.php');
include_once(get_template_directory() . '/visual-composer/templates/header-video-background.php');
include_once(get_template_directory() . '/visual-composer/templates/mission-section.php');
include_once(get_template_directory() . '/visual-composer/templates/newsletter-section.php');
include_once(get_template_directory() . '/visual-composer/templates/press-section.php');
include_once(get_template_directory() . '/visual-composer/templates/reformation-section.php');
include_once(get_template_directory() . '/visual-composer/templates/reformation-page.php');
include_once(get_template_directory() . '/visual-composer/templates/spotlight-section.php');
include_once(get_template_directory() . '/visual-composer/templates/story-section.php');
include_once(get_template_directory() . '/visual-composer/templates/team-section.php');
include_once(get_template_directory() . '/visual-composer/templates/testimonial-section.php');
include_once(get_template_directory() . '/visual-composer/templates/twitter-section.php');
include_once(get_template_directory() . '/visual-composer/templates/volunteer-section.php');
include_once(get_template_directory() . '/visual-composer/templates/biography.php');
include_once(get_template_directory() . '/visual-composer/templates/donate-page.php');
include_once(get_template_directory() . '/visual-composer/templates/manifesto-page.php');
include_once(get_template_directory() . '/visual-composer/templates/volunteer-page.php');
include_once(get_template_directory() . '/visual-composer/templates/about-page.php');
include_once(get_template_directory() . '/visual-composer/templates/home-candidate.php');
include_once(get_template_directory() . '/visual-composer/templates/home-mayor.php');
include_once(get_template_directory() . '/visual-composer/templates/home-landing1.php');
include_once(get_template_directory() . '/visual-composer/templates/home-landing2.php');
include_once(get_template_directory() . '/visual-composer/templates/home-leader.php');

// include vc extend file
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-home-banner.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-hero-banner.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-home-slider.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-text-rotator.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-section-title.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-spotlight-block.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-testimonial.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-count-up.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-fund-raise-count.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-icon-block.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-issues.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-intro.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-sponsors.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-double-img.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-story.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-archivement.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-twitter-feed.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-twitter-feed-spokesman.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-reformation.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-landing-section-content.php');


include_once(get_template_directory() . '/visual-composer/vc_extend/tt-latest-posts.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-client-carousel.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-newsletter.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-donation-modal.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-donation-form.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-donation-form-charitable.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-featured-event.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-event-schedule.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-upcoming-event.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-event-speaker.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-google-map.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-social-links.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-popup.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-post-category.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-post-category-pagination.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-gallery.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-biography.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-biography-two.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-donation-short-form.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-featured-event-video.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-countdown.php');
include_once(get_template_directory() . '/visual-composer/vc_extend/tt-carousels.php');

if (class_exists('Social_Count_Plus')) :
    include_once(get_template_directory() . '/visual-composer/vc_extend/tt-social-count-plus.php');
endif;

// include custom param
include_once(get_template_directory() . '/visual-composer/params/vc_custom_params.php');

// include others file
include_once(get_template_directory() . '/visual-composer/inc/flaticon-array-list.php');

if (! function_exists('nominee_member_vc_addon')) {
	function nominee_member_vc_addon(){
		include_once(get_template_directory() . '/visual-composer/vc_extend/tt-member.php');
		include_once(get_template_directory() . '/visual-composer/vc_extend/tt-member-carousel.php');
		include_once(get_template_directory() . '/visual-composer/vc_extend/tt-donation-list.php');
	}
}
add_action('init', 'nominee_member_vc_addon', 999);


// register flat icon type
function vc_iconpicker_editor_flaticon_jscss() {
    wp_enqueue_style( 'flaticon' );
}
add_action( 'vc_backend_editor_enqueue_js_css', 'vc_iconpicker_editor_flaticon_jscss' );
add_action( 'vc_frontend_editor_enqueue_js_css', 'vc_iconpicker_editor_flaticon_jscss' );


function vc_iconpicker_type_flaticon( $icons ) {
    $tt_flaticon_array = array(
		array('flaticon-add188'=>'add188'),
		array('flaticon-address20'=>'address20'),
		array('flaticon-alarm51'=>'alarm51'),
		array('flaticon-award48'=>'award48'),
		array('flaticon-award49'=>'award49'),
		array('flaticon-award50'=>'award50'),
		array('flaticon-award51'=>'award51'),
		array('flaticon-baguette'=>'baguette'),
		array('flaticon-basic3'=>'basic3'),
		array('flaticon-basic4'=>'basic4'),
		array('flaticon-basic5'=>'basic5'),
		array('flaticon-basic6'=>'basic6'),
		array('flaticon-basic7'=>'basic7'),
		array('flaticon-basic8'=>'basic8'),
		array('flaticon-basic9'=>'basic9'),
		array('flaticon-basic10'=>'basic10'),
		array('flaticon-basic12'=>'basic12'),
		array('flaticon-basic13'=>'basic13'),
		array('flaticon-battery150'=>'battery150'),
		array('flaticon-bicycle18'=>'bicycle18'),
		array('flaticon-big107'=>'big107'),
		array('flaticon-big108'=>'big108'),
		array('flaticon-bitten3'=>'bitten3'),
		array('flaticon-blank35'=>'blank35'),
		array('flaticon-blank36'=>'blank36'),
		array('flaticon-blank37'=>'blank37'),
		array('flaticon-boot3'=>'boot3'),
		array('flaticon-briefcase52'=>'briefcase52'),
		array('flaticon-broken46'=>'broken46'),
		array('flaticon-businessman20'=>'businessman20'),
		array('flaticon-calendar160'=>'calendar160'),
		array('flaticon-camera82'=>'camera82'),
		array('flaticon-cell13'=>'cell13'),
		array('flaticon-champagne5'=>'champagne5'),
		array('flaticon-charged1'=>'charged1'),
		array('flaticon-check54'=>'check54'),
		array('flaticon-check55'=>'check55'),
		array('flaticon-chef29'=>'chef29'),
		array('flaticon-cocktail30'=>'cocktail30'),
		array('flaticon-coffee68'=>'coffee68'),
		array('flaticon-connection22'=>'connection22'),
		array('flaticon-credit103'=>'credit103'),
		array('flaticon-crop16'=>'crop16'),
		array('flaticon-cross101'=>'cross101'),
		array('flaticon-delete84'=>'delete84'),
		array('flaticon-digital23'=>'digital23'),
		array('flaticon-download167'=>'download167'),
		array('flaticon-drawing14'=>'drawing14'),
		array('flaticon-earth206'=>'earth206'),
		array('flaticon-earth207'=>'earth207'),
		array('flaticon-edit46'=>'edit46'),
		array('flaticon-eighth2'=>'eighth2'),
		array('flaticon-electric55'=>'electric55'),
		array('flaticon-electric56'=>'electric56'),
		array('flaticon-email108'=>'email108'),
		array('flaticon-empty39'=>'empty39'),
		array('flaticon-exit15'=>'exit15'),
		array('flaticon-exit16'=>'exit16'),
		array('flaticon-expand40'=>'expand40'),
		array('flaticon-expand41'=>'expand41'),
		array('flaticon-extract1'=>'extract1'),
		array('flaticon-eye105'=>'eye105'),
		array('flaticon-fast47'=>'fast47'),
		array('flaticon-female239'=>'female239'),
		array('flaticon-file97'=>'file97'),
		array('flaticon-flashlight7'=>'flashlight7'),
		array('flaticon-floppy20'=>'floppy20'),
		array('flaticon-folded33'=>'folded33'),
		array('flaticon-folding2'=>'folding2'),
		array('flaticon-fried6'=>'fried6'),
		array('flaticon-front20'=>'front20'),
		array('flaticon-front21'=>'front21'),
		array('flaticon-gamepad5'=>'gamepad5'),
		array('flaticon-graduate37'=>'graduate37'),
		array('flaticon-halffilled2'=>'halffilled2'),
		array('flaticon-halloween319'=>'halloween319'),
		array('flaticon-hammer55'=>'hammer55'),
		array('flaticon-hand132'=>'hand132'),
		array('flaticon-hanging16'=>'hanging16'),
		array('flaticon-happy52'=>'happy52'),
		array('flaticon-headset13'=>'headset13'),
		array('flaticon-heart296'=>'heart296'),
		array('flaticon-high23'=>'high23'),
		array('flaticon-home151'=>'home151'),
		array('flaticon-home152'=>'home152'),
		array('flaticon-home166'=>'home166'),
		array('flaticon-house121'=>'house121'),
		array('flaticon-imac3'=>'imac3'),
		array('flaticon-keyring'=>'keyring'),
		array('flaticon-kitchen77'=>'kitchen77'),
		array('flaticon-landscape11'=>'landscape11'),
		array('flaticon-left220'=>'left220'),
		array('flaticon-left221'=>'left221'),
		array('flaticon-left222'=>'left222'),
		array('flaticon-left223'=>'left223'),
		array('flaticon-lemon9'=>'lemon9'),
		array('flaticon-letter92'=>'letter92'),
		array('flaticon-lifeline5'=>'lifeline5'),
		array('flaticon-lightning22'=>'lightning22'),
		array('flaticon-link62'=>'link62'),
		array('flaticon-list91'=>'list91'),
		array('flaticon-list92'=>'list92'),
		array('flaticon-location42'=>'location42'),
		array('flaticon-location43'=>'location43'),
		array('flaticon-locked60'=>'locked60'),
		array('flaticon-loop10'=>'loop10'),
		array('flaticon-magic21'=>'magic21'),
		array('flaticon-magnifying55'=>'magnifying55'),
		array('flaticon-male75'=>'male75'),
		array('flaticon-male241'=>'male241'),
		array('flaticon-man461'=>'man461'),
		array('flaticon-medal47'=>'medal47'),
		array('flaticon-megaphone14'=>'megaphone14'),
		array('flaticon-movie42'=>'movie42'),
		array('flaticon-music236'=>'music236'),
		array('flaticon-musical117'=>'musical117'),
		array('flaticon-new106'=>'new106'),
		array('flaticon-open209'=>'open209'),
		array('flaticon-open210'=>'open210'),
		array('flaticon-open211'=>'open211'),
		array('flaticon-pac1'=>'pac1'),
		array('flaticon-paint71'=>'paint71'),
		array('flaticon-paper135'=>'paper135'),
		array('flaticon-pause45'=>'pause45'),
		array('flaticon-pitcher9'=>'pitcher9'),
		array('flaticon-pizza16'=>'pizza16'),
		array('flaticon-play110'=>'play110'),
		array('flaticon-previous15'=>'previous15'),
		array('flaticon-price12'=>'price12'),
		array('flaticon-print44'=>'print44'),
		array('flaticon-prohibition23'=>'prohibition23'),
		array('flaticon-put'=>'put'),
		array('flaticon-quotation3'=>'quotation3'),
		array('flaticon-radio52'=>'radio52'),
		array('flaticon-raining3'=>'raining3'),
		array('flaticon-record10'=>'record10'),
		array('flaticon-refresh58'=>'refresh58'),
		array('flaticon-refresh59'=>'refresh59'),
		array('flaticon-refresh60'=>'refresh60'),
		array('flaticon-refresh61'=>'refresh61'),
		array('flaticon-return11'=>'return11'),
		array('flaticon-right246'=>'right246'),
		array('flaticon-road40'=>'road40'),
		array('flaticon-rocket73'=>'rocket73'),
		array('flaticon-round66'=>'round66'),
		array('flaticon-round67'=>'round67'),
		array('flaticon-round68'=>'round68'),
		array('flaticon-round69'=>'round69'),
		array('flaticon-round70'=>'round70'),
		array('flaticon-round71'=>'round71'),
		array('flaticon-round72'=>'round72'),
		array('flaticon-round73'=>'round73'),
		array('flaticon-round74'=>'round74'),
		array('flaticon-round76'=>'round76'),
		array('flaticon-rounded61'=>'rounded61'),
		array('flaticon-rounded62'=>'rounded62'),
		array('flaticon-sad65'=>'sad65'),
		array('flaticon-settings51'=>'settings51'),
		array('flaticon-share11'=>'share11'),
		array('flaticon-share41'=>'share41'),
		array('flaticon-shining4'=>'shining4'),
		array('flaticon-shopping238'=>'shopping238'),
		array('flaticon-shuffle25'=>'shuffle25'),
		array('flaticon-slide5'=>'slide5'),
		array('flaticon-small178'=>'small178'),
		array('flaticon-smartphone23'=>'smartphone23'),
		array('flaticon-spanner4'=>'spanner4'),
		array('flaticon-speech117'=>'speech117'),
		array('flaticon-speech118'=>'speech118'),
		array('flaticon-speech119'=>'speech119'),
		array('flaticon-speech120'=>'speech120'),
		array('flaticon-sport20'=>'sport20'),
		array('flaticon-sprig'=>'sprig'),
		array('flaticon-statistical'=>'statistical'),
		array('flaticon-stickingplaster'=>'stickingplaster'),
		array('flaticon-subwoofer'=>'subwoofer'),
		array('flaticon-switch31'=>'switch31'),
		array('flaticon-tablet96'=>'tablet96'),
		array('flaticon-tack1'=>'tack1'),
		array('flaticon-tack2'=>'tack2'),
		array('flaticon-telephone106'=>'telephone106'),
		array('flaticon-text150'=>'text150'),
		array('flaticon-thermometer54'=>'thermometer54'),
		array('flaticon-tick8'=>'tick8'),
		array('flaticon-top9'=>'top9'),
		array('flaticon-transgender'=>'transgender'),
		array('flaticon-tree109'=>'tree109'),
		array('flaticon-truck56'=>'truck56'),
		array('flaticon-two396'=>'two396'),
		array('flaticon-unfolded1'=>'unfolded1'),
		array('flaticon-unfolded2'=>'unfolded2'),
		array('flaticon-unlocked45'=>'unlocked45'),
		array('flaticon-up178'=>'up178'),
		array('flaticon-upload121'=>'upload121'),
		array('flaticon-user159'=>'user159'),
		array('flaticon-voice34'=>'voice34'),
		array('flaticon-volume52'=>'volume52'),
		array('flaticon-volume53'=>'volume53'),
		array('flaticon-wall24'=>'wall24'),
		array('flaticon-warning38'=>'warning38'),
		array('flaticon-web38'=>'web38'),
		array('flaticon-web39'=>'web39'),
		array('flaticon-white86'=>'white86'),
		array('flaticon-widescreen8'=>'widescreen8'),
		array('flaticon-wifi84'=>'wifi84'),
		array('flaticon-wine60'=>'wine60'),
		array('flaticon-wine61'=>'wine61'),
		array('flaticon-ying1'=>'ying1')
    );
    return array_merge( $icons, $tt_flaticon_array );
}
add_filter( 'vc_iconpicker-type-flaticon', 'vc_iconpicker_type_flaticon' );


function vc_iconpicker_base_register_flaticon_css(){
    wp_register_style( 'flaticon', get_template_directory_uri() . '/fonts/flaticon/flaticon.css', false, WPB_VC_VERSION, 'screen' );
}
add_action( 'vc_base_register_front_css', 'vc_iconpicker_base_register_flaticon_css' );
add_action( 'vc_base_register_admin_css', 'vc_iconpicker_base_register_flaticon_css' );


// posts lists for narrow data
if (!function_exists('nominee_post_data')) {
	function nominee_post_data($post_type){
	    $posts = get_posts(array(
	        'posts_per_page' 	=> -1,
	        'post_status'		=> 'publish',
	        'post_type' 		=> $post_type
	    ));
	    $result = array();
	    foreach ($posts as $post) {
	        $result[] = array(
	            'value' => $post->ID,
	            'label' => $post->post_title,
	        );
	    }
	    return $result;
	}
}


// posts lists for narrow data
function nominee_post_data($post_type){
    $posts = get_posts(array(
        'posts_per_page' 	=> -1,
        'post_status'		=> 'publish',
        'post_type' 		=> $post_type
    ));
    $result = array();
    foreach ($posts as $post) {
        $result[] = array(
            'value' => $post->ID,
            'label' => $post->post_title,
        );
    }
    return $result;
}



// get all posts category
function nominee_taxonomy_list($taxonomy){
	$categories = get_categories(array('hide_empty' => false, 'taxonomy' => $taxonomy));
	$lists = array();
	foreach($categories as $category) {
		$lists[] = array(
			'value' => $category->cat_ID,
			'label' => $category->name,
		);
	}
	return $lists;
}


// post cateogry lists for narrow data
function nominee_category_list(){
	$categories = get_categories(array('hide_empty' => false));
	$lists = array();
	foreach($categories as $category) {
		$lists[] = array(
			'value' => $category->cat_ID,
            'label' => $category->name,
		);
	}
	return $lists;
}


// post cateogry lists for narrow data by slug
if (!function_exists('nominee_category_slug')) {
	function nominee_category_slug($taxonomy){
		$categories = get_categories(array('hide_empty' => false, 'taxonomy' => $taxonomy));
		$lists = array();
		foreach($categories as $category) {
			$lists[] = array(
				'value' => $category->slug,
	            'label' => $category->name,
			);
		}
		return $lists;
	}
}


// post tags lists for narrow data
function nominee_tag_list(){
	$tags = get_tags(array('hide_empty' => false));
	$tag_list = array();
	foreach($tags as $tag) {
		$tag_list[] = array(
			'value' => $tag->slug,
			'label' => $tag->name,
		);
	}
	return $tag_list;
}



// Author lists for narrow data
function nominee_autor_list(){

	$args = array(
		'blog_id'      => $GLOBALS['blog_id'],
		'orderby'      => 'nicename'
	);
	$authors = get_users($args);
	$author_list = array();
	foreach($authors as $author) {
		$author_list[] = array(
			'value' => $author->ID,
			'label' => $author->user_nicename,
		);
	}
	return $author_list;
}