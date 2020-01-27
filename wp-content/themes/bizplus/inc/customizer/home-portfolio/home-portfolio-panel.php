<?php
global $bizplus_panels;
/*creating panel for Portfolio Section setting*/
$bizplus_panels['bizplus-home-portfolio-panel'] =
    array(
        'title'          => __( 'Home/Front Portfolio', 'bizplus' ),
        'priority'       => 160
    );


/*Portfolio section enable control */
require get_template_directory().'/inc/customizer/home-portfolio/enable-section.php';

/*Portfolio selection options */
require get_template_directory().'/inc/customizer/home-portfolio/portfolio-options.php';

/*Portfolio selection button controlls */
require get_template_directory().'/inc/customizer/home-portfolio/portfolio-category-select.php';