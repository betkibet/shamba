<?php
global $bizplus_panels;
global $bizplus_sections;
global $bizplus_settings_controls;
global $bizplus_repeated_settings_controls;
global $bizplus_customizer_defaults;

/*defaults values*/
$bizplus_customizer_defaults['bizplus-home-blog-enable'] = 0;

/*aboutoptions*/
$bizplus_sections['bizplus-home-blog-enable'] =
    array(
        'priority'       => 180,
        'title'          => __( 'Enable Option', 'bizplus' ),
        'panel'          => 'bizplus-home-blog-panel',
    );


$bizplus_settings_controls['bizplus-home-blog-enable'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-home-blog-enable']
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Blog', 'bizplus' ),
            'description'           => __( 'Enable "Blog Section" on checked' , 'bizplus' ),
            'section'               => 'bizplus-home-blog-enable',
            'type'                  => 'checkbox',
            'priority'              => 10,
            'active_callback'       => ''
        )
    );