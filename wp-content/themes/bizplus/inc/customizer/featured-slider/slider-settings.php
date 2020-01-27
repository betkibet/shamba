<?php
global $bizplus_panels;
global $bizplus_sections;
global $bizplus_settings_controls;
global $bizplus_repeated_settings_controls;
global $bizplus_customizer_defaults;

/*defaults values*/
$bizplus_customizer_defaults['bizplus-featured-slider-number'] = 3;
$bizplus_customizer_defaults['bizplus-featured-slider-selection'] = 'from-page';

/*feature slider setting*/
$bizplus_sections['bizplus-featured-slider-selection-setting'] =
    array(
        'priority'       => 20,
        'title'          => __( 'Settings Options', 'bizplus' ),
        'panel'          => 'bizplus-featured-slider',
    );

/*No of feature slider selection*/
$bizplus_settings_controls['bizplus-featured-slider-number'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-featured-slider-number']
        ),
        'control' => array(
            'label'                 =>  __( 'Number Of Slider', 'bizplus' ),
            'section'               => 'bizplus-featured-slider-selection-setting',
            'type'                  => 'select',
            'choices'               => array(
                1 => __( '1', 'bizplus' ),
                2 => __( '2', 'bizplus' ),
                3 => __( '3', 'bizplus' )
            ),
            'priority'              => 10,
            'active_callback'       => ''
        )
    );
