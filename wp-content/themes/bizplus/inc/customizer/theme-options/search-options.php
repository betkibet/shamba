<?php
global $bizplus_panels;
global $bizplus_sections;
global $bizplus_settings_controls;
global $bizplus_repeated_settings_controls;
global $bizplus_customizer_defaults;

/*defaults values search options*/
$bizplus_customizer_defaults['bizplus-search-enable'] = 1;
$bizplus_customizer_defaults['bizplus-search-place-holder'] =  __('Type your text here . . . .','bizplus');


/*fs search enable setting*/
$bizplus_sections['bizplus-search-enable-setting'] =
    array(
        'priority'       => 90,
        'title'          => __( 'Search Options', 'bizplus' ),
        'panel'          => 'bizplus-theme-options',
    );

/*fs search enable controlls*/
$bizplus_settings_controls['bizplus-search-enable'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-search-enable']
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Search', 'bizplus' ),
            'section'               => 'bizplus-search-enable-setting',
            'type'                  => 'checkbox',
            'priority'              => 10,
            'active_callback'       => ''
        )
    );
