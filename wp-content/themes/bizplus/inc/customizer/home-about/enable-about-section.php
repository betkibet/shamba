<?php
global $bizplus_panels;
global $bizplus_sections;
global $bizplus_settings_controls;
global $bizplus_repeated_settings_controls;
global $bizplus_customizer_defaults;

/*defaults values about options*/
$bizplus_customizer_defaults['bizplus-home-about-enable'] = 0;

/* Feature section Enable settings*/
$bizplus_sections['bizplus-home-about-button-options'] =
    array(
        'priority'       => 10,
        'title'          => __( 'Enable Option', 'bizplus' ),
        'panel'          => 'bizplus-home-about-panel',
    );

/*About section enable control*/
$bizplus_settings_controls['bizplus-home-about-enable'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-home-about-enable']
        ),
        'control' => array(
            'label'                 =>  __( 'Enable About Section', 'bizplus' ),
            'description'           =>  __( 'Enable "About Section" on checked', 'bizplus' ),
            'section'               => 'bizplus-home-about-button-options',
            'type'                  => 'checkbox',
            'priority'              => 10,
            'active_callback'       => ''
        )
    );
