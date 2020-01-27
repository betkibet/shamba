<?php
global $bizplus_sections;
global $bizplus_settings_controls;
global $bizplus_repeated_settings_controls;
global $bizplus_customizer_defaults;

/*defaults values*/
$bizplus_customizer_defaults['bizplus-default-banner-image'] = get_template_directory_uri().'/assets/img/bizplus-inner-bg.jpg';
$bizplus_customizer_defaults['bizplus-default-layout'] = 'right-sidebar';
$bizplus_customizer_defaults['bizplus-archive-layout'] = 'thumbnail-and-excerpt';
$bizplus_customizer_defaults['bizplus-archive-image-align'] = 'full';
$bizplus_customizer_defaults['bizplus-number-of-words'] = 30;
$bizplus_customizer_defaults['bizplus-single-post-image-align'] = 'full';
$bizplus_customizer_defaults['bizplus-single-post-image'] = '';
$bizplus_customizer_defaults['bizplus-enable-selected-page'] = 1;



$bizplus_sections['bizplus-layout-options'] =
    array(
        'priority'       => 20,
        'title'          => __( 'Layout Options', 'bizplus' ),
        'panel'          => 'bizplus-theme-options',
    );

    /*defaults values*/

$bizplus_settings_controls['bizplus-enable-selected-page'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-enable-selected-page'],
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Selected Front Page', 'bizplus' ),
            'description'           =>  __( 'If you disable this the selected page will be disappera form the home page and other section from customizer will reamin as it is', 'bizplus' ),
            'section'               => 'bizplus-layout-options',
            'type'                  => 'checkbox',
            'priority'              => 10,
        )
    );
$bizplus_settings_controls['bizplus-default-banner-image'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-default-banner-image'],
        ),
        'control' => array(
            'label'                 =>  __( 'Default Banner Image', 'bizplus' ),
            'description'           =>  __( 'Please note that if you remove this image default banner image will appear', 'bizplus' ),
            'section'               => 'bizplus-layout-options',
            'type'                  => 'image',
            'priority'              => 10,
        )
    );

/*layout-options option responsive lodader start*/
$bizplus_settings_controls['bizplus-default-layout'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-default-layout'],
        ),
        'control' => array(
            'label'                 =>  __( 'Default Layout', 'bizplus' ),
            'description'           =>  __( 'Layout for all archives, single posts and pages', 'bizplus' ),
            'section'               => 'bizplus-layout-options',
            'type'                  => 'select',
            'choices'               => array(
                'right-sidebar' => __( 'Content - Primary Sidebar', 'bizplus' ),
                'left-sidebar' => __( 'Primary Sidebar - Content', 'bizplus' ),
                'no-sidebar' => __( 'No Sidebar', 'bizplus' )
            ),
            'priority'              => 30,
            'active_callback'       => ''
        )
    );


$bizplus_settings_controls['bizplus-archive-layout'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-archive-layout'],
        ),
        'control' => array(
            'label'                 =>  __( 'Archive Layout', 'bizplus' ),
            'section'               => 'bizplus-layout-options',
            'type'                  => 'select',
            'choices'               => array(
                'excerpt-only' => __( 'Excerpt Only', 'bizplus' ),
                'thumbnail-and-excerpt' => __( 'Thumbnail and Excerpt', 'bizplus' ),
            ),
            'priority'              => 34,
        )
    );


$bizplus_settings_controls['bizplus-archive-image-align'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-archive-image-align'],
        ),
        'control' => array(
            'label'                 =>  __( 'Archive Image Alignment', 'bizplus' ),
            'section'               => 'bizplus-layout-options',
            'type'                  => 'select',
            'choices'               => array(
                'full' => __( 'Full', 'bizplus' ),
                'right' => __( 'Right', 'bizplus' ),
            ),
            'priority'              => 35,
            'description'              => __('This option only work if you have selected "Thumbnail and Excerpt" or "Thumbnail and Full Post" in Archive Layout options','bizplus'),
        )
    );

$bizplus_settings_controls['bizplus-number-of-words'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-number-of-words']
        ),
        'control' => array(
            'label'                 =>  __( 'Number Of Words For Excerpt', 'bizplus' ),
            'description'           =>  __( 'This will controll the excerpt length on listing page', 'bizplus' ),
            'section'               => 'bizplus-layout-options',
            'type'                  => 'number',
            'input_attrs' => array( 'min' => 1, 'max' => 200),
            'priority'              => 40,
            'active_callback'       => ''
        )
    );


$bizplus_settings_controls['bizplus-single-post-image-align'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-single-post-image-align'],
        ),
        'control' => array(
            'label'                 =>  __( 'Alignment Of Image In Single Post/Page', 'bizplus' ),
            'section'               => 'bizplus-layout-options',
            'type'                  => 'select',
            'choices'               => array(
                'full' => __( 'Full', 'bizplus' ),
                'right' => __( 'Right', 'bizplus' ),
                'left' => __( 'Left', 'bizplus' ),
                'no-image' => __( 'No image', 'bizplus' )
            ),
            'priority'              => 50,
            'description'           =>  __( 'Please note that this setting can be override from individual post/page', 'bizplus' ),
        )
    );