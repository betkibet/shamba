<?php
/**
 * evision themes Theme Customizer
 *
 * @package bizplus
 * @since bizplus 1.0.0
 */
add_filter('evision_customizer_framework_url', 'bizplus_customizer_framework_url');

if( ! function_exists( 'bizplus_customizer_framework_url' ) ):

    function bizplus_customizer_framework_url(){
        return trailingslashit( get_template_directory_uri() ) . 'inc/frameworks/evision-customizer/';
    }

endif;

add_filter('evision_customizer_framework_path', 'bizplus_customizer_framework_path');

if( ! function_exists( 'bizplus_customizer_framework_path' ) ):
    function bizplus_customizer_framework_path(){
        return trailingslashit( get_template_directory() ) . 'inc/frameworks/evision-customizer/';
    }
endif;

/*define constant for coder-customizer-constant*/
if(!defined('EVISION_CUSTOMIZER_NAME')){
    define('EVISION_CUSTOMIZER_NAME','bizplus-options');
}


/**
 * reset options
 * @param  array $reset_options
 * @return void
 *
 * @since bizplus 1.0.0
 */
if ( ! function_exists( 'bizplus_reset_options' ) ) :
    function bizplus_reset_options( $reset_options ) {
        set_theme_mod( EVISION_CUSTOMIZER_NAME, $reset_options );
    }
endif;
/**
 * Customizer framework added.
 */
require get_template_directory().'/inc/frameworks/evision-customizer/evision-customizer.php';

global $bizplus_panels;
global $bizplus_sections;
global $bizplus_settings_controls;
global $bizplus_repeated_settings_controls;
global $bizplus_customizer_defaults;


/******************************************
Modify Site Color sections
 *******************************************/
require get_template_directory().'/inc/customizer/colors/general.php';

/******************************************
Added font setting options
 *******************************************/
require get_template_directory().'/inc/customizer/font-setting/font-family.php';

/******************************************
Featured Slider options
 *******************************************/
require get_template_directory().'/inc/customizer/featured-slider/slider-panel.php';

/******************************************
Home Service options
 *******************************************/
require get_template_directory().'/inc/customizer/home-service/service-panel.php';

/******************************************
Portfolio options
 *******************************************/
require get_template_directory().'/inc/customizer/home-portfolio/home-portfolio-panel.php';

/******************************************
Home About options 
 *******************************************/
require get_template_directory().'/inc/customizer/home-about/home-about-panel.php';

/******************************************
Home Blog options 
 *******************************************/
require get_template_directory().'/inc/customizer/home-blog/home-blog-panel.php';

/******************************************
Home callback options 
 *******************************************/
require get_template_directory().'/inc/customizer/home-callback/panel.php';


/******************************************
Theme options panel
 *******************************************/
require get_template_directory().'/inc/customizer/theme-options/option-panel.php';

/*Resetting all Values*/
/**
 * Reset color settings to default
 *
 * @since bizplus 1.0.0
 */
global $bizplus_customizer_defaults;
$bizplus_customizer_defaults['bizplus-customizer-reset-settings'] = '';
if ( ! function_exists( 'bizplus_customizer_reset' ) ) :
    function bizplus_customizer_reset( ) {
        global $bizplus_customizer_saved_values;
        $bizplus_customizer_saved_values = bizplus_get_all_options();
        if ( $bizplus_customizer_saved_values['bizplus-customizer-reset-settings'] == 1 ) {
            global $bizplus_customizer_defaults;
            /*getting fields*/
            $bizplus_customizer_defaults['bizplus-customizer-reset-settings'] = '';
            /*resetting fields*/
            bizplus_reset_options( $bizplus_customizer_defaults );
        }
        else {
            return '';
        }
    }
endif;
add_action( 'customize_save_after','bizplus_customizer_reset' );

$bizplus_sections['bizplus-customizer-resets'] =
    array(
        'priority'       => 999,
        'title'          => __( 'Reset All Options', 'bizplus' )
    );
$bizplus_settings_controls['bizplus-customizer-reset-settings'] =
    array(
        'setting' =>     array(
            'default'              => $bizplus_customizer_defaults['bizplus-customizer-reset-settings'],
            'sanitize_callback'    => 'evision_customizer_sanitize_checkbox',
            'transport'            => 'postmessage'
        ),
        'control' => array(
            'label'                 =>  __( 'Reset All Options', 'bizplus' ),
            'description'           =>  __( 'Caution: Reset all options settings to default. Refresh the page after save to view the effects. ', 'bizplus' ),
            'section'               => 'bizplus-customizer-resets',
            'type'                  => 'checkbox',
            'priority'              => 10
        )
    );

/******************************************
Managing section setting control
 *******************************************/

$bizplus_sections['header_image'] =
    array(
        'priority'       => 1999,
        'title'          => __( 'Header Image', 'bizplus' )
    );

$bizplus_customizer_args = array(
    'panels'            => $bizplus_panels, /*always use key panels */
    'sections'          => $bizplus_sections,/*always use key sections*/
    'settings_controls' => $bizplus_settings_controls,/*always use key settings_controls*/
    'repeated_settings_controls' => $bizplus_repeated_settings_controls,/*always use key sections*/
);

/*registering panel section setting and control start*/
function bizplus_add_panels_sections_settings() {
    global $bizplus_customizer_args;
    return $bizplus_customizer_args;
}
add_filter( 'evision_customizer_panels_sections_settings', 'bizplus_add_panels_sections_settings' );
/*registering panel section setting and control end*/

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bizplus_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'bizplus_customize_register' );
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bizplus_customize_preview_js() {
    wp_enqueue_script( 'bizplus-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20160105', true );
}
add_action( 'customize_preview_init', 'bizplus_customize_preview_js' );



/**
 * get all saved options
 * @param  null
 * @return array saved options
 *
 * @since bizplus 1.0.0
 */
if ( ! function_exists( 'bizplus_get_all_options' ) ) :
    function bizplus_get_all_options( $merge_default = 0 ) {
        $bizplus_customizer_saved_values = evision_customizer_get_all_values( );
        if( 1 == $merge_default ){
            global $bizplus_customizer_defaults;
            if(is_array( $bizplus_customizer_saved_values )){
                $bizplus_customizer_saved_values = array_merge($bizplus_customizer_defaults, $bizplus_customizer_saved_values );
            }
            else{
                $bizplus_customizer_saved_values = $bizplus_customizer_defaults;
            }
        }
        return $bizplus_customizer_saved_values;
    }
endif;