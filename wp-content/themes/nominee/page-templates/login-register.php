<?php
/*
Template Name: Login and Register
*/

if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header(); 

if (is_user_logged_in()) : ?>
    <div class="login-wrapper">
        <h2><?php esc_html_e('You have already logged in', 'nominee'); ?></h2>
        <a href="<?php echo esc_url(nominee_option('tt-login-redirect', false, home_url('/'))); ?>" class="btn btn-back btn-primary"><?php esc_html_e('Go Back', 'nominee'); ?></a>
    </div>
<?php else : ?>
	<div class="login-wrapper">
        <div class="card-wrapper"></div>
        <div class="card-wrapper">
            <h2 class="title"><?php esc_html_e('Login', 'nominee');?></h2>

            <!-- login form -->
            <form id="login" class="ajax-auth" action="login" method="post">

                <p class="status"></p>  
                <?php wp_nonce_field('ajax-login-nonce', 'security'); ?>
                
                <!-- user name -->
                <div class="input-container">
                    <input class="required" type="text" id="username" name="username" required="required" autocomplete="off" placeholder="<?php esc_attr_e('Username', 'nominee');?>" />
                    <div class="bar"></div>
                </div>
                
                <!-- password -->
                <div class="input-container">
                    <input class="required" type="password" id="password" name="password" required="required" autocomplete="off" placeholder="<?php esc_attr_e('Password', 'nominee');?>"/>
                    <div class="bar"></div>
                </div>

                <div class="button-container">
                    <button class="submit_button btn btn-primary btn-lg btn-block" type="submit"><?php esc_html_e('LOGIN', 'nominee');?></button>
                </div>
                <div class="footer"><a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Forgot your password?', 'nominee');?></a></div>  
            </form>
        </div> <!-- .card-wrapper -->

        <div class="card-wrapper alt">
            <div class="toggle"></div>
            <h2 class="title"><?php esc_html_e('Register', 'nominee');?>
              <div class="close"></div>
            </h2>

            <!-- register form -->
            <form id="register" class="ajax-auth"  action="register" method="post">
                <p class="status"></p>
                <?php wp_nonce_field('ajax-register-nonce', 'signonsecurity'); ?>
                
                <div class="input-container">
                    <input class="required" type="text" id="signonname" name="signonname" required="required" autocomplete="off" placeholder="<?php esc_attr_e('Username', 'nominee');?>"/>
                    <div class="bar"></div>
                </div>

                <div class="input-container">
                    <input class="required email" type="email" id="email" name="email" required="required" autocomplete="off" placeholder="<?php esc_attr_e('Email', 'nominee');?>"/>
                    <div class="bar"></div>
                </div>

                <div class="input-container">
                    <input class="required" type="password" id="signonpassword" name="signonpassword" required="required" autocomplete="off" placeholder="<?php esc_attr_e('Password', 'nominee');?>"/>
                    <div class="bar"></div>
                </div>

                <div class="input-container">
                    <input class="required" type="password" id="password2" name="password2" required="required" autocomplete="off" placeholder="<?php esc_attr_e('Repeat Password', 'nominee');?>"/>
                    <div class="bar"></div>
                </div>
                <div class="button-container">
                    <button class="submit_button btn btn-lg btn-block btn-default" type="submit"><?php esc_html_e('SIGNUP', 'nominee');?></button>
                </div>
            </form>
        </div> <!-- .card-wrapper -->
    </div> <!-- .login-wrapper -->

<?php endif;

get_footer(); ?>