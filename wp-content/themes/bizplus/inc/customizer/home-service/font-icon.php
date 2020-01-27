<?php
global $bizplus_panels;
global $bizplus_sections;
global $bizplus_settings_controls;
global $bizplus_repeated_settings_controls;
global $bizplus_customizer_defaults;

/*defaults values*/
$bizplus_customizer_defaults['bizplus-home-service-page-icon'] = 'fa-desktop';


/*font selection*/
$bizplus_sections['bizplus-home-service-font-icon'] =
    array(
        'priority'       => 35,
        'title'          => __( 'Service Icons', 'bizplus' ),
        'description'    => __( 'This will let you choose font icon for service page".', 'bizplus' ),
        'panel'          => 'bizplus-home-service',
    );



$bizplus_repeated_settings_controls['bizplus-home-service-font-icon'] =
    array(
        'repeated' => 3,
        'bizplus-home-service-page-icon' => array(
            'setting' =>     array(
                'default'              => $bizplus_customizer_defaults['bizplus-home-service-page-icon'],
            ),
            'control' => array(
                'label'                 =>  __( 'Icon %s', 'bizplus' ),
                'section'               => 'bizplus-home-service-font-icon',
                'type'                  => 'text',
                'priority'              => 5,
                'description'           => sprintf( __( 'Use font awesome icon: Eg: %1$s. %2$sSee more here%3$s', 'bizplus' ), 'fa-desktop','<a href="'.esc_url('http://fontawesome.io/cheatsheet/').'" target="_blank">','</a>' ),
            )
        ),
            'bizplus-home-service-font-icon-divider' => array(
                'control' => array(
                    'section'               => 'bizplus-home-service-font-icon',
                    'type'                  => 'message',
                    'priority'              => 20,
                    'description'           => '<br /><hr />'
                )
            )
        );