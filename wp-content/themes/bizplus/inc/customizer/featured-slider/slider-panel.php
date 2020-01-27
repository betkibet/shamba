<?php
global $bizplus_panels;
/*creating panel for fonts-setting*/
$bizplus_panels['bizplus-featured-slider'] =
    array(
        'title'          => __( 'Home/Front Main Slider', 'bizplus' ),
        'priority'       => 150
    );

/*slider selection from slider options */
require get_template_directory().'/inc/customizer/featured-slider/enable-slider.php';

/*slider selection from slider options */
require get_template_directory().'/inc/customizer/featured-slider/slider-settings.php';

/*slider selection from slider from page */
require get_template_directory().'/inc/customizer/featured-slider/slider-from-page.php';

/*slider selection from custom slider property controll */
require get_template_directory().'/inc/customizer/featured-slider/slider-property.php';