<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if ( !class_exists('Nominee_Settings_Class_Options' ) ):
class Nominee_Settings_Class_Options {

    private $settings_api;

    function __construct() {
        $this->settings_api = new Nominee_Settings_Class;

        add_action( 'admin_init', array($this, 'admin_init') );
        add_action( 'admin_menu', array($this, 'admin_menu') );
    }

    function admin_init() {

        //set the settings
        $this->settings_api->set_sections( $this->tt_get_settings_sections() );
        $this->settings_api->set_fields( $this->tt_get_settings_fields() );

        //initialize settings
        $this->settings_api->admin_init();
    }

    function admin_menu() {
        add_options_page( 'Nominee Plugin Options', 'Nominee Plugin Options', 'delete_posts', 'nominee_plugin_option_settings', array($this, 'tt_plugin_page') );
    }

    function tt_get_settings_sections() {
        $sections = array(
            array(
                'id' => 'tt_post_types',
                'title' => esc_html__( 'Post Types', 'tt-pl-textdomain' )
            ),
            
            array(
                'id' => 'tt_custom_url_slug',
                'title' => esc_html__( 'Custom URL Slug', 'tt-pl-textdomain' )
            )
        );
        return $sections;
    }


    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function tt_get_settings_fields() {
        $settings_fields = array(
            'tt_post_types' => array(
                
                array(
                    'name'    => 'nominee-post-type',
                    'label'   => __( 'Enable/Disable post type', 'tt-pl-textdomain' ),
                    'type'    => 'multicheck',
                    'desc' => esc_html__( 'You have to use at least one post type', 'tt-pl-textdomain' ),
                    'default' => array('reformation' => 'reformation', 'issue' => 'issue', 'event' => 'event', 'story' => 'story', 'member' => 'member'),
                    'options' => array(
                        'reformation'   => 'Reformation',
                        'issue'   => 'Issue',
                        'event' => 'Event',
                        'story'  => 'Story',
                        'member'  => 'Member'
                    )
                )
            ),

            'tt_custom_url_slug' => array(
                array(
                    'name' => 'nominee-reformation-slug',
                    'label' => esc_html__( 'Reformation slug', 'tt-pl-textdomain' ),
                    'desc' => esc_html__( 'Change reformation slug, default is: reformation', 'tt-pl-textdomain' ),
                    'type' => 'text',
                    'default' => 'reformation'
                ),
                array(
                    'name' => 'nominee-reformation-cat-slug',
                    'label' => esc_html__( 'Reformation category slug', 'tt-pl-textdomain' ),
                    'desc' => esc_html__( 'Change reformation category slug, default is: reformation-cat', 'tt-pl-textdomain' ),
                    'type' => 'text',
                    'default' => 'reformation-category'
                ),
                array(
                    'name' => 'nominee-issue-slug',
                    'label' => esc_html__( 'Issue slug', 'tt-pl-textdomain' ),
                    'desc' => esc_html__( 'Change issue slug, default is: issue', 'tt-pl-textdomain' ),
                    'type' => 'text',
                    'default' => 'issue'
                ),
                array(
                    'name' => 'nominee-issue-cat-slug',
                    'label' => esc_html__( 'Issue category slug', 'tt-pl-textdomain' ),
                    'desc' => esc_html__( 'Change issue category slug, default is: issue-category', 'tt-pl-textdomain' ),
                    'type' => 'text',
                    'default' => 'issue-category'
                ),

                array(
                    'name' => 'nominee-event-slug',
                    'label' => esc_html__( 'Event slug', 'tt-pl-textdomain' ),
                    'desc' => esc_html__( 'Change event slug, default is: event', 'tt-pl-textdomain' ),
                    'type' => 'text',
                    'default' => 'event'
                ),

                array(
                    'name' => 'nominee-story-slug',
                    'label' => esc_html__( 'Story slug', 'tt-pl-textdomain' ),
                    'desc' => esc_html__( 'Change story slug, default is: story', 'tt-pl-textdomain' ),
                    'type' => 'text',
                    'default' => 'story'
                ),

                array(
                    'name' => 'nominee-member-slug',
                    'label' => esc_html__( 'Story slug', 'tt-pl-textdomain' ),
                    'desc' => esc_html__( 'Change member slug, default is: member', 'tt-pl-textdomain' ),
                    'type' => 'text',
                    'default' => 'member'
                ),
                array(
                    'name' => 'nominee-member-cat-slug',
                    'label' => esc_html__( 'Member category slug', 'tt-pl-textdomain' ),
                    'desc' => esc_html__( 'Change member category slug, default is: member-category', 'tt-pl-textdomain' ),
                    'type' => 'text',
                    'default' => 'member-category'
                ),
                array(
                    'name' => 'nominee-warning',
                    'label' => esc_html__( '', 'tt-pl-textdomain' ),
                    'class' => 'warning',
                    'type' => 'warning',
                    'default' => esc_html__( 'If you change any field value then you have to save the permalink again, for that go to this link - '.esc_url(admin_url( 'options-permalink.php')).' and click the Save Changes button', 'tt-pl-textdomain' ),
                )
            )
        );

        return $settings_fields;
    }

    function tt_plugin_page() { 

        ob_start(); ?>
        
            <div class="wrap">
                <div class="tt_row clearfix">
                    
                    <?php $this->settings_api->show_navigation();
                    $this->settings_api->show_forms(); ?>

                </div> <!-- .row -->
            </div> <!-- .wrap -->

        <?php echo ob_get_clean();
    }

    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
    function tt_get_pages() {
        $pages = tt_get_pages();
        $pages_options = array();
        if ( $pages ) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }

        return $pages_options;
    }

}
endif;