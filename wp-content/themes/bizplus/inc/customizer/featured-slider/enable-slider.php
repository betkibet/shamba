<?php
global $bizplus_panels;
global $bizplus_sections;
global $bizplus_settings_controls;
global $bizplus_repeated_settings_controls;
global $bizplus_customizer_defaults;

/*defaults values feature portfolio options*/
$bizplus_customizer_defaults['bizplus-feature-slider-enable'] = 0;

/*feature slider enable setting*/
$bizplus_sections['bizplus-feature-section-enable-setting'] =
    array(
        'priority'       => 10,
        'title'          => __( 'Enable Options', 'bizplus' ),
        'panel'          => 'bizplus-featured-slider',
    );

/*Feature section enable control*/
$bizplus_settings_controls['bizplus-feature-slider-enable'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-feature-slider-enable']
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Feature Slider', 'bizplus' ),
            'section'               => 'bizplus-feature-section-enable-setting',
        	'description'    		=> __( 'Enable "Feature slider" on checked' , 'bizplus' ),
            'type'                  => 'checkbox',
            'priority'              => 10,
            'active_callback'       => ''
        )
    );