<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start();

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    $donate_currency = '$';
    if (nominee_option('donate-currency') == false) {
        $donate_currency = nominee_option('donate-custom-currency');
    }

    $donate_currency_code = 'USD';

    if (nominee_option('donate-currency-code') == false) {
        $donate_currency_code = nominee_option('donate-custom-currency-code');
    }

    $donation500 = nominee_option('donate-amount-500');
    $donation200 = nominee_option('donate-amount-200');
    $donation100 = nominee_option('donate-amount-100');
    $donation50 = nominee_option('donate-amount-50');

    $amount_field = 'amount';

    if (nominee_option('paypal-type') == 'pro') :
        $amount_field = 'donationAmount';
    endif;
    
?>

<div class="tt-paypal-donation paypal-donation-short <?php echo esc_attr($tt_atts['el_class'].' '.$css_class.' '.$tt_atts['form-style']); ?>">
    <form class="paypal-donate-form clearfix" action="https://www.paypal.com/cgi-bin/webscr" method="post">
        <div class="donate-amount btn-group" data-toggle="buttons">
            <?php if ($donation500): ?>
                <label class="btn amount-button">
                    <input name="<?php echo esc_attr($amount_field);?>" value="<?php echo esc_attr($donation500); ?>" type="radio"><?php echo esc_html($donate_currency.''.$donation500);?>
                </label>
            <?php endif;?>
            
            <?php if ($donation200): ?>
                <label class="btn amount-button">
                    <input name="<?php echo esc_attr($amount_field);?>" value="<?php echo esc_attr($donation200); ?>" type="radio"><?php echo esc_html($donate_currency.''.$donation200);?>
                </label>
            <?php endif; ?>

            <?php if ($donation100): ?>
                <label class="btn amount-button">
                    <input name="<?php echo esc_attr($amount_field);?>" value="<?php echo esc_attr($donation100); ?>" type="radio"><?php echo esc_html($donate_currency.''.$donation100);?>
                </label>
            <?php endif; ?>

            <?php if ($donation50): ?>
                <label class="btn amount-button">
                    <input name="<?php echo esc_attr($amount_field);?>" value="<?php echo esc_attr($donation50); ?>" type="radio"><?php echo esc_html($donate_currency.''.$donation50);?>
                </label>
            <?php endif; ?>

            <input class="others-amount form-control" type="text" value="<?php echo esc_attr(nominee_option('donate-amount', false, false));?>" name="<?php echo esc_attr($amount_field);?>" placeholder="<?php esc_attr_e('More', 'nominee');?>">
        </div>

        <button class="btn btn-primary btn-xl" type="submit" name="submit"><?php echo esc_html(nominee_option('submit-button-text', false, true))?></button>
    </form> <!-- .paypal-donate-form -->
</div> <!-- .tt-paypal-donation -->

<?php echo ob_get_clean();