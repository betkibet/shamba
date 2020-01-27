<?php
global $bizplus_panels;
/*creating panel for fonts-setting*/
$bizplus_panels['bizplus-home-service'] =
    array(
        'title'          => __( 'Home/Front Service Section', 'bizplus' ),
        'priority'       => 160
    );
/*enable service options */
require get_template_directory().'/inc/customizer/home-service/enable-service.php';

/*service selection from custom options */
require get_template_directory().'/inc/customizer/home-service/font-icon.php';

/*service selection from page options */
require get_template_directory().'/inc/customizer/home-service/from-page.php';

/*service selection from custom options */
require get_template_directory().'/inc/customizer/home-service/service-options.php';