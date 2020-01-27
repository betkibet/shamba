<?php
global $bizplus_panels;
global $bizplus_sections;
global $bizplus_settings_controls;
global $bizplus_repeated_settings_controls;
global $bizplus_customizer_defaults;

/*creating panel for fonts-setting*/
$bizplus_panels['bizplus-fonts'] =
    array(
        'title'          => __( 'Font Setting', 'bizplus' ),
        'priority'       => 43
    );

/*font array*/
global $bizplus_google_fonts;
$bizplus_google_fonts = array(
    'Archivo+Narrow:400,400italic,700' => 'Archivo Narrow',
    'Bitter:400,400italic,700' => 'Bitter',
    'Cookie' => 'Cookie',
    'Exo:400,300,400italic,600,800' => 'Exo',
    'Kreon:400,300,700' => 'Kreon',
    'Lato:400,300,400italic,900,700' => 'Lato',
    'News+Cycle:400,700' => 'News Cycle',
    'Montserrat:400,700' => 'Montserrat',
    'Oxygen:400,300,700' => 'Oxygen',
    'Playball' => 'Playball',
    'Ropa+Sans:400,400italic' => 'Ropa Sans',
    'Squada+One' => 'Squada One',
    'Tangerine:400,700' => 'Tangerine',
    'Ubuntu:400,400italic,500,700' => 'Ubuntu',
    'Varela+Round' => 'Varela Round',
    'Yanone+Kaffeesatz:400,300,700' => 'Yanone Kaffeesatz',
);

/*defaults values*/
$bizplus_customizer_defaults['bizplus-font-family-Primary'] = 'Lato:400,300,400italic,900,700';
$bizplus_customizer_defaults['bizplus-font-family-site-identity'] = 'Montserrat:400,700';
$bizplus_customizer_defaults['bizplus-font-family-title'] = 'Montserrat:400,700';
$bizplus_customizer_defaults['bizplus-font-family-subtitle'] = 'Cookie';


/*section*/
$bizplus_sections['bizplus-family'] =
    array(
        'priority'       => 20,
        'title'          => __( 'Font Family', 'bizplus' ),
        'panel'          => 'bizplus-fonts',
    );

/*setting - controls*/
$bizplus_settings_controls['bizplus-font-family-Primary'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-font-family-Primary'],
            
        ),
        'control' => array(
            'label'                 => __( 'Body ( paragraph ) Primary', 'bizplus' ),
            'description'           => __( 'change primary font family', 'bizplus' ),
            'section'               => 'bizplus-family',
            'type'                  => 'select',
            'choices'               => $bizplus_google_fonts,
            'priority'              => 5,
            'active_callback'       => ''
        )
    );

$bizplus_settings_controls['bizplus-font-family-site-identity'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-font-family-site-identity'],
            
        ),
        'control' => array(
            'label'                 => __( 'Site Identity/Logo', 'bizplus' ),
            'description'           => __( 'Site Identity font family', 'bizplus' ),
            'section'               => 'bizplus-family',
            'type'                  => 'select',
            'choices'               => $bizplus_google_fonts,
            'priority'              => 10,
            'active_callback'       => ''
        )
    );