<?php
global $bizplus_panels;
global $bizplus_sections;
global $bizplus_settings_controls;
global $bizplus_repeated_settings_controls;
global $bizplus_customizer_defaults;

/*defaults values*/
$bizplus_customizer_defaults['bizplus-home-portfolio-main-page'] = 1;
$bizplus_customizer_defaults['bizplus-home-portfolio-number'] = 9;
$bizplus_customizer_defaults['bizplus-home-portfolio-column'] = 3;

/*portfoliooptions*/
$bizplus_sections['bizplus-home-portfolio-options'] =
    array(
        'priority'       => 180,
        'title'          => __( 'Section settings', 'bizplus' ),
        'panel'          => 'bizplus-home-portfolio-panel',
    );



/*portfolio section main page*/
$bizplus_repeated_settings_controls['bizplus-home-portfolio-main-page'] =
    array(
        'repeated' => 1,
        'bizplus-portfolio-main-pages-ids' => array(
            'setting' =>     array(
                'default'              => $bizplus_customizer_defaults['bizplus-home-portfolio-main-page'],
            ),
            'control' => array(
                'label'                 =>  __( 'Select Main Page', 'bizplus' ),
                'description'           =>  __( 'Select main page for portfolio section', 'bizplus' ),
                'section'               => 'bizplus-home-portfolio-options',
                'type'                  => 'dropdown-pages',
                'priority'              => 40
            )
        )
    );

$bizplus_settings_controls['bizplus-home-portfolio-number'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-home-portfolio-number']
        ),
        'control' => array(
            'label'                 =>  __( 'Number Of portfolio/s', 'bizplus' ),
            'section'               => 'bizplus-home-portfolio-options',
            'type'                  => 'select',
            'choices'               => array(
                1 => __( '1', 'bizplus' ),
                2 => __( '2', 'bizplus' ),
                3 => __( '3', 'bizplus' ),
                4 => __( '4', 'bizplus' ),
                5 => __( '5', 'bizplus' ),
                6 => __( '6', 'bizplus' )
            ),
            'priority'              => 40,
            'active_callback'       => ''
        )
    );
