<?php
global $bizplus_panels;
/*creating panel for fonts-setting*/
$bizplus_panels['bizplus-theme-options'] =
    array(
        'title'          => __( 'Theme Options', 'bizplus' ),
        'priority'       => 200
    );

/*layout options */
require get_template_directory().'/inc/customizer/theme-options/layout-options.php';

/*footer options */
require get_template_directory().'/inc/customizer/theme-options/footer.php';

/*Breadcrumb section */
require get_template_directory().'/inc/customizer/theme-options/breadcrumb.php';

/*Back to top */
require get_template_directory().'/inc/customizer/theme-options/back-to-top.php';

/*search selection for slider section */
require get_template_directory().'/inc/customizer/theme-options/search-options.php';
