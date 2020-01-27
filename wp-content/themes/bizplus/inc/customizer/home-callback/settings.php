<?php
global $bizplus_panels;
global $bizplus_sections;
global $bizplus_settings_controls;
global $bizplus_repeated_settings_controls;
global $bizplus_customizer_defaults;

/*defaults values callback options*/
$bizplus_customizer_defaults['bizplus-home-callback-single-words'] = 40;
$bizplus_customizer_defaults['bizplus-home-callback-remove-button'] = 1;
$bizplus_customizer_defaults['bizplus-home-callback-button-text'] = __('View More','bizplus');
$bizplus_customizer_defaults['bizplus-home-callback-button-link'] = '';

/* Feature section Enable settings*/
$bizplus_sections['bizplus-callback-section-settings'] =
    array(
        'priority'       => 30,
        'title'          => __( 'Section Settings', 'bizplus' ),
        'panel'          => 'bizplus-callback-panel',
    );


/*String in max to be appear as description on callback*/
$bizplus_settings_controls['bizplus-home-callback-single-words'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-home-callback-single-words']
        ),
        'control' => array(
            'label'                 =>  __( 'Number Of Words', 'bizplus' ),
            'description'           =>  __( 'Give number of words you wish to be appear on home page callback section', 'bizplus' ),
            'section'               => 'bizplus-callback-section-settings',
            'type'                  => 'number',
            'input_attrs' => array( 'min' => 1, 'max' => 200),
            'priority'              => 20,
            'active_callback'       => ''
        )
    );

    $bizplus_settings_controls['bizplus-home-callback-remove-button'] =
        array(
            'setting' =>     array(
                'default'              => $bizplus_customizer_defaults['bizplus-home-callback-remove-button']
            ),
            'control' => array(
                'label'                 =>  __( 'Enable Button', 'bizplus' ),
                'section'               => 'bizplus-callback-section-settings',
                'type'                  => 'checkbox',
                'priority'              => 30,
                'active_callback'       => ''
            )
        );
