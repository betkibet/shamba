<?php
global $bizplus_panels;
global $bizplus_sections;
global $bizplus_settings_controls;
global $bizplus_repeated_settings_controls;
global $bizplus_customizer_defaults;

/*defaults values*/
$bizplus_customizer_defaults['bizplus-home-blog-main-page'] = 1;
$bizplus_customizer_defaults['bizplus-home-blog-single-words'] = 30;
$bizplus_customizer_defaults['bizplus-home-blog-category'] = 0;

/*blogoptions*/
$bizplus_sections['bizplus-home-blog-options'] =
    array(
        'priority'       => 180,
        'title'          => __( 'Section settings', 'bizplus' ),
        'panel'          => 'bizplus-home-blog-panel',
    );


/*blog section main page*/
$bizplus_repeated_settings_controls['bizplus-home-blog-main-page'] =
    array(
        'repeated' => 1,
        'bizplus-blog-main-pages-ids' => array(
            'setting' =>     array(
                'default'              => $bizplus_customizer_defaults['bizplus-home-blog-main-page'],
            ),
            'control' => array(
                'label'                 =>  __( 'Select Main Page', 'bizplus' ),
                'description'           =>  __( 'Select main page for blog section', 'bizplus' ),
                'section'               => 'bizplus-home-blog-options',
                'type'                  => 'dropdown-pages',
                'priority'              => 40
            )
        ),
    );


    /*String in max to be appear as description on blog*/
    $bizplus_settings_controls['bizplus-home-blog-single-words'] =
        array(
            'setting' =>     array(
                'default'              => $bizplus_customizer_defaults['bizplus-home-blog-single-words']
            ),
            'control' => array(
                'label'                 =>  __( 'Number Of Words', 'bizplus' ),
                'description'           =>  __( 'Give number of words you wish to be appear on home page blog section sticky post/ feature post', 'bizplus' ),
                'section'               => 'bizplus-home-blog-options',
                'type'                  => 'number',
                'priority'              => 40,
                'input_attrs' => array( 'min' => 1, 'max' => 200),
                'active_callback'       => ''
            )
        );

/*creating setting control for bizplus-fs-Category start*/
$bizplus_settings_controls['bizplus-home-blog-category'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-home-blog-category']
        ),
        'control' => array(
            'label'                 =>  __( 'Select Category For Blog', 'bizplus' ),
            'description'           =>  __( 'Blog will only displayed from this category', 'bizplus' ),
            'section'               => 'bizplus-home-blog-options',
            'type'                  => 'category_dropdown',
            'priority'              => 60,
            'active_callback'       => ''
        )
    );
