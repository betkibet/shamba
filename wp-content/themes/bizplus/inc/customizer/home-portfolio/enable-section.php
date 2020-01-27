<?php
global $bizplus_panels;
global $bizplus_sections;
global $bizplus_settings_controls;
global $bizplus_repeated_settings_controls;
global $bizplus_customizer_defaults;

/*defaults values*/
$bizplus_customizer_defaults['bizplus-home-portfolio-enable'] = 0;

/*aboutoptions*/
$bizplus_sections['bizplus-home-enable'] =
    array(
        'priority'       => 180,
        'title'          => __( 'Enable Option', 'bizplus' ),
        'panel'          => 'bizplus-home-portfolio-panel',
    );


$bizplus_settings_controls['bizplus-home-portfolio-enable'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-home-portfolio-enable']
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Portfolio', 'bizplus' ),
            'description'           => __( 'Enable Portfolio Section" on checked' , 'bizplus' ),
            'section'               => 'bizplus-home-enable',
            'type'                  => 'checkbox',
            'priority'              => 10,
            'active_callback'       => ''
        )
    );