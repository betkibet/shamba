<?php
global $bizplus_sections;
global $bizplus_settings_controls;
global $bizplus_repeated_settings_controls;
global $bizplus_customizer_defaults;

/*defaults values*/
$bizplus_customizer_defaults['bizplus-enable-breadcrumb'] = 1;

$bizplus_sections['bizplus-breadcrumb-options'] =
    array(
        'priority'       => 30,
        'title'          => __( 'Breadcrumb Options', 'bizplus' ),
        'panel'          => 'bizplus-theme-options',
    );

$bizplus_settings_controls['bizplus-enable-breadcrumb'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-enable-breadcrumb'],
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Breadcrumb', 'bizplus' ),
            'section'               => 'bizplus-breadcrumb-options',
            'type'                  => 'checkbox',
            'priority'              => 10,
        )
    );