<?php
global $bizplus_panels;
global $bizplus_sections;
global $bizplus_settings_controls;
global $bizplus_repeated_settings_controls;
global $bizplus_customizer_defaults;

/*defaults values callback options*/
$bizplus_customizer_defaults['bizplus-callback-enable'] = 0;
$bizplus_customizer_defaults['bizplus-callback-page'] = 0;

/* Feature section Enable settings*/
$bizplus_sections['bizplus-callback-options'] =
    array(
        'priority'       => 10,
        'title'          => __( 'Section Options', 'bizplus' ),
        'panel'          => 'bizplus-callback-panel',
    );

/*callback section enable control*/
$bizplus_settings_controls['bizplus-callback-enable'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-callback-enable']
        ),
        'control' => array(
            'label'                 =>  __( 'Enable callback Section', 'bizplus' ),
            'description'           =>  __( 'Enable "callback Section" on checked', 'bizplus' ),
            'section'               => 'bizplus-callback-options',
            'type'                  => 'checkbox',
            'priority'              => 10,
            'active_callback'       => ''
        )
    );


    /*creating setting control for bizplus-callback-page start*/
    $bizplus_settings_controls['bizplus-callback-page'] =
        array(
                'setting' =>     array(
                    'default'              => $bizplus_customizer_defaults['bizplus-callback-page'],
                    ),
                'control' => array(
                    'label'                 =>  __( 'Select Page For callback Section', 'bizplus' ),
                    'description'           => '',
                    'section'               => 'bizplus-callback-options',
                    'type'                  => 'dropdown-pages',
                    'priority'              => 20
                )
        );
