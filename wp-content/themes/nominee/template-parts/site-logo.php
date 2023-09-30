<h1>
    <a href="<?php echo esc_url(site_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
        <?php if (nominee_option('logo-type', false, 'logo')) : 

            // site logo
            $site_logo = nominee_option('logo', 'url', get_template_directory_uri() . '/images/logo.png');
            $site_mobile_logo = nominee_option('logo', 'url', $site_logo);

            if (nominee_option('mobile-logo')) :
                $site_mobile_logo = nominee_option('mobile-logo', 'url', $site_logo);
            endif; ?>

            <img class="hidden-xs" src="<?php echo esc_url($site_logo) ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>
            <img class="visible-xs" src="<?php echo esc_url($site_mobile_logo) ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>
        <?php else : ?>
            <?php if (nominee_option('text-logo')) :
                echo esc_html(nominee_option('text-logo'));
            else :
                echo esc_html(get_bloginfo('name'));
            endif; ?>
        <?php endif; ?>
    </a>
</h1>