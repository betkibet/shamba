<?php
global $bizplus_panels;
global $bizplus_sections;
global $bizplus_settings_controls;
global $bizplus_repeated_settings_controls;
global $bizplus_customizer_defaults;

/*defaults values*/
$bizplus_customizer_defaults['bizplus-featured-slider-pages'] = 0;

/*page selection*/
$bizplus_sections['bizplus-feature-slider-pages'] =
    array(
        'priority'       => 40,
        'title'          => __( 'Select From Page', 'bizplus' ),
        'description'    => __( 'This option only work when you have selected "Page" in "Settings Options".', 'bizplus' ),
        'panel'          => 'bizplus-featured-slider',
    );

/*creating setting control for bizplus-fs-page start*/
$bizplus_repeated_settings_controls['bizplus-featured-slider-pages'] =
    array(
        'repeated' => 3,
        'bizplus-fs-pages-ids' => array(
            'setting' =>     array(
                'default'              => $bizplus_customizer_defaults['bizplus-featured-slider-pages'],
            ),
            'control' => array(
                'label'                 =>  __( 'Select Page For Slide %s', 'bizplus' ),
                'section'               => 'bizplus-feature-slider-pages',
                'type'                  => 'dropdown-pages',
                'priority'              => 60,
                'description'           => ''
            )
        ),
        'bizplus-fs-pages-divider' => array(
            'control' => array(
                'section'               => 'bizplus-fs-selection-setting',
                'type'                  => 'message',
                'priority'              => 60,
                'description'           => '<br /><hr />'
            )
        )
    );

