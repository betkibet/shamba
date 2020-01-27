<?php
global $bizplus_panels;
global $bizplus_sections;
global $bizplus_settings_controls;
global $bizplus_repeated_settings_controls;
global $bizplus_customizer_defaults;

/*defaults values*/
$bizplus_customizer_defaults['bizplus-home-service-pages'] = 0;

/*page selection*/
$bizplus_sections['bizplus-home-service-pages'] =
    array(
        'priority'       => 40,
        'title'          => __( 'Select Service From Page', 'bizplus' ),
        'description'    => __( 'This option only work when you have selected "Page" in "Service selection Options".', 'bizplus' ),
        'panel'          => 'bizplus-home-service',
    );

/*creating setting control for bizplus-home-service-page start*/
$bizplus_repeated_settings_controls['bizplus-home-service-pages'] =
    array(
        'repeated' => 3,
        'bizplus-home-service-pages-ids' => array(
            'setting' =>     array(
                'default'              => $bizplus_customizer_defaults['bizplus-home-service-pages'],
            ),
            'control' => array(
                'label'                 =>  __( 'Select Page For Service %s', 'bizplus' ),
                'section'               => 'bizplus-home-service-pages',
                'type'                  => 'dropdown-pages',
                'priority'              => 10,
                'description'           => ''
            )
        ),
        'bizplus-home-service-pages-divider' => array(
            'control' => array(
                'section'               => 'bizplus-home-service-pages',
                'type'                  => 'message',
                'priority'              => 20,
                'description'           => '<br /><hr />'
            )
        )
    );