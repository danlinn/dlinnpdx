<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if ( !function_exists('nominee_ajax_login')) :
    function nominee_ajax_login(){

        // First check the nonce, if it fails the function will break
        check_ajax_referer( 'ajax-login-nonce', 'security' );

        // Nonce is checked, get the POST data and sign user on
      	// Call nominee_auth_user_login
    	nominee_auth_user_login($_POST['username'], $_POST['password'], 'Login'); 
    	
        die();
    }

    // Enable the user with no privileges to run nominee_ajax_login() in AJAX
    add_action( 'wp_ajax_load_ajaxlogin', 'nominee_ajax_login' );
    add_action( 'wp_ajax_nopriv_ajaxlogin', 'nominee_ajax_login' );
endif;


if (! function_exists('nominee_ajax_register')) :
    function nominee_ajax_register(){

        // First check the nonce, if it fails the function will break
        check_ajax_referer( 'ajax-register-nonce', 'security' );
    		
        // Nonce is checked, get the POST data and sign user on
        $info = array();
      	$info['user_nicename'] = $info['nickname'] = $info['display_name'] = $info['first_name'] = $info['user_login'] = sanitize_user($_POST['username']) ;
        $info['user_pass'] = sanitize_text_field($_POST['password']);
    	$info['user_email'] = sanitize_email( $_POST['email']);
    	
    	// Register the user
        $user_register = wp_insert_user( $info );
     	if ( is_wp_error($user_register) ){	
    		$error  = $user_register->get_error_codes()	;
    		
    		if(in_array('empty_user_login', $error))
    			echo json_encode(array('loggedin'=>false, 'message'=> esc_html($user_register->get_error_message('empty_user_login'))));
    		elseif(in_array('existing_user_login',$error))
    			echo json_encode(array('loggedin'=>false, 'message'=> esc_html__('This username is already registered.', 'nominee')));
    		elseif(in_array('existing_user_email',$error))
            echo json_encode(array('loggedin'=>false, 'message'=> esc_html__('This email address is already registered.', 'nominee')));
        } else {
    	  nominee_auth_user_login($info['nickname'], $info['user_pass'], 'Registration');       
        }

        die();
    }

    // Enable the user with no privileges to run nominee_ajax_register() in AJAX
    add_action( 'wp_ajax_load_ajaxregister', 'nominee_ajax_register' );
    add_action( 'wp_ajax_nopriv_ajaxregister', 'nominee_ajax_register' );
endif;


if (! function_exists('nominee_auth_user_login')) :
    function nominee_auth_user_login($user_login, $password) {
    	$info = array();
        $info['user_login'] = $user_login;
        $info['user_password'] = $password;
        $info['remember'] = true;
    	
    	$user_signon = wp_signon( $info, false );
        if ( is_wp_error($user_signon) ){
    		echo json_encode(array('loggedin'=>false, 'message'=> esc_html__('Wrong username or password.', 'nominee')));
        } else {
    		wp_set_current_user($user_signon->ID); 
            echo json_encode(array('loggedin'=>true, 'message'=> esc_html__('Successful, redirecting...', 'nominee')));
        }
    	die();
    }
endif;