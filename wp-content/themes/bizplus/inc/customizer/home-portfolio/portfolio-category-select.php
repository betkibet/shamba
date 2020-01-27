<?php
global $bizplus_panels;
global $bizplus_sections;
global $bizplus_settings_controls;
global $bizplus_repeated_settings_controls;
global $bizplus_customizer_defaults;

$bizplus_customizer_defaults['bizplus-home-portfolio-category'] = 0;

/*options*/
$bizplus_sections['bizplus-home-portfolio-category-select'] =
    array(
        'priority'       => 180,
        'title'          => __( 'Select Category', 'bizplus' ),
        'panel'          => 'bizplus-home-portfolio-panel',
    );
    
$bizplus_repeated_settings_controls['bizplus-home-portfolio-category'] =
    array(
        'repeated' => 2,
        'bizplus-home-portfolio-category-ids' => array(
            'setting' =>     array(
                'default'              => $bizplus_customizer_defaults['bizplus-home-portfolio-category'],

            ),
            'control' => array(
                'label'                 =>  __( 'Select Category For Portfolio %s', 'bizplus' ),
                'description'           =>  __( 'Portfolio will only displayed from this category', 'bizplus' ),
                'section'               => 'bizplus-home-portfolio-category-select',
                'type'                  => 'category_dropdown',
                'priority'              => 60,
                'active_callback'       => ''
            )
        ),
        'bizplus-home-portfolio-category-divider' => array(
            'control' => array(
                'section'               => 'bizplus-home-portfolio-category-select',
                'type'                  => 'message',
                'priority'              => 20,
                'description'           => '<br /><hr />'
            )
        )
    );