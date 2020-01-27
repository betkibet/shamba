<?php
global $bizplus_sections;
global $bizplus_settings_controls;
global $bizplus_repeated_settings_controls;
global $bizplus_customizer_defaults;

/*defaults values*/
$bizplus_customizer_defaults['bizplus-footer-sidebar-number'] = 3;
$bizplus_customizer_defaults['bizplus-copyright-text'] = __('All right reserved','bizplus');

$bizplus_sections['bizplus-footer-options'] =
    array(
        'priority'       => 60,
        'title'          => __( 'Footer Options', 'bizplus' ),
        'panel'          => 'bizplus-theme-options'
    );


$bizplus_settings_controls['bizplus-copyright-text'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-copyright-text'],
        ),
        'control' => array(
            'label'                 =>  __( 'Copyright Text', 'bizplus' ),
            'section'               => 'bizplus-footer-options',
            'type'                  => 'text_html',
            'priority'              => 20,
        )
    );
