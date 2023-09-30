<?php 

function tt_import_files() {
    return array(
        array(
            'import_file_name'           => 'Default',
            'categories'                 => array( 'Multipage (all pages)', 'Political Party'),
            'import_file_url'            => TT_PLUGIN_URL.'inc/demo-data/multipage/contents.xml',
            'import_widget_file_url'     => TT_PLUGIN_URL.'inc/demo-data/multipage/widgets-data.wie',
            'import_redux'               => array(
                array(
                    'file_url'    => TT_PLUGIN_URL.'inc/demo-data/multipage/theme-options.json',
                    'option_name' => 'nominee_theme_option',
                )
            ),
            'import_preview_image_url'   => TT_PLUGIN_URL. 'images/default.jpg',
            'preview_url'                => 'https://trendytheme.net/demo2/wp/nominee/',
            'import_notice'              => esc_html__( 'This will import all the pages and homepages except others full demos', 'tt-pl-textdomain' )
        ),

        array(
            'import_file_name'           => 'Political Party',
            'categories'                 => array('Political Party'),
            'import_file_url'            => TT_PLUGIN_URL.'inc/demo-data/political-party/contents.xml',
            'import_widget_file_url'     => TT_PLUGIN_URL.'inc/demo-data/political-party/widgets-data.wie',
            'import_redux'               => array(
                array(
                    'file_url'    => TT_PLUGIN_URL.'inc/demo-data/political-party/theme-options.json',
                    'option_name' => 'nominee_theme_option',
                )
            ),
            'import_preview_image_url'   => TT_PLUGIN_URL. 'images/political-party.jpg',
            'preview_url'                => 'https://trendytheme.net/demo2/wp/nominee-sites/political-party/',
            'import_notice'              => esc_html__( 'This will import only Political Party Demo content', 'tt-pl-textdomain' )
        ),
        array(
            'import_file_name'           => 'Male Candidate',
            'categories'                 => array('Personal'),
            'import_file_url'            => TT_PLUGIN_URL.'inc/demo-data/male-candidate/contents.xml',
            'import_widget_file_url'     => TT_PLUGIN_URL.'inc/demo-data/male-candidate/widgets-data.wie',
            'import_redux'               => array(
                array(
                    'file_url'    => TT_PLUGIN_URL.'inc/demo-data/male-candidate/theme-options.json',
                    'option_name' => 'nominee_theme_option',
                )
            ),
            'import_preview_image_url'   => TT_PLUGIN_URL. 'images/male.jpg',
            'preview_url'                => 'https://trendytheme.net/demo2/wp/nominee-sites/male-candidate/',
            'import_notice'              => esc_html__( 'This will import only Male Candidate Demo content', 'tt-pl-textdomain' )
        ),
        array(
            'import_file_name'           => 'Female Candidate',
            'categories'                 => array('Personal'),
            'import_file_url'            => TT_PLUGIN_URL.'inc/demo-data/female-candidate/contents.xml',
            'import_widget_file_url'     => TT_PLUGIN_URL.'inc/demo-data/female-candidate/widgets-data.wie',
            'import_redux'               => array(
                array(
                    'file_url'    => TT_PLUGIN_URL.'inc/demo-data/female-candidate/theme-options.json',
                    'option_name' => 'nominee_theme_option',
                )
            ),
            'import_preview_image_url'   => TT_PLUGIN_URL. 'images/female.jpg',
            'preview_url'                => 'https://trendytheme.net/demo2/wp/nominee-sites/female-candidate/',
            'import_notice'              => esc_html__( 'This will import only Female Candidate Demo content', 'tt-pl-textdomain' )
        ),
        array(
            'import_file_name'           => 'City Government',
            'categories'                 => array('Political Party', 'Municipal'),
            'import_file_url'            => TT_PLUGIN_URL.'inc/demo-data/city-gov/contents.xml',
            'import_widget_file_url'     => TT_PLUGIN_URL.'inc/demo-data/city-gov/widgets-data.wie',
            'import_redux'               => array(
                array(
                    'file_url'    => TT_PLUGIN_URL.'inc/demo-data/city-gov/theme-options.json',
                    'option_name' => 'nominee_theme_option',
                )
            ),
            'import_preview_image_url'   => TT_PLUGIN_URL. 'images/city-gov.jpg',
            'preview_url'                => 'https://trendytheme.net/demo2/wp/nominee-sites/city-gov/',
            'import_notice'              => esc_html__( 'This will import only City Government Demo content', 'tt-pl-textdomain' )
        ),
        
        array(
            'import_file_name'           => 'Onepage',
            'categories'                 => array( 'Onepage', 'Personal'),
            'import_file_url'            => TT_PLUGIN_URL.'inc/demo-data/onepage/onepage-default-contents.xml',
            'import_widget_file_url'     => TT_PLUGIN_URL.'inc/demo-data/multipage/widgets-data.wie',
            'import_redux'               => array(
                array(
                    'file_url'    => TT_PLUGIN_URL.'inc/demo-data/onepage/onepage-default-options.json',
                    'option_name' => 'nominee_theme_option',
                )
            ),
            'import_preview_image_url'   => TT_PLUGIN_URL.'images/onepage.jpg',
            'preview_url'                => 'https://trendytheme.net/demo2/wp/nominee-sites/onepage/',
            'import_notice'              => esc_html__( 'This will import only the OnepPage Demo content', 'tt-pl-textdomain' )
        )
    );
}
add_filter( 'pt-ocdi/import_files', 'tt_import_files' );



// set primary menu front page and blog page
function tt_after_import( $selected_import ) {
 
    if ( 'Default' === $selected_import['import_file_name'] || 'Political Party' === $selected_import['import_file_name'] ) {
        //Set Menu
        $primary_menu = get_term_by('name', 'Primary Menu', 'nav_menu');
        set_theme_mod( 'nav_menu_locations' , array( 
            'primary' => $primary_menu->term_id
            )
        );

        // Assign front page and posts page (blog page).
        $front_page_id = get_page_by_title( 'Home' );
        $blog_page_id  = get_page_by_title( 'Blog' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );
        update_option( 'page_for_posts', $blog_page_id->ID );

    } elseif ( 'Male Candidate' === $selected_import['import_file_name'] || 'Female Candidate' === $selected_import['import_file_name']) {
        //Set Menu
        $primary_menu = get_term_by('name', 'Primary Menu', 'nav_menu');
        set_theme_mod( 'nav_menu_locations' , array( 
            'primary' => $primary_menu->term_id
            )
        );
        
        // Assign front page and posts page (blog page).
        $front_page_id = get_page_by_title( 'Home' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );
    } elseif ( 'City Government' === $selected_import['import_file_name'] ) {
        //Set Menu
        $left_menu = get_term_by('name', 'Left Menu', 'nav_menu');
        $right_menu = get_term_by('name', 'Right Menu', 'nav_menu');
        set_theme_mod( 'nav_menu_locations' , array( 
            'menu-left' => $left_menu->term_id,
            'menu-right' => $right_menu->term_id
            )
        );
        
        // Assign front page and posts page (blog page).
        $front_page_id = get_page_by_title( 'Home' );
        $blog_page_id  = get_page_by_title( 'Blog' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );
        update_option( 'page_for_posts', $blog_page_id->ID );
    } elseif ( 'Onepage' === $selected_import['import_file_name'] ) {
        //Set Menu
        $primary_menu = get_term_by('name', 'Primary Menu', 'nav_menu');
        set_theme_mod( 'nav_menu_locations' , array( 
            'primary' => $primary_menu->term_id
            )
        );
        
        // Assign front page and posts page (blog page).
        $front_page_id = get_page_by_title( 'Home' );
        $blog_page_id  = get_page_by_title( 'Blog' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );
        update_option( 'page_for_posts', $blog_page_id->ID );
    }
}
add_action( 'pt-ocdi/after_import', 'tt_after_import' );


// disable notice
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );



function tt_plugin_intro_text( $default_text ) {
    $default_text .= '<div class="ocdi__intro-notice  notice  notice-warning"><p><strong>Before install the demo you need to increase those limits to a minimum as follows:</strong><br>
	<code>max_execution_time=300, max_input_time=600, max_input_vars=5000, memory_limit=256M, post_max_size=48M, upload_max_filesize=48M.</code><br><span>You can verify your PHP configuration limits by installing a simple plugin found <a href="http://wordpress.org/extend/plugins/wordpress-php-info/" target="_blank">here</a>. In addition, you can always contact your host and ask them what the current settings are and have them adjust them if needed</span></p></div>';

    return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'tt_plugin_intro_text' );


// recommended plugins
function tt_plugin_register_plugins( $theme_plugins ) {
 
  // List of plugins used by all theme demos.
  $theme_plugins = [
    [
      'name'        => 'Nominee Theme Plugin',
      'description' => 'Nominee core plugin, it is required.',
      'slug'        => 'tt-plugin',  // The slug has to match the extracted folder from the zip.
      'source'      => 'http://trendytheme.net/demo2/plsrc/nominee/tt-plugin.zip',
      'preselected' => true,
      'required' => true,
    ],
    [
      'name'        => 'WPBakery Visual Composer',
      'description' => 'Nominee core plugin, it is required.',
      'slug'        => 'js_composer',  // The slug has to match the extracted folder from the zip.
      'source'      => 'http://trendytheme.net/demo2/plsrc/vc/js_composer.zip',
      'preselected' => true,
      'required' => true,
    ],
    [ // A WordPress.org plugin repository example.
      'name'     => 'Meta Box',
      'slug'     => 'meta-box',
      'required' => true,
      'preselected' => true,
    ],
    [ // A WordPress.org plugin repository example.
      'name'     => 'Redux Framework',
      'slug'     => 'redux-framework',
      'required' => true,
      'preselected' => true,
    ],
    [ // A WordPress.org plugin repository example.
      'name'     => 'Charitable (Donation Plugin)',
      'slug'     => 'charitable', 
      'required' => false,
      'preselected' => true,
    ],
    [ // A WordPress.org plugin repository example.
      'name'     => 'Contact Form 7',
      'slug'     => 'contact-form-7',
      'required' => false,
      'preselected' => true,
    ],
    [ // A WordPress.org plugin repository example.
      'name'     => 'MailChimp',
      'slug'     => 'mailchimp-for-wp', 
      'required' => false,
      'preselected' => true,
    ],
    [ // A WordPress.org plugin repository example.
      'name'     => 'WooCommerce',
      'slug'     => 'woocommerce', 
      'required' => false,
    ],
    [ // A WordPress.org plugin repository example.
      'name'     => 'WooCommerce Product Gallery',
      'slug'     => 'wpa-woocommerce-product-gallery-lite', 
      'required' => false,
    ]
  ];
 
  // Check if user is on the theme recommeneded plugins step and a demo was selected.
  if ( isset( $_GET['step'] ) && $_GET['step'] === 'import' && isset( $_GET['import'] ) ) {
 
    // Adding one additional plugin for the first demo import ('import' number = 0).
    if ( $_GET['import'] === '5' ) {
      $theme_plugins[] = [
        'name'     => 'Social Count Plus',
        'slug'     => 'social-count-plus',
        'required' => false,
      ];
    }
  }
 
  return $theme_plugins;
}
add_filter( 'ocdi/register_plugins', 'tt_plugin_register_plugins' );