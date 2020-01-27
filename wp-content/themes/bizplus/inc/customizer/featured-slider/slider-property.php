<?php
global $bizplus_panels;
global $bizplus_sections;
global $bizplus_settings_controls;
global $bizplus_repeated_settings_controls;
global $bizplus_customizer_defaults;

/*defaults values*/
$bizplus_customizer_defaults['bizplus-fs-single-words'] = 30;
$bizplus_customizer_defaults['bizplus-fs-slider-mode'] = 'fadeout';
$bizplus_customizer_defaults['bizplus-fs-slider-time'] = 2;
$bizplus_customizer_defaults['bizplus-fs-slider-pause-time'] = 7;
$bizplus_customizer_defaults['bizplus-fs-enable-arrow'] = 0;
$bizplus_customizer_defaults['bizplus-fs-enable-pager'] = 1;
$bizplus_customizer_defaults['bizplus-fs-enable-autoplay'] = 1;
$bizplus_customizer_defaults['bizplus-fs-enable-title'] = 1;
$bizplus_customizer_defaults['bizplus-fs-enable-caption'] = 1;
$bizplus_customizer_defaults['bizplus-fs-button-text'] = __('View More','bizplus');

/*fs options*/
$bizplus_sections['bizplus-fs-slider-options'] =
    array(
        'priority'       => 80,
        'title'          => __( 'Slider Property', 'bizplus' ),
        'panel'          => 'bizplus-featured-slider',
    );

$bizplus_settings_controls['bizplus-fs-single-words'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-fs-single-words']
        ),
        'control' => array(
            'label'                 =>  __( 'Single Slider- Number Of Words', 'bizplus' ),
            'description'           =>  __( 'If you do not have selected from - Custom', 'bizplus' ),
            'section'               => 'bizplus-fs-slider-options',
            'type'                  => 'number',
            'priority'              => 5,
            'active_callback'       => '',
            'input_attrs' => array( 'min' => 1, 'max' => 200),
        )
    );

$bizplus_settings_controls['bizplus-fs-slider-mode'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-fs-slider-mode']
        ),
        'control' => array(
            'label'                 =>  __( 'Slider Mode', 'bizplus' ),
            'section'               => 'bizplus-fs-slider-options',
            'type'                  => 'select',
            'choices'               => array(
                'scrollHorz' => __( 'Default', 'bizplus' ),
                'fade' => __( 'Fade', 'bizplus' ),
                'fadeout' => __( 'Fade-Out', 'bizplus' )
            ),
            'priority'              => 10,
            'active_callback'       => ''
        )
    );

$bizplus_settings_controls['bizplus-fs-enable-arrow'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-fs-enable-arrow']
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Arrow', 'bizplus' ),
            'section'               => 'bizplus-fs-slider-options',
            'type'                  => 'checkbox',
            'priority'              => 50,
            'active_callback'       => ''
        )
    );

$bizplus_settings_controls['bizplus-fs-enable-pager'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-fs-enable-pager']
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Pager', 'bizplus' ),
            'section'               => 'bizplus-fs-slider-options',
            'type'                  => 'checkbox',
            'priority'              => 55,
            'active_callback'       => ''
        )
    );

$bizplus_settings_controls['bizplus-fs-button-text'] =
array(
    'setting' =>     array(
        'default'              => $bizplus_customizer_defaults['bizplus-fs-button-text']
    ),
    'control' => array(
        'label'                 =>  __( 'Slider Section Button Text', 'bizplus' ),
        'section'               => 'bizplus-fs-slider-options',
        'type'                  => 'text',
        'priority'              => 90,
        'active_callback'       => ''
    )
);