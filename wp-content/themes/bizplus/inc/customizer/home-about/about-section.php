<?php
global $bizplus_panels;
global $bizplus_sections;
global $bizplus_settings_controls;
global $bizplus_repeated_settings_controls;
global $bizplus_customizer_defaults;

/*defaults values about options*/
$bizplus_customizer_defaults['bizplus-home-about-main-page'] = 1;
$bizplus_customizer_defaults['bizplus-home-about-page'] = 1;
$bizplus_customizer_defaults['bizplus-home-about-single-words'] = 30;
$bizplus_customizer_defaults['bizplus-home-about-button-text'] = __('Know More','bizplus');

/* Feature section Enable settings*/
$bizplus_sections['bizplus-home-about-section-settings'] =
    array(
        'priority'       => 30,
        'title'          => __( 'Section Settings', 'bizplus' ),
        'panel'          => 'bizplus-home-about-panel',
    );



/*about section main page*/
$bizplus_repeated_settings_controls['bizplus-home-about-main-page'] =
    array(
        'repeated' => 1,
        'bizplus-about-main-pages-ids' => array(
            'setting' =>     array(
                'default'              => $bizplus_customizer_defaults['bizplus-home-about-main-page'],
            ),
            'control' => array(
                'label'                 =>  __( 'Select Main Page', 'bizplus' ),
                'description'           =>  __( 'Select main page for about section', 'bizplus' ),
                'section'               => 'bizplus-home-about-section-settings',
                'type'                  => 'dropdown-pages',
                'priority'              => 40
            )
        )
    );


/*creating setting control for bizplus-home-about-page start*/
$bizplus_repeated_settings_controls['bizplus-home-about-page'] =
    array(
        'repeated' => 1,
        'bizplus-about-pages-ids' => array(
            'setting' =>     array(
                'default'              => $bizplus_customizer_defaults['bizplus-home-about-page'],
            ),
            'control' => array(
                'label'                 =>  __( 'Select Page For About Section', 'bizplus' ),
                'description'           => '',
                'section'               => 'bizplus-home-about-section-settings',
                'type'                  => 'dropdown-pages',
                'priority'              => 40
            )
        ),
        'bizplus-about-pages-divider' => array(
            'control' => array(
                'section'               => 'bizplus-about-selection-setting',
                'type'                  => 'message',
                'priority'              => 60,
                'description'           => '<br /><hr />'
            )
        )
    );

/*String in max to be appear as description on about*/
$bizplus_settings_controls['bizplus-home-about-single-words'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-home-about-single-words']
        ),
        'control' => array(
            'label'                 =>  __( 'Number Of Words', 'bizplus' ),
            'description'           =>  __( 'Give number of words you wish to be appear on home page about section', 'bizplus' ),
            'section'               => 'bizplus-home-about-section-settings',
            'type'                  => 'number',
            'priority'              => 50,
            'input_attrs' => array( 'min' => 1, 'max' => 200),
            'active_callback'       => ''
        )
    );

/*About Button Text control*/
$bizplus_settings_controls['bizplus-home-about-button-text'] =
array(
    'setting' =>     array(
        'default'              => $bizplus_customizer_defaults['bizplus-home-about-button-text']
    ),
    'control' => array(
        'label'                 =>  __( 'About Section Button Text', 'bizplus' ),
        'section'               => 'bizplus-home-about-section-settings',
        'type'                  => 'text',
        'priority'              => 60,
        'active_callback'       => ''
    )
);

