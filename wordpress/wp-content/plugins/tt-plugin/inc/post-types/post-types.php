<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

$post_types = nominee_get_option('nominee-post-type', 'tt_post_types');

if (empty($post_types)) {
    add_action('init', 'tt_reformation_post_type');
    add_action( 'init', 'tt_register_taxonomy_reformation_cat' );

    add_action('init', 'tt_issue_post_type');
    add_action( 'init', 'tt_register_taxonomy_issue_cat' );

    add_action('init', 'tt_event_post_type');

    add_action('init', 'tt_story_post_type');

    add_action('init', 'tt_member_post_type');
    add_action( 'init', 'tt_register_taxonomy_member_cat' );
} else {
    foreach ($post_types as $type) {
        if ($type == 'reformation') {
            add_action('init', 'tt_reformation_post_type');
            add_action( 'init', 'tt_register_taxonomy_reformation_cat' );
        } elseif($type == 'issue') {
            add_action('init', 'tt_issue_post_type');
            add_action( 'init', 'tt_register_taxonomy_issue_cat' );
        } elseif($type == 'event') {
            add_action('init', 'tt_event_post_type');
        } elseif($type == 'story') {
            add_action('init', 'tt_story_post_type');
        } elseif($type == 'member') {
            add_action('init', 'tt_member_post_type');
            add_action( 'init', 'tt_register_taxonomy_member_cat' );
        }
    }
}

$nominee_reformation_slug = 'reformation';
$nominee_reformation_cat_slug = 'reformation-category';

$nominee_issue_slug = 'issue';
$nominee_issue_cat_slug = 'issue-category';

$nominee_event_slug = 'event';
$nominee_story_slug = 'story';

$nominee_member_slug = 'member';
$nominee_member_cat_slug = 'member-category';


if (nominee_get_option('nominee-reformation-slug', 'tt_custom_url_slug')) {
    $nominee_reformation_slug = nominee_get_option('nominee-reformation-slug', 'tt_custom_url_slug');
}
if (nominee_get_option('nominee-reformation-cat-slug', 'tt_custom_url_slug')) {
    $nominee_reformation_cat_slug = nominee_get_option('nominee-reformation-cat-slug', 'tt_custom_url_slug');
}
if (nominee_get_option('nominee-issue-slug', 'tt_custom_url_slug')) {
    $nominee_issue_slug = nominee_get_option('nominee-issue-slug', 'tt_custom_url_slug');
}
if (nominee_get_option('nominee-issue-cat-slug', 'tt_custom_url_slug')) {
    $nominee_issue_cat_slug = nominee_get_option('nominee-issue-cat-slug', 'tt_custom_url_slug');
}
if (nominee_get_option('nominee-event-slug', 'tt_custom_url_slug')) {
    $nominee_event_slug = nominee_get_option('nominee-event-slug', 'tt_custom_url_slug');
}
if (nominee_get_option('nominee-story-slug', 'tt_custom_url_slug')) {
    $nominee_story_slug = nominee_get_option('nominee-story-slug', 'tt_custom_url_slug');
}
if (nominee_get_option('nominee-member-slug', 'tt_custom_url_slug')) {
    $nominee_member_slug = nominee_get_option('nominee-member-slug', 'tt_custom_url_slug');
}
if (nominee_get_option('nominee-member-cat-slug', 'tt_custom_url_slug')) {
    $nominee_member_cat_slug = nominee_get_option('nominee-member-cat-slug', 'tt_custom_url_slug');
}

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Register reformation post type
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    function tt_reformation_post_type() {

        global $nominee_reformation_slug;

        $labels = array(
            'name'               => esc_html_x('Reformation', 'tt-pl-textdomain'),
            'singular_name'      => esc_html_x('Reformation', 'tt-pl-textdomain'),
            'menu_name'          => esc_html__('Reformation', 'tt-pl-textdomain'),
            'parent_item_colon'  => esc_html__('Parent Reformation:', 'tt-pl-textdomain'),
            'all_items'          => esc_html__('All Reformation', 'tt-pl-textdomain'),
            'view_item'          => esc_html__('View Reformation', 'tt-pl-textdomain'),
            'add_new_item'       => esc_html__('Add New Reformation', 'tt-pl-textdomain'),
            'add_new'            => esc_html__('Add New', 'tt-pl-textdomain'),
            'edit_item'          => esc_html__('Edit Reformation', 'tt-pl-textdomain'),
            'update_item'        => esc_html__('Update Reformation', 'tt-pl-textdomain'),
            'search_items'       => esc_html__('Search Reformation', 'tt-pl-textdomain'),
            'not_found'          => esc_html__('No Reformation found', 'tt-pl-textdomain'),
            'not_found_in_trash' => esc_html__('No Reformation found in Trash', 'tt-pl-textdomain'),
        );
        $args = array(
            'description'         => esc_html__('Reformation', 'tt-pl-textdomain'),
            'labels'              => $labels,
            'supports'            => array('title', 'editor', 'page-attributes','thumbnail', 'comments'),
            'taxonomies'          => array('tt-reformation-cat'),
            'hierarchical'        => FALSE,
            'public'              => TRUE,
            'show_ui'             => TRUE,
            'show_in_menu'        => TRUE,
            'show_in_nav_menus'   => TRUE,
            'show_in_admin_bar'   => TRUE,
            'menu_position'       => 6,
            'menu_icon'           => 'dashicons-schedule',
            'can_export'          => TRUE,
            'has_archive'         => FALSE,
            'exclude_from_search' => TRUE,
            'publicly_queryable'  => TRUE,
            'rewrite'             => array( 'slug' => $nominee_reformation_slug ),
            'capability_type'     => 'post',
        );

        register_post_type('tt-reformation', $args);
    }


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Register taxonomy for reformation 
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    function tt_register_taxonomy_reformation_cat() {

        global $nominee_reformation_cat_slug;

        $labels = array(
            'name'                          => esc_html_x( 'Category', 'tt-pl-textdomain' ),
            'singular_name'                 => esc_html_x( 'Category', 'tt-pl-textdomain' ),
            'search_items'                  => esc_html_x( 'Search Category', 'tt-pl-textdomain' ),
            'popular_items'                 => esc_html_x( 'Popular Category', 'tt-pl-textdomain' ),
            'all_items'                     => esc_html_x( 'All Categories', 'tt-pl-textdomain' ),
            'parent_item'                   => esc_html_x( 'Parent Category', 'tt-pl-textdomain' ),
            'parent_item_colon'             => esc_html_x( 'Parent Category:', 'tt-pl-textdomain' ),
            'edit_item'                     => esc_html_x( 'Edit Category', 'tt-pl-textdomain' ),
            'update_item'                   => esc_html_x( 'Update Category', 'tt-pl-textdomain' ),
            'add_new_item'                  => esc_html_x( 'Add New Category', 'tt-pl-textdomain' ),
            'new_item_name'                 => esc_html_x( 'New Category', 'tt-pl-textdomain' ),
            'separate_items_with_commas'    => esc_html_x( 'Separate categories with commas', 'tt-pl-textdomain' ),
            'add_or_remove_items'           => esc_html_x( 'Add or remove categories', 'tt-pl-textdomain' ),
            'choose_from_most_used'         => esc_html_x( 'Choose from most used categories', 'tt-pl-textdomain' ),
            'menu_name'                     => esc_html_x( 'Categories', 'tt-pl-textdomain' ),
        );

        $args = array(
            'labels'            => $labels,
            'public'            => true,
            'show_in_nav_menus' => true,
            'show_ui'           => true,
            'show_tagcloud'     => false,
            'show_admin_column' => true,
            'hierarchical'      => true,
            //'rewrite'           => true,
            'rewrite'           => array( 'slug' => $nominee_reformation_cat_slug ),
            'query_var'         => true
        );

        register_taxonomy( 'tt-reformation-cat', array('tt-reformation'), $args );
    }


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Register Issue post type
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    function tt_issue_post_type() {

        global $nominee_issue_slug;

        $labels = array(
            'name'               => esc_html_x('Issue', 'tt-pl-textdomain'),
            'singular_name'      => esc_html_x('Issue', 'tt-pl-textdomain'),
            'menu_name'          => esc_html__('Issue', 'tt-pl-textdomain'),
            'parent_item_colon'  => esc_html__('Parent Issue:', 'tt-pl-textdomain'),
            'all_items'          => esc_html__('All Issue', 'tt-pl-textdomain'),
            'view_item'          => esc_html__('View Issue', 'tt-pl-textdomain'),
            'add_new_item'       => esc_html__('Add New Issue', 'tt-pl-textdomain'),
            'add_new'            => esc_html__('Add New', 'tt-pl-textdomain'),
            'edit_item'          => esc_html__('Edit Issue', 'tt-pl-textdomain'),
            'update_item'        => esc_html__('Update Issue', 'tt-pl-textdomain'),
            'search_items'       => esc_html__('Search Issue', 'tt-pl-textdomain'),
            'not_found'          => esc_html__('No Issue found', 'tt-pl-textdomain'),
            'not_found_in_trash' => esc_html__('No Issue found in Trash', 'tt-pl-textdomain'),
        );
        $args = array(
            'description'         => esc_html__('Issue', 'tt-pl-textdomain'),
            'labels'              => $labels,
            'supports'            => array('title', 'editor', 'page-attributes','thumbnail', 'comments'),
            'taxonomies'          => array('tt-issue-cat'),
            'hierarchical'        => FALSE,
            'public'              => TRUE,
            'show_ui'             => TRUE,
            'show_in_menu'        => TRUE,
            'show_in_nav_menus'   => TRUE,
            'show_in_admin_bar'   => TRUE,
            'menu_position'       => 6,
            'menu_icon'           => 'dashicons-megaphone',
            'can_export'          => TRUE,
            'has_archive'         => FALSE,
            'exclude_from_search' => TRUE,
            'publicly_queryable'  => TRUE,
            'rewrite'             => array( 'slug' => $nominee_issue_slug ),
            'capability_type'     => 'post',
        );

        register_post_type('tt-issue', $args);
    }

    
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Register taxonomy for issue
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    function tt_register_taxonomy_issue_cat() {

        global $nominee_issue_cat_slug;

        $labels = array(
            'name'                          => esc_html_x( 'Category', 'tt-pl-textdomain' ),
            'singular_name'                 => esc_html_x( 'Category', 'tt-pl-textdomain' ),
            'search_items'                  => esc_html_x( 'Search Category', 'tt-pl-textdomain' ),
            'popular_items'                 => esc_html_x( 'Popular Category', 'tt-pl-textdomain' ),
            'all_items'                     => esc_html_x( 'All Categories', 'tt-pl-textdomain' ),
            'parent_item'                   => esc_html_x( 'Parent Category', 'tt-pl-textdomain' ),
            'parent_item_colon'             => esc_html_x( 'Parent Category:', 'tt-pl-textdomain' ),
            'edit_item'                     => esc_html_x( 'Edit Category', 'tt-pl-textdomain' ),
            'update_item'                   => esc_html_x( 'Update Category', 'tt-pl-textdomain' ),
            'add_new_item'                  => esc_html_x( 'Add New Category', 'tt-pl-textdomain' ),
            'new_item_name'                 => esc_html_x( 'New Category', 'tt-pl-textdomain' ),
            'separate_items_with_commas'    => esc_html_x( 'Separate categories with commas', 'tt-pl-textdomain' ),
            'add_or_remove_items'           => esc_html_x( 'Add or remove categories', 'tt-pl-textdomain' ),
            'choose_from_most_used'         => esc_html_x( 'Choose from most used categories', 'tt-pl-textdomain' ),
            'menu_name'                     => esc_html_x( 'Categories', 'tt-pl-textdomain' ),
        );

        $args = array(
            'labels'            => $labels,
            'public'            => true,
            'show_in_nav_menus' => true,
            'show_ui'           => true,
            'show_tagcloud'     => false,
            'show_admin_column' => true,
            'hierarchical'      => true,
            'rewrite'           => array('slug' => $nominee_issue_cat_slug),
            'query_var'         => true
        );

        register_taxonomy( 'tt-issue-cat', array('tt-issue'), $args );
    }


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Register event post type
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    function tt_event_post_type() {

        global $nominee_event_slug;

        $labels = array(
            'name'               => esc_html_x('Event', 'tt-pl-textdomain'),
            'singular_name'      => esc_html_x('Event', 'tt-pl-textdomain'),
            'menu_name'          => esc_html__('Events', 'tt-pl-textdomain'),
            'parent_item_colon'  => esc_html__('Parent Event:', 'tt-pl-textdomain'),
            'all_items'          => esc_html__('All Events', 'tt-pl-textdomain'),
            'view_item'          => esc_html__('View Event', 'tt-pl-textdomain'),
            'add_new_item'       => esc_html__('Add New Event', 'tt-pl-textdomain'),
            'add_new'            => esc_html__('Add New', 'tt-pl-textdomain'),
            'edit_item'          => esc_html__('Edit Event', 'tt-pl-textdomain'),
            'update_item'        => esc_html__('Update Event', 'tt-pl-textdomain'),
            'search_items'       => esc_html__('Search Event', 'tt-pl-textdomain'),
            'not_found'          => esc_html__('No Event found', 'tt-pl-textdomain'),
            'not_found_in_trash' => esc_html__('No Event found in Trash', 'tt-pl-textdomain'),
        );
        $args = array(
            'description'         => esc_html__('Event', 'tt-pl-textdomain'),
            'labels'              => $labels,
            'supports'            => array('title', 'editor', 'page-attributes','thumbnail', 'comments'),
            'taxonomies'          => array(),
            'hierarchical'        => FALSE,
            'public'              => TRUE,
            'show_ui'             => TRUE,
            'show_in_menu'        => TRUE,
            'show_in_nav_menus'   => TRUE,
            'show_in_admin_bar'   => TRUE,
            'menu_position'       => 6,
            'menu_icon'           => 'dashicons-calendar-alt',
            'can_export'          => TRUE,
            'has_archive'         => FALSE,
            'exclude_from_search' => TRUE,
            'publicly_queryable'  => TRUE,
            'rewrite'             => array( 'slug' => $nominee_event_slug ),
            'capability_type'     => 'post',
        );

        register_post_type('tt-event', $args);
    }


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Register story post type
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    function tt_story_post_type() {

        global $nominee_story_slug;

        $labels = array(
            'name'               => esc_html_x('Story', 'tt-pl-textdomain'),
            'singular_name'      => esc_html_x('Story', 'tt-pl-textdomain'),
            'menu_name'          => esc_html__('Stories', 'tt-pl-textdomain'),
            'parent_item_colon'  => esc_html__('Parent Story:', 'tt-pl-textdomain'),
            'all_items'          => esc_html__('All Stories', 'tt-pl-textdomain'),
            'view_item'          => esc_html__('View Story', 'tt-pl-textdomain'),
            'add_new_item'       => esc_html__('Add New Story', 'tt-pl-textdomain'),
            'add_new'            => esc_html__('Add New', 'tt-pl-textdomain'),
            'edit_item'          => esc_html__('Edit Story', 'tt-pl-textdomain'),
            'update_item'        => esc_html__('Update Story', 'tt-pl-textdomain'),
            'search_items'       => esc_html__('Search Story', 'tt-pl-textdomain'),
            'not_found'          => esc_html__('No Story found', 'tt-pl-textdomain'),
            'not_found_in_trash' => esc_html__('No Story found in Trash', 'tt-pl-textdomain'),
        );
        $args = array(
            'description'         => esc_html__('Story', 'tt-pl-textdomain'),
            'labels'              => $labels,
            'supports'            => array('title', 'editor', 'page-attributes','thumbnail', 'comments'),
            'taxonomies'          => array(),
            'hierarchical'        => FALSE,
            'public'              => TRUE,
            'show_ui'             => TRUE,
            'show_in_menu'        => TRUE,
            'show_in_nav_menus'   => TRUE,
            'show_in_admin_bar'   => TRUE,
            'menu_position'       => 6,
            'menu_icon'           => 'dashicons-editor-ol',
            'can_export'          => TRUE,
            'has_archive'         => FALSE,
            'exclude_from_search' => TRUE,
            'publicly_queryable'  => TRUE,
            'rewrite'             => array( 'slug' => $nominee_story_slug ),
            'capability_type'     => 'post',
        );

        register_post_type('tt-story', $args);
    }


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Register member post type
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    function tt_member_post_type() {

        global $nominee_member_slug;

        $labels = array(
            'name'               => esc_html_x('Member', 'tt-pl-textdomain'),
            'singular_name'      => esc_html_x('Member', 'tt-pl-textdomain'),
            'menu_name'          => esc_html__('Members', 'tt-pl-textdomain'),
            'parent_item_colon'  => esc_html__('Parent Member:', 'tt-pl-textdomain'),
            'all_items'          => esc_html__('All Members', 'tt-pl-textdomain'),
            'view_item'          => esc_html__('View Member', 'tt-pl-textdomain'),
            'add_new_item'       => esc_html__('Add New Member', 'tt-pl-textdomain'),
            'add_new'            => esc_html__('Add New', 'tt-pl-textdomain'),
            'edit_item'          => esc_html__('Edit Member', 'tt-pl-textdomain'),
            'update_item'        => esc_html__('Update Member', 'tt-pl-textdomain'),
            'search_items'       => esc_html__('Search Member', 'tt-pl-textdomain'),
            'not_found'          => esc_html__('No Member found', 'tt-pl-textdomain'),
            'not_found_in_trash' => esc_html__('No Member found in Trash', 'tt-pl-textdomain'),
        );
        $args = array(
            'description'         => esc_html__('Member', 'tt-pl-textdomain'),
            'labels'              => $labels,
            'supports'            => array('title', 'editor', 'page-attributes','thumbnail', 'comments'),
            'taxonomies'          => array(),
            'hierarchical'        => FALSE,
            'public'              => TRUE,
            'show_ui'             => TRUE,
            'show_in_menu'        => TRUE,
            'show_in_nav_menus'   => TRUE,
            'show_in_admin_bar'   => TRUE,
            'menu_position'       => 6,
            'menu_icon'           => 'dashicons-admin-users',
            'can_export'          => TRUE,
            'has_archive'         => FALSE,
            'exclude_from_search' => TRUE,
            'publicly_queryable'  => TRUE,
            'rewrite'             => array( 'slug' => $nominee_member_slug ),
            'capability_type'     => 'post',
        );

        register_post_type('tt-member', $args);
    }


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Register taxonomy for member 
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
function tt_register_taxonomy_member_cat() {

    global $nominee_member_cat_slug;

    $labels = array(
        'name'                          => esc_html_x( 'Category', 'tt-pl-textdomain' ),
        'singular_name'                 => esc_html_x( 'Category', 'tt-pl-textdomain' ),
        'search_items'                  => esc_html_x( 'Search Category', 'tt-pl-textdomain' ),
        'popular_items'                 => esc_html_x( 'Popular Category', 'tt-pl-textdomain' ),
        'all_items'                     => esc_html_x( 'All Categories', 'tt-pl-textdomain' ),
        'parent_item'                   => esc_html_x( 'Parent Category', 'tt-pl-textdomain' ),
        'parent_item_colon'             => esc_html_x( 'Parent Category:', 'tt-pl-textdomain' ),
        'edit_item'                     => esc_html_x( 'Edit Category', 'tt-pl-textdomain' ),
        'update_item'                   => esc_html_x( 'Update Category', 'tt-pl-textdomain' ),
        'add_new_item'                  => esc_html_x( 'Add New Category', 'tt-pl-textdomain' ),
        'new_item_name'                 => esc_html_x( 'New Category', 'tt-pl-textdomain' ),
        'separate_items_with_commas'    => esc_html_x( 'Separate categories with commas', 'tt-pl-textdomain' ),
        'add_or_remove_items'           => esc_html_x( 'Add or remove categories', 'tt-pl-textdomain' ),
        'choose_from_most_used'         => esc_html_x( 'Choose from most used categories', 'tt-pl-textdomain' ),
        'menu_name'                     => esc_html_x( 'Categories', 'tt-pl-textdomain' ),
    );

    $args = array(
        'labels'            => $labels,
        'public'            => true,
        'show_in_nav_menus' => true,
        'show_ui'           => true,
        'show_tagcloud'     => false,
        'show_admin_column' => true,
        'hierarchical'      => true,
        'rewrite'           => array( 'slug' => $nominee_member_cat_slug ),
        'query_var'         => true
    );

    register_taxonomy( 'tt-member-cat', array('tt-member'), $args );
}