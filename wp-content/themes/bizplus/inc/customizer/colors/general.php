<?php
global $bizplus_panels;
global $bizplus_sections;
global $bizplus_settings_controls;
global $bizplus_repeated_settings_controls;
global $bizplus_customizer_defaults;

/*creating panel for general*/
$bizplus_panels['bizplus-colors'] =
    array(
        'title'          => __( 'Colors', 'bizplus' ),
        'description'    => __( 'Customize colors of you awesome site', 'bizplus' ),
        'priority'       => 42,
    );

/*Default color*/
$bizplus_sections['colors'] =
    array(
        'priority'       => 40,
        'title'          => __( 'Basic Colors Options', 'bizplus' ),
        'panel'          => 'bizplus-colors',
    );

/*bizplus colors*/
$bizplus_sections['bizplus-colors-resets'] =
    array(
        'priority'       => 60,
        'title'          => __( 'BizPlus Colors Reset', 'bizplus' ),
        'panel'          => 'bizplus-colors',
    );
/*defaults values*/
$bizplus_customizer_defaults['bizplus-primary-color'] = '#028484';
$bizplus_customizer_defaults['bizplus-alternate-primary-color'] = '#F8F8F9';
$bizplus_customizer_defaults['bizplus-site-identity-color'] = '#fff';
$bizplus_customizer_defaults['bizplus-main-title-color'] = '#212121';
$bizplus_customizer_defaults['bizplus-main-sub-title-color'] = '#6d6d6d';
$bizplus_customizer_defaults['bizplus-menu-color'] = '#fff';
$bizplus_customizer_defaults['bizplus-text-over-image-color'] = '#fff';
$bizplus_customizer_defaults['bizplus-button-standard-color'] = '#028484';
$bizplus_customizer_defaults['bizplus-button-border-color'] = '#212121';
$bizplus_customizer_defaults['bizplus-link-color'] = '#31abec';
$bizplus_customizer_defaults['bizplus-primary-hover-color'] = '#DFB200';
$bizplus_customizer_defaults['bizplus-button-standard-hover-color'] = '#DFB200';

$bizplus_customizer_defaults['bizplus-bg-header-color'] = '#313131';
$bizplus_customizer_defaults['bizplus-bg-breadcrumb-color'] = '#555C68';
$bizplus_customizer_defaults['bizplus-bg-footer-color'] = '#323044';

$bizplus_customizer_defaults['bizplus-color-reset'] = '';


/**
 * Reset color settings to default
 *
 * @since bizplus 1.0.0
 */
if ( ! function_exists( 'bizplus_color_reset' ) ) :
    function bizplus_color_reset( ) {
        global $bizplus_customizer_saved_values;
        $bizplus_customizer_saved_values = bizplus_get_all_options();
        if ( $bizplus_customizer_saved_values['bizplus-color-reset'] == 1 ) {
            global $bizplus_customizer_defaults;
            global $bizplus_customizer_saved_values;

            /*setting fields */
            $bizplus_customizer_saved_values['bizplus-primary-color'] = $bizplus_customizer_defaults['bizplus-primary-color'];
            $bizplus_customizer_saved_values['bizplus-alternate-primary-color'] = $bizplus_customizer_defaults['bizplus-alternate-primary-color'];
            $bizplus_customizer_saved_values['bizplus-site-identity-color'] = $bizplus_customizer_defaults['bizplus-site-identity-color'];
            $bizplus_customizer_saved_values['bizplus-main-title-color'] = $bizplus_customizer_defaults['bizplus-main-title-color'];
            $bizplus_customizer_saved_values['bizplus-main-sub-title-color'] = $bizplus_customizer_defaults['bizplus-main-sub-title-color'];
            $bizplus_customizer_saved_values['bizplus-text-over-image-color'] = $bizplus_customizer_defaults['bizplus-text-over-image-color'];
            $bizplus_customizer_saved_values['bizplus-menu-color'] =$bizplus_customizer_defaults['bizplus-menu-color'];
            $bizplus_customizer_saved_values['bizplus-button-standard-color'] = $bizplus_customizer_defaults['bizplus-button-standard-color'];
            $bizplus_customizer_saved_values['bizplus-button-border-color'] = $bizplus_customizer_defaults['bizplus-button-border-color'];
            $bizplus_customizer_saved_values['bizplus-link-color'] = $bizplus_customizer_defaults['bizplus-link-color'];
            $bizplus_customizer_saved_values['bizplus-home-color-message'] = sprintf( __( '%1$s Hover Color Options %2$s', 'bizplus' ), '<h3>','</h3>' );
            $bizplus_customizer_saved_values['bizplus-primary-hover-color'] = $bizplus_customizer_defaults['bizplus-primary-hover-color'];
            $bizplus_customizer_saved_values['bizplus-button-standard-hover-color'] = $bizplus_customizer_defaults['bizplus-button-standard-hover-color'];
            
            $bizplus_customizer_saved_values['bizplus-bg-header-color'] = $bizplus_customizer_defaults['bizplus-bg-header-color'];
            $bizplus_customizer_saved_values['bizplus-bg-breadcrumb-color'] = $bizplus_customizer_defaults['bizplus-bg-breadcrumb-color'];
            $bizplus_customizer_saved_values['bizplus-bg-footer-color'] = $bizplus_customizer_defaults['bizplus-bg-footer-color'];
                       
            remove_theme_mod( 'background_color' );
            $bizplus_customizer_saved_values['bizplus-color-reset'] = '';
            /*resetting fields*/
            bizplus_reset_options( $bizplus_customizer_saved_values );
        }
        else {
            return '';
        }
    }
endif;
add_action( 'customize_save_after','bizplus_color_reset' );

$bizplus_settings_controls['bizplus-primary-color'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-primary-color'],
        ),
        'control' => array(
            'label'                 =>  __( 'Primary Color', 'bizplus' ),
            'description'           =>  __( 'This color will come in several places of your site, please select color according to your site', 'bizplus' ),
            'section'               => 'colors',
            'type'                  => 'color',
            'priority'              => 10,
            'active_callback'       => ''
        )
    );


$bizplus_settings_controls['bizplus-site-identity-color'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-site-identity-color'],
        ),
        'control' => array(
            'label'                 =>  __( 'Site Identity Color', 'bizplus' ),
            'description'           =>  __( 'Site title and tagline color', 'bizplus' ),
            'section'               => 'colors',
            'type'                  => 'color',
            'priority'              => 30,
            'active_callback'       => ''
        )
    );


$bizplus_settings_controls['bizplus-text-over-image-color'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-text-over-image-color'],
        ),
        'control' => array(
            'label'                 =>  __( 'Text Over Image Color', 'bizplus' ),
            'description'           =>  __( 'Will modify all the text color over image', 'bizplus' ),
            'section'               => 'colors',
            'type'                  => 'color',
            'priority'              => 55,
            'active_callback'       => ''
        )
    );

$bizplus_settings_controls['bizplus-bg-footer-color'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-bg-footer-color'],
        ),
        'control' => array(
            'label'                 =>  __( 'Footer Section Background', 'bizplus' ),
            'section'               => 'colors',
            'type'                  => 'color',
            'priority'              => 100,
            'active_callback'       => ''
        )
    );
    
$bizplus_settings_controls['bizplus-color-reset'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-color-reset'],
            'sanitize_callback'    => 'evision_customizer_sanitize_checkbox',
            'transport'            => 'postmessage',
        ),
        'control' => array(
            'label'                 =>  __( 'Reset', 'bizplus' ),
            'description'           =>  __( 'Caution: Reset all above color settings to default. Refresh the page after save to view the effects. ', 'bizplus' ),
            'section'               => 'bizplus-colors-resets',
            'type'                  => 'checkbox',
            'priority'              => 220,
            'active_callback'       => ''
        )
    );