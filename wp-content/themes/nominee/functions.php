<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// NOMINEE FUNCTIONS AND DEFINITIONS
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

    if ( ! defined( 'NOMINEE_THEME_NAME' ) ) {
        define( 'NOMINEE_THEME_NAME', wp_get_theme()->get( 'Name' ) );
    }
    

    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // admin-init, metabox, tt-navwalker, jetpack
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    require get_template_directory() . "/inc/tt-navwalker.php";
    require get_template_directory() . "/inc/tt-mobile-navwalker.php";

    if (!is_user_logged_in()) {
        require get_template_directory() . "/inc/login-register.php";
    }

    if (class_exists('Vc_Manager')) {
        require get_template_directory() . "/visual-composer/visual-composer.php";
    }

if (!function_exists('nominee_theme_setup')) :

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Sets up theme defaults and registers support for various WordPress features.
// Note that this function is hooked into the after_setup_theme hook, which
// runs before the init hook. The init hook is too late for some features, such
// as indicating support for post thumbnails.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

    function nominee_theme_setup(){
       
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // Make theme available for translation.
        // Translations can be filed in the /languages/ directory.
        // If you're building a theme based on nominee, use a find and replace
        // to change 'nominee' to the name of your theme in all the template files
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        load_theme_textdomain('nominee', get_template_directory() . '/languages');

        require get_template_directory() . "/admin/admin-init.php";
        require get_template_directory() . "/inc/metabox.php";

        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // Add default posts and comments RSS feed links to head.
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        add_theme_support('automatic-feed-links');


        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // Supporting title tag
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        add_theme_support('title-tag');


        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // WooCommerce support
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        add_theme_support('woocommerce');


        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // Gutenberg support
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        add_theme_support(
            'gutenberg',
            array('wide-images' => true)
        );

        add_theme_support( 'align-wide' );
        add_theme_support( 'responsive-embeds' );


        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // Enable support for Post Thumbnails on posts and pages.
        // See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-          
        add_theme_support('post-thumbnails');


        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // default post thumbnail size
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        set_post_thumbnail_size(1140);
        
        add_image_size('nominee-blog-thumbnail', 750, 350, true);
        add_image_size('nominee-grid-blog-thumbnail', 700, 485, true);
        add_image_size('nominee-carousel-post', 1140, 532, true);
        add_image_size('nominee-spotlight-long-thumbnail', 360, 400, true);
        add_image_size('nominee-testimonial-thumb', 80, 80, true);
        add_image_size('nominee-reformation-thumb', 650, 510, true);
        add_image_size('nominee-latest-press', 360, 230, true);
        add_image_size('nominee-client-logo', 170, 95);
        add_image_size('nominee-event-featured', 555, 400, true);
        add_image_size('nominee-event-featured-video', 555, 500, true);
        add_image_size('nominee-latest-featured-thumb', 550, 600, true);
        add_image_size('nominee-upcoming-event', 360, 254, true);
        add_image_size('nominee-single-event-thumb', 1920, 800, true);
        add_image_size('nominee-schedule-member', 150, 150, true);
        add_image_size('nominee-popular-post-thumb', 50, 50, true);
        add_image_size('nominee-latest-post-thumb', 70, 55, true);
        add_image_size('nominee-category-post-thumb', 98, 65, true);
        add_image_size('nominee-issue-thumbnail', 700, 535, true);
        add_image_size('nominee-member', 490, 560, array( 'center', 'center' ));
        add_image_size('nominee-gallery-thumb', 200, 150, array( 'center', 'center' ));


        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // This theme uses wp_nav_menu() in one locations.
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        register_nav_menus(array(
           'primary' => esc_html__('Primary Menu', 'nominee'),
           'menu-left' => esc_html__('Left Menu', 'nominee'),
           'menu-right' => esc_html__('Right Menu', 'nominee')
        ) );


        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // Switch default core markup for search form, comment form, and comments
        // to output valid HTML5.
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ));


        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // Enable support for Post Formats.
        // See: https://codex.wordpress.org/Post_Formats
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-           
        add_theme_support('post-formats', array('aside', 'status', 'image', 'audio', 'video', 'gallery', 'quote', 'link', 'chat' ));

    }

    add_action('after_setup_theme', 'nominee_theme_setup');

endif; // nominee_theme_setup



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Set the content width in pixels, based on the theme's design and stylesheet.
// Priority 0 to make it available to lower priority callbacks.
// @global int $content_width
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (!function_exists('nominee_content_width')) :
    function nominee_content_width() {
        $GLOBALS['content_width'] = apply_filters( 'nominee_content_width', 1140 );
    }
    add_action( 'after_setup_theme', 'nominee_content_width', 0 );
endif;
    

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Register widget area.
// @link https://codex.wordpress.org/Function_Reference/register_sidebar
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (!function_exists('nominee_widgets_init')) :

    function nominee_widgets_init() {

    	do_action('nominee_before_register_sidebar');

        register_sidebar( apply_filters( 'nominee_blog_sidebar', array(
            'name'          => esc_html__('Blog Sidebar', 'nominee'),
            'id'            => 'nominee-blog-sidebar',
            'description'   => esc_html__('Appears in the blog sidebar.', 'nominee'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )));

        register_sidebar( apply_filters( 'nominee_page_sidebar', array(
            'name'          => esc_html__('Page Sidebar Area', 'nominee'),
            'id'            => 'nominee-page-sidebar',
            'description'   => esc_html__('Appears in the Page sidebar.', 'nominee'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )));

        register_sidebar( apply_filters( 'nominee_donation_sidebar', array(
            'name'          => esc_html__('Donation Single Sidebar Area', 'nominee'),
            'id'            => 'nominee-donation-sidebar',
            'description'   => esc_html__('Appears in the donation single page sidebar.', 'nominee'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )));

        register_sidebar( apply_filters( 'nominee_offcanvas_sidebar', array(
            'name'          => esc_html__('Offcanvas Sidebar Area', 'nominee'),
            'id'            => 'nominee-offcanvas-sidebar',
            'description'   => esc_html__('Appears in the Offcanvas area.', 'nominee'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )));

        register_sidebar( apply_filters( 'nominee_issue_sidebar', array(
            'name'          => esc_html__('Issue Sidebar Area', 'nominee'),
            'id'            => 'nominee-issue-sidebar',
            'description'   => esc_html__('Appears in the Issues page sidebar.', 'nominee'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )));

        register_sidebar( apply_filters( 'nominee_footer_sidebar', array(
            'name'          => esc_html__('Footer Sidebar Area', 'nominee'),
            'id'            => 'nominee-footer-sidebar',
            'description'   => esc_html__('Appears in the footer', 'nominee'),
            'before_widget' => '<div id="%1$s" class="col-md-3 col-sm-6 widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )));

        if (class_exists('WooCommerce')) {
            register_sidebar( apply_filters( 'nominee_shop_sidebar', array(
                'name'          => esc_html__('Shop Sidebar Area', 'nominee'),
                'id'            => 'nominee-shop-sidebar',
                'description'   => esc_html__('Appears in the shop sidebar sidebar.', 'nominee'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )));
        }

        do_action('nominee_after_register_sidebar');
    }

    add_action('widgets_init', 'nominee_widgets_init');
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Load Google Font If Redux framework is not activated.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
function nominee_fonts_url() {
    $font_url = '';

    $open_sans = esc_html_x( 'on', 'Open Sans font: on or off', 'nominee' );
    $roboto_slab = esc_html_x( 'on', 'Roboto Slab font: on or off', 'nominee' );

    if ( 'off' !== $open_sans || 'off' !== $roboto_slab) {
        $font_families = array();

        if ( 'off' !== $open_sans ) {
            $font_families[] = 'Open Sans:400,600,800';
        }

        if ( 'off' !== $roboto_slab ) {
            $font_families[] = 'Roboto Slab:400,700';
        }

        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );

        $font_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    }

    return apply_filters( 'nominee_google_font_url', esc_url_raw( $font_url ) );
}


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Enqueue scripts and styles.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (!function_exists('nominee_scripts')) :
    
    function nominee_scripts() {

        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // Styles
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        if (! nominee_option('site-typography')) {
            wp_enqueue_style( 'nominee-google-font', nominee_fonts_url(), array(), NULL );
        }
        
        wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.6.3');
        wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7');
        wp_enqueue_style('flaticon', get_template_directory_uri() . '/fonts/flaticon/flaticon.css', array(), NULL);
        wp_enqueue_style('nominee-plugins', get_template_directory_uri() . '/css/plugins.css', array(), NULL);
        wp_enqueue_style('stylesheet', get_stylesheet_uri());
        if (nominee_option('rtl')) {
            wp_enqueue_style('nominee-rtl-css', get_template_directory_uri() . '/rtl.css', array(), NULL);
        }

        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // scripts
        //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        wp_enqueue_script('nominee-plugins', get_template_directory_uri() . '/js/plugins.js', array('jquery'), NULL, TRUE);
        wp_register_script('superslides', get_template_directory_uri() . '/js/jquery.superslides.min.js', array('jquery'), NULL, TRUE);
        wp_register_script('google-map', '//maps.googleapis.com/maps/api/js', array(), NULL, TRUE );
        if (nominee_option('news-feed-visibility', false, true)) :
            wp_enqueue_script('news-ticker', get_template_directory_uri() . '/js/jquery.news-ticker.min.js', array('jquery'), NULL, TRUE);
        endif;
        wp_enqueue_script( 'jquery-masonry' );
        wp_enqueue_script('nominee-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), NULL, TRUE);

        wp_localize_script( 'nominee-scripts', 'nomineeJSObject', apply_filters( 'nominee_js_object', array(
            'is_front_page'          => is_front_page(),
            'nominee_news_ticker'    => nominee_option('news-feed-visibility', false, true),
			'count_day'   	         => nominee_option('count-day', false, esc_html__('Days', 'nominee')),
			'count_hour'             => nominee_option('count-hour', false, esc_html__('Hour', 'nominee')),
			'count_minutes'          => nominee_option('count-minute', false, esc_html__('Minutes', 'nominee')),
            'count_second'           => nominee_option('count-second', false, esc_html__('Seconds', 'nominee')),
            'newsletter_popup'       => nominee_option('newsletter-popup', false, false),
			'newsletter_popup_limit' => nominee_option('newsletter-popup-limit', false, false),
            'newsletter_popup_time'  => nominee_option('newsletter-popup-time', false, 3),
            'ajaxurl'                => admin_url( 'admin-ajax.php' ),
            'redirecturl'            => nominee_option('tt-login-redirect', false, home_url('/')),
            'loadingmessage'         => esc_html__('Sending user info, please wait...', 'nominee'),
            'rtl'                    => nominee_option('rtl')
		) ) );

        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }

    add_action('wp_enqueue_scripts', 'nominee_scripts');
endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Support editor style
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-  

if (!function_exists('nominee_editor_styles')) :
    function nominee_editor_styles() {
        wp_enqueue_style('google-font', nominee_fonts_url(), array(), NULL);
        wp_enqueue_style( 'nominee-editor-style', get_template_directory_uri() . '/css/editor-style.css');
    }
endif;
add_action( 'enqueue_block_editor_assets', 'nominee_editor_styles', 999 );



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Custom template tags for this theme.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
require get_template_directory() . "/inc/template-tags.php";

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Custom functions that act independently of the theme templates.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
require get_template_directory() . "/inc/extras.php";

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Custom dynamic styles
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
require get_template_directory() . "/inc/custom-style.php";

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Load Jetpack compatibility file.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
require get_template_directory() . "/inc/jetpack.php";