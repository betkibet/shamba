<?php
global $bizplus_panels;
global $bizplus_sections;
global $bizplus_settings_controls;
global $bizplus_repeated_settings_controls;
global $bizplus_customizer_defaults;

/*defaults values*/
$bizplus_customizer_defaults['bizplus-home-blog-button-text'] = __('Browse more','bizplus');
$bizplus_customizer_defaults['bizplus-home-blog-button-link'] = '';

/*aboutoptions*/
$bizplus_sections['bizplus-home-blog-option-button'] =
    array(
        'priority'       => 180,
        'title'          => __( 'Buttton settings', 'bizplus' ),
        'panel'          => 'bizplus-home-blog-panel',
    );

$bizplus_settings_controls['bizplus-home-blog-button-text'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-home-blog-button-text']
        ),
        'control' => array(
            'label'                 =>  __( 'Browse All Button Text', 'bizplus' ),
            'section'               => 'bizplus-home-blog-option-button',
            'type'                  => 'text',
            'priority'              => 60,
            'active_callback'       => ''
        )
    );

$bizplus_settings_controls['bizplus-home-blog-button-link'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-home-blog-button-link']
        ),
        'control' => array(
            'label'                 =>  __( 'Browse All Button Link', 'bizplus' ),
            'section'               => 'bizplus-home-blog-option-button',
            'type'                  => 'url',
            'priority'              => 70,
            'active_callback'       => ''
        )
    );