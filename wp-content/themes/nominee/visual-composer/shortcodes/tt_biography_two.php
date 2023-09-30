<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;
    
$tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$tt_custom_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

ob_start();
?>

<div class="party-leader-wrapper biography-two <?php echo esc_attr($tt_atts['el_class'].' '.$tt_custom_css); ?>">
    <div class="leader-basic-info">
        <div class="row">
            <div class="col-lg-8">
                <div class="biography-info-wrapper">
                    <div class="leader-name">
                        <?php if ($tt_atts['intro_text']): ?>
                            <p><?php echo esc_html($tt_atts['intro_text']); ?></p>
                        <?php endif; ?>

                        <?php if ($tt_atts['title']): ?>
                            <h2><?php echo esc_html($tt_atts['title']); ?></h2>
                        <?php endif; ?>
                    </div>
                    <div class="bio-details">
                        <?php echo wpb_js_remove_wpautop($content, true); ?>
                    </div>
                    <div class="bio-info">
                        <ul>
                            <?php
                                $bio_info = (array)vc_param_group_parse_atts($tt_atts['bio_info']);
                                $bio_info_data = array();
                                foreach ($bio_info as $data) :
                                    $tt_bio_info = $data;
                                    $tt_bio_info['label'] = isset($data['label']) ? $data['label'] : '';
                                    $tt_bio_info['value'] = isset($data['value']) ? $data['value'] : '';
                                    $bio_info_data[] = $tt_bio_info;
                                endforeach;
                            ?>

                            <?php foreach ($bio_info_data as $info): ?>
                                <li><span><?php echo esc_html($info['label'])?></span><?php echo esc_html($info['value'])?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    
                    <?php $image_src = wp_get_attachment_image_src($tt_atts['leader_sign'], 'medium' ); 
                    
                    if ($image_src[ 0 ]) : ?>
                        <div class="leader-sign">
                            <img class="img-responsive" src="<?php echo esc_url( $image_src[ 0 ] ); ?>" alt="<?php echo esc_attr($tt_atts['title']); ?>">
                        </div>
                    <?php endif; ?>

                    <div class="leader-social-profile team-social">
                        <?php if ($tt_atts['social_intro']): ?>
                            <p><?php echo esc_html($tt_atts['social_intro']); ?></p>
                        <?php endif; ?>

                        <ul class="list-inline">
                            <?php
                            $social_info = (array)vc_param_group_parse_atts($tt_atts['social_icon']);
                            $social_info_data = array();
                            foreach ($social_info as $data) :
                                $tt_social_info = $data;
                                $tt_social_info['fontawesome_icon'] = isset($data['fontawesome_icon']) ? $data['fontawesome_icon'] : '';

                                $tt_social_info['link'] = isset($data['link']) ? $data['link'] : '';

                                $social_info_data[] = $tt_social_info;
                            endforeach; ?>

                            <?php foreach ($social_info_data as $info): ?>
                                <li><a href="<?php echo esc_url($info['link']); ?>"><i class="<?php echo esc_attr($info['fontawesome_icon']);?>"></i></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div> <!-- .leader-social-profile -->


                    <div class="experience-info">
                        <div class="political-career-wrapper">
                            <div class="career-label">
                                <?php if ($tt_atts['career_label']): ?>
                                    <h2><?php echo esc_html($tt_atts['career_label']); ?></h2>
                                <?php endif; ?>

                                <?php if ($tt_atts['career_description']): ?>
                                    <p><?php echo esc_html($tt_atts['career_description']); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="career-carousel owl-carousel">
                                
                                <?php
                                    $career_info = (array)vc_param_group_parse_atts($tt_atts['career_info']);
                                    $career_info_data = array();
                                    foreach ($career_info as $data) :
                                        $tt_career_info = $data;
                                        $tt_career_info['career_title'] = isset($data['career_title']) ? $data['career_title'] : '';
                                        $tt_career_info['career_period'] = isset($data['career_period']) ? $data['career_period'] : '';

                                        $career_info_data[] = $tt_career_info;
                                    endforeach;
                                ?>
                                <?php foreach ($career_info_data as $info): ?>
                                    <div class="item">
                                        <i class="fa fa-circle-o"></i>
                                        <?php if ($info['career_title']) : ?>
                                            <h4><?php echo esc_html($info['career_title']);?></h4>
                                        <?php endif; ?>
                                        
                                        <?php if ($info['career_period']) : ?>
                                            <span><?php echo esc_html($info['career_period']);?></span>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach ?>
                                
                            </div> <!-- .career-carousel -->
                        </div> <!-- .political-career-wrapper -->

                        <div class="educational-experience">
                            <div class="education-label">
                                <?php if ($tt_atts['education_label']): ?>
                                    <h2><?php echo esc_html($tt_atts['education_label']); ?></h2>
                                <?php endif; ?>

                                <?php if ($tt_atts['education_description']): ?>
                                    <p><?php echo esc_html($tt_atts['education_description']); ?></p>
                                <?php endif; ?>
                            </div>

                            <div class="education-info-wrapper">
                                <?php
                                    $education_info = (array)vc_param_group_parse_atts($tt_atts['education_info']);
                                    $education_info_data = array();
                                    foreach ($education_info as $data) :
                                        $tt_education_info = $data;
                                        $tt_education_info['exam_name'] = isset($data['exam_name']) ? $data['exam_name'] : '';
                                        $tt_education_info['organization_name'] = isset($data['organization_name']) ? $data['organization_name'] : '';
                                        $tt_education_info['academic_year'] = isset($data['academic_year']) ? $data['academic_year'] : '';
                                        $tt_education_info['education_description'] = isset($data['education_description']) ? $data['education_description'] : '';

                                        $education_info_data[] = $tt_education_info;
                                    endforeach;
                                ?>

                                <?php foreach ($education_info_data as $info): ?>
                                    <div class="edu-single-info">
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <?php if ($info['academic_year']) : ?>
                                                    <div class="academic-year">
                                                        <span>(<?php echo esc_html($info['academic_year'])?>)</span>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-lg-10">
                                                <?php if ($info['exam_name']): ?>
                                                    <h3><?php echo esc_html($info['exam_name'])?></h3>
                                                <?php endif ?>
                                                
                                                <?php if ($info['organization_name']): ?>
                                                    <span class="org-name"><?php echo esc_html($info['organization_name'])?></span>
                                                <?php endif ?>
                                                
                                                <?php if ($info['education_description']): ?>
                                                    <div class="education-details">
                                                        <p><?php echo esc_html($info['education_description']);?></p>
                                                    </div>
                                                <?php endif ?>
                                            </div>
                                        </div> <!-- .row -->
                                    </div>
                                    
                                <?php endforeach ?>
                            </div> <!-- .education-info-wrapper -->
                        </div> <!-- .educational-experience -->
                    </div> <!-- .experience-info -->

                    <div class="leader-quote">
                        <?php if ($tt_atts['leader_quote']): ?>
                            <blockquote><?php echo esc_html($tt_atts['leader_quote']); ?></blockquote>
                        <?php endif; ?>
                        
                        <?php if ($tt_atts['others_description']): ?>
                            <p><?php echo esc_html($tt_atts['others_description']); ?></p>
                        <?php endif; ?>

                        <?php if ($tt_atts['others_description_two']): ?>
                            <p><?php echo esc_html($tt_atts['others_description_two']); ?></p>
                        <?php endif; ?>
                    </div>
                </div> <!-- .biography-info-wrapper -->
            </div> <!-- .col-md-9 -->
    
            
            <?php $image_src = wp_get_attachment_image_src($tt_atts['leader_photo'], 'tt-leader-thumb' ); 

            if ($image_src[ 0 ]) : ?>
                <div class="col-lg-4">
                    <div class="leader-image">
                        <img class="img-responsive" src="<?php echo esc_url( $image_src[ 0 ] ); ?>" alt="<?php echo esc_attr($tt_atts['title']); ?>">
                    </div>
                </div>
            <?php endif; ?>

        </div> <!-- .row -->
    </div> <!-- .leader-basic-info -->

</div><!-- .party-leader-wrapper -->
<?php echo ob_get_clean();