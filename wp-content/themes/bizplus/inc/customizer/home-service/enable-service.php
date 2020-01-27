<?php
global $bizplus_panels;
global $bizplus_sections;
global $bizplus_settings_controls;
global $bizplus_repeated_settings_controls;
global $bizplus_customizer_defaults;

/*defaults values*/
$bizplus_customizer_defaults['bizplus-home-service-enable'] = 0;
$bizplus_customizer_defaults['bizplus-home-service-thumbnail-enable'] = 0;

/*servicesetting*/
$bizplus_sections['bizplus-home-service-enable-setting'] =
    array(
        'priority'       => 10,
        'title'          => __( 'Service Enable Options', 'bizplus' ),
        'panel'          => 'bizplus-home-service',
    );

$bizplus_settings_controls['bizplus-home-service-enable'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-home-service-enable']
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Service', 'bizplus' ),
            'section'               => 'bizplus-home-service-enable-setting',
            'type'                  => 'checkbox',
            'priority'              => 50,
            'active_callback'       => ''
        )
    );

$bizplus_settings_controls['bizplus-home-service-thumbnail-enable'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-home-service-thumbnail-enable']
        ),
        'control' => array(
            'label'                 => __( 'Enable Service Thumbnail', 'bizplus' ),
            'description'           => __( 'On checking this will replace the icon on service section with thumbnail image only during the hover state of that post', 'bizplus' ),
            'section'               => 'bizplus-home-service-enable-setting',
            'type'                  => 'checkbox',
            'priority'              => 50,
            'active_callback'       => ''
        )
    );