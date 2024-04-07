<?php
//about theme info
add_action( 'admin_menu', 'political_campaign_gettingstarted' );
function political_campaign_gettingstarted() {
	add_theme_page( esc_html__('About Political Campaign', 'political-campaign'), esc_html__('About Political Campaign', 'political-campaign'), 'edit_theme_options', 'political_campaign_guide', 'political_campaign_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function political_campaign_admin_theme_style() {
	wp_enqueue_style('political-campaign-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
	wp_enqueue_script('political-campaign-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'political_campaign_admin_theme_style');

//guidline for about theme
function political_campaign_mostrar_guide() { 
	//custom function about theme customizer
	$political_campaign_return = add_query_arg( array()) ;
	$political_campaign_theme = wp_get_theme( 'political-campaign' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to Political Campaign', 'political-campaign' ); ?> <span class="version"><?php esc_html_e( 'Version', 'political-campaign' ); ?>: <?php echo esc_html($political_campaign_theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','political-campaign'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy Political Campaign at 20% Discount','political-campaign'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','political-campaign'); ?> ( <span><?php esc_html_e('vwpro20','political-campaign'); ?></span> ) </h4>
			<div class="info-link">
				<a href="<?php echo esc_url( POLITICAL_CAMPAIGN_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'political-campaign' ); ?></a>
			</div>
		</div>
   	</div>

    <div class="tab-sec">
    	<div class="tab">
			<button class="tablinks" onclick="political_campaign_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'political-campaign' ); ?></button>
			<button class="tablinks" onclick="political_campaign_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'political-campaign' ); ?></button>
			<button class="tablinks" onclick="political_campaign_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'political-campaign' ); ?></button>
			<button class="tablinks" onclick="political_campaign_open_tab(event, 'product_addons_editor')"><?php esc_html_e( 'Woocommerce Product Addons', 'political-campaign' ); ?></button>
			<button class="tablinks" onclick="political_campaign_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'political-campaign' ); ?></button>
		  	<button class="tablinks" onclick="political_campaign_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'political-campaign' ); ?></button>
		</div>

		<?php
			$political_campaign_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$political_campaign_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = Political_Campaign_Plugin_Activation_Settings::get_instance();
				$political_campaign_actions = $plugin_ins->recommended_actions;
				?>
				<div class="political-campaign-recommended-plugins">
				    <div class="political-campaign-action-list">
				        <?php if ($political_campaign_actions): foreach ($political_campaign_actions as $key => $political_campaign_actionValue): ?>
				                <div class="political-campaign-action" id="<?php echo esc_attr($political_campaign_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($political_campaign_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($political_campaign_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($political_campaign_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','political-campaign'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($political_campaign_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'political-campaign' ); ?></h3>
				<hr class="h3hr">
				<p><?php esc_html_e('Political Campaign is a theme based on nation’s welfare. It is made by our professional team for political parties, social movements, NGO’s, crowd-funding campaigns, and other politics related websites. If you’re new in this field the theme will help you create an effortless website. As it comes completely responsive and our professional team has added everything and every feature a political campaign needs. The theme is a welfare niche theme were anyone can help the nation thru their charity work and it is also ideal for political, election and other social movements Political Campaign, Super PAC, Candidate, Organization, Political Party, politicians, political action committee, republican and political event Interest Group websites. Our theme is elegant and our experts has combined sophisticated features and sections. Such as CTA, personalization options, testimonial section, Banner, Team, and many more. The political campaign theme is clean coded even a newbie who don’t have any knowledge about codes can also easy use it. This responsive multipurpose theme can be used by any websites as it is customizable. Effortless changing can be done. The theme have different sections for different uses as a result every thing will stay organized. Moreover, it is a interactive, stunning theme. Demo: https://www.vwthemes.net/political-campaign/','political-campaign'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'political-campaign' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'political-campaign' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( POLITICAL_CAMPAIGN_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'political-campaign' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'political-campaign'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'political-campaign'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'political-campaign'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'political-campaign'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'political-campaign'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( POLITICAL_CAMPAIGN_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'political-campaign'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'political-campaign'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'political-campaign'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( POLITICAL_CAMPAIGN_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'political-campaign'); ?></a>
					</div>

					<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'political-campaign' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','political-campaign'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=political_campaign_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','political-campaign'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=political_campaign_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','political-campaign'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=political_campaign_Campaign_priciples_section') ); ?>" target="_blank"><?php esc_html_e('Campaign Section','political-campaign'); ?></a>
								</div>
							</div>
						
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','political-campaign'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','political-campaign'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=political_campaign_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','political-campaign'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=political_campaign_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','political-campaign'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','political-campaign'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','political-campaign'); ?></p>
                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','political-campaign'); ?></span><?php esc_html_e(' Go to ','political-campaign'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','political-campaign'); ?></b></p>
                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','political-campaign'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','political-campaign'); ?></span><?php esc_html_e(' Go to ','political-campaign'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','political-campaign'); ?></b></p>
				  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','political-campaign'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
                  	<p><?php esc_html_e(' Once you are done with setup, then follow the','political-campaign'); ?> <a class="doc-links" href="<?php echo esc_url( POLITICAL_CAMPAIGN_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation','political-campaign'); ?></a></p>
			  	</div>
			</div>
		</div>

			<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = political_campaign_Plugin_Activation_Settings::get_instance();
			$political_campaign_actions = $plugin_ins->recommended_actions;
			?>
				<div class="political-campaign-recommended-plugins">
				    <div class="political-campaign-action-list">
				        <?php if ($political_campaign_actions): foreach ($political_campaign_actions as $key => $political_campaign_actionValue): ?>
				                <div class="political-campaign-action" id="<?php echo esc_attr($political_campaign_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($political_campaign_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($political_campaign_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($political_campaign_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','political-campaign'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($political_campaign_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'political-campaign' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','political-campaign'); ?></p>
	              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon ','political-campaign'); ?></span></b></p>
	              	<div class="political-campaign-pattern-page">
				    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','political-campaign'); ?></a>
				    </div>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern1.png" alt="" />
	              	 <p><b><?php esc_html_e('Click on Patterns Tab >> Click on Theme Name >> Click on Section >> Publish.','political-campaign'); ?></span></b></p>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />
	            </div>

	            <div class="block-pattern-link-customizer">
					<h3><?php esc_html_e( 'Link to customizer', 'political-campaign' ); ?></h3>
					<hr class="h3hr">
					<div class="first-row">
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','political-campaign'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=political_campaign_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','political-campaign'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','political-campaign'); ?></a>
							</div>
							
							<div class="row-box2">
								<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=political_campaign_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','political-campaign'); ?></a>
							</div>
						</div>
						
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=political_campaign_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','political-campaign'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','political-campaign'); ?></a>
							</div> 
						</div>
					</div>
				</div>		
					
	        </div>
		</div>
		
		
		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = Political_Campaign_Plugin_Activation_Settings::get_instance();
			$political_campaign_actions = $plugin_ins->recommended_actions;
			?>
				<div class="political-campaign-recommended-plugins">
				    <div class="political-campaign-action-list">
				        <?php if ($political_campaign_actions): foreach ($political_campaign_actions as $key => $political_campaign_actionValue): ?>
				                <div class="political-campaign-action" id="<?php echo esc_attr($political_campaign_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($political_campaign_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($political_campaign_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($political_campaign_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'political-campaign' ); ?></h3>
				<hr class="h3hr">
				<div class="political-campaign-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','political-campaign'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
	              	<div class="link-customizer-with-block-pattern">
						<h3><?php esc_html_e( 'Link to customizer', 'political-campaign' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','political-campaign'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=political_campaign_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','political-campaign'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','political-campaign'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=political_campaign_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','political-campaign'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=political_campaign_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','political-campaign'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','political-campaign'); ?></a>
								</div> 
							</div>
						</div>
					</div>	
				</div>
			<?php } ?>
		</div>

			<div id="product_addons_editor" class="tabcontent">
			<?php if(!class_exists('IEPA_Loader')){
				$plugin_ins = political_campaign_Plugin_Activation_Woo_Products::get_instance();
				$political_campaign_actions = $plugin_ins->recommended_actions;
				?>
				<div class="political-campaign-recommended-plugins">
					    <div class="political-campaign-action-list">
					        <?php if ($political_campaign_actions): foreach ($political_campaign_actions as $key => $political_campaign_actionValue): ?>
					                <div class="political-campaign-action" id="<?php echo esc_attr($political_campaign_actionValue['id']);?>">
				                        <div class="action-inner plugin-activation-redirect">
				                            <h3 class="action-title"><?php echo esc_html($political_campaign_actionValue['title']); ?></h3>
				                            <div class="action-desc"><?php echo esc_html($political_campaign_actionValue['desc']); ?></div>
				                            <?php echo wp_kses_post($political_campaign_actionValue['link']); ?>
				                        </div>
					                </div>
					            <?php endforeach;
					        endif; ?>
					    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Woocommerce Products Blocks', 'political-campaign' ); ?></h3>
				<hr class="h3hr">
				<div class="political-campaign-pattern-page">
					<p><?php esc_html_e('Follow the below instructions to setup Products Templates.','political-campaign'); ?></p>
					<p><b><?php esc_html_e('1. First you need to activate these plugins','political-campaign'); ?></b></p>
						<p><?php esc_html_e('1. Ibtana - WordPress Website Builder ','political-campaign'); ?></p>
						<p><?php esc_html_e('2. Ibtana - Ecommerce Product Addons.','political-campaign'); ?></p>
						<p><?php esc_html_e('3. Woocommerce','political-campaign'); ?></p>

					<p><b><?php esc_html_e('2. Go To Dashboard >> Ibtana Settings >> Woocommerce Templates','political-campaign'); ?></span></b></p>
	              	<div class="political-campaign-pattern-page">
			    		<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-woocommerce-templates&ive_wizard_view=parent' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Woocommerce Templates','political-campaign'); ?></a>
			    	</div>
	              	<p><?php esc_html_e('You can create a template as you like.','political-campaign'); ?></span></p>
			    </div>
			<?php } ?>
		</div>

		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'political-campaign' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('Halloween Party WordPress Theme is a cool horror theme made for haunted event websites, a Halloween Picture Contest, Spooky sounds theatres, horror or monster-based site, or Horror Halloween Events. Even Halloween merchandise, writers, artists, t-shirt printers, bloggers, and musicians can use this theme. This theme is entertaining and spooky horror to attract new visitors and make them stay on your site. It is a responsive and retina-ready theme, so you can operate your website from anywhere let, whether it is desktop or tablet. Our theme will adjust according to the size of the screen. The Halloween party WordPress theme is our most fast-loading theme. The theme also comes with different sections like Enable-Disable sections, Custom Sections, Home Page Sections, and many more. It has 100+ font family options with simple menu options. The theme comes with Footer and header with customization options. This WP theme is well sanitized as per WordPress standards, so there is no doubt in lacking in any aspect.','political-campaign'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( POLITICAL_CAMPAIGN_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'political-campaign'); ?></a>
					<a href="<?php echo esc_url( POLITICAL_CAMPAIGN_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'political-campaign'); ?></a>
					<a href="<?php echo esc_url( POLITICAL_CAMPAIGN_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'political-campaign'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'political-campaign' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'political-campaign'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'political-campaign'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'political-campaign'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'political-campaign'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'political-campaign'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'political-campaign'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'political-campaign'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'political-campaign'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'political-campaign'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'political-campaign'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'political-campaign'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'political-campaign'); ?></td>
								<td class="table-img"><?php esc_html_e('10', 'political-campaign'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'political-campaign'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'political-campaign'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'political-campaign'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'political-campaign'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'political-campaign'); ?></td>
								<td class="table-img"><?php esc_html_e('12', 'political-campaign'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'political-campaign'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'political-campaign'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'political-campaign'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'political-campaign'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'political-campaign'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'political-campaign'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'political-campaign'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'political-campaign'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'political-campaign'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Donation Feature', 'political-campaign'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Membership Form', 'political-campaign'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'political-campaign'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'political-campaign'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'political-campaign'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'political-campaign'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'political-campaign'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'political-campaign'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'political-campaign'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'political-campaign'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'political-campaign'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'political-campaign'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'political-campaign'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'political-campaign'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'political-campaign'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'political-campaign'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'political-campaign'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'political-campaign'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'political-campaign'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'political-campaign'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'political-campaign'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'political-campaign'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'political-campaign'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'political-campaign'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('WordPress 6.4 or later', 'political-campaign'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('PHP 8.2 or 8.3', 'political-campaign'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('MySQL 5.6 (or greater) | MariaDB 10.0 (or greater)', 'political-campaign'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( POLITICAL_CAMPAIGN_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'political-campaign'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'political-campaign'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'political-campaign'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( POLITICAL_CAMPAIGN_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'political-campaign'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'political-campaign'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'political-campaign'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( POLITICAL_CAMPAIGN_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'political-campaign'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'political-campaign'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'political-campaign'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( POLITICAL_CAMPAIGN_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'political-campaign'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'political-campaign'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'political-campaign'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( POLITICAL_CAMPAIGN_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','political-campaign'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'political-campaign'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'political-campaign'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( POLITICAL_CAMPAIGN_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'political-campaign'); ?></a>
				</div>
		  	</div>
		</div>

	</div>
</div>

<?php } ?>