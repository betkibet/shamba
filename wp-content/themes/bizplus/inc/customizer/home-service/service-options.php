<?php
global $bizplus_panels;
global $bizplus_sections;
global $bizplus_settings_controls;
global $bizplus_repeated_settings_controls;
global $bizplus_customizer_defaults;

/*defaults values*/
$bizplus_customizer_defaults['bizplus-home-service-main-page'] = 1;
$bizplus_customizer_defaults['bizplus-home-service-single-words'] = 30;
$bizplus_customizer_defaults['bizplus-home-service-button-text'] = __('Browse more services','bizplus');
$bizplus_customizer_defaults['bizplus-home-service-button-link'] = '';
$bizplus_customizer_defaults['bizplus-home-service-enable-single-link'] = 1;
$bizplus_customizer_defaults['bizplus-home-service-selection'] = 'from-page';
$bizplus_customizer_defaults['bizplus-home-service-number'] = 3;

/*serviceoptions*/
$bizplus_sections['bizplus-home-service-options'] =
    array(
        'priority'       => 35,
        'title'          => __( 'Service Options', 'bizplus' ),
        'panel'          => 'bizplus-home-service',
    );

/*service section main page*/
$bizplus_repeated_settings_controls['bizplus-home-service-main-page'] =
    array(
        'repeated' => 1,
        'bizplus-service-main-pages-ids' => array(
            'setting' =>     array(
                'default'              => $bizplus_customizer_defaults['bizplus-home-service-main-page'],
            ),
            'control' => array(
                'label'                 =>  __( 'Select Main Page', 'bizplus' ),
                'description'           =>  __( 'Select main page for service section', 'bizplus' ),
                 'section'               => 'bizplus-home-service-options',
                'type'                  => 'dropdown-pages',
                'priority'              => 40
            )
        )
    );

$bizplus_settings_controls['bizplus-home-service-number'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-home-service-number']
        ),
        'control' => array(
            'label'                 =>  __( 'Number of Service/s', 'bizplus' ),
            'section'               => 'bizplus-home-service-options',
            'type'                  => 'select',
            'choices'               => array(
                1 => __( '1', 'bizplus' ),
                2 => __( '2', 'bizplus' ),
                3 => __( '3', 'bizplus' )
            ),
            'priority'              => 25,
            'active_callback'       => ''
        )
    );

$bizplus_settings_controls['bizplus-home-service-single-words'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-home-service-single-words']
        ),
        'control' => array(
            'label'                 =>  __( 'Number Of Words in Single Column Content', 'bizplus' ),
            'description'           =>  __( 'If you do not have selected from - Custom', 'bizplus' ),
            'section'               => 'bizplus-home-service-options',
            'type'                  => 'number',
            'priority'              => 30,
            'input_attrs' => array( 'min' => 1, 'max' => 200),
            'active_callback'       => ''
        )
    );

$bizplus_settings_controls['bizplus-home-service-button-text'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-home-service-button-text']
        ),
        'control' => array(
            'label'                 =>  __( 'Browse All Button Text', 'bizplus' ),
            'section'               => 'bizplus-home-service-options',
            'type'                  => 'text',
            'priority'              => 40,
            'active_callback'       => ''
        )
    );

$bizplus_settings_controls['bizplus-home-service-button-link'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-home-service-button-link']
        ),
        'control' => array(
            'label'                 =>  __( 'Browse All Button Link', 'bizplus' ),
            'section'               => 'bizplus-home-service-options',
            'type'                  => 'url',
            'priority'              => 50,
            'active_callback'       => ''
        )
    );