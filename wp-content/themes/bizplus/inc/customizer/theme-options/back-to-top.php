<?php
global $bizplus_sections;
global $bizplus_settings_controls;
global $bizplus_repeated_settings_controls;
global $bizplus_customizer_defaults;

/*defaults values*/
$bizplus_customizer_defaults['bizplus-enable-back-to-top'] = 1;

$bizplus_sections['bizplus-back-to-top-options'] =
    array(
        'priority'       => 80,
        'title'          => __( 'Back To Top Options', 'bizplus' ),
        'panel'          => 'bizplus-theme-options'
    );

$bizplus_settings_controls['bizplus-enable-back-to-top'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-enable-back-to-top'],
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Back To Top', 'bizplus' ),
            'section'               => 'bizplus-back-to-top-options',
            'type'                  => 'checkbox',
            'priority'              => 50,
        )
    );