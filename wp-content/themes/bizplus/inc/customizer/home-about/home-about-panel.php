<?php
global $bizplus_panels;
/*creating panel for About Section setting*/
$bizplus_panels['bizplus-home-about-panel'] =
    array(
        'title'          => __( 'Home/Front About Section', 'bizplus' ),
        'priority'       => 150
    );


/*about section enable control */
require get_template_directory().'/inc/customizer/home-about/enable-about-section.php';

/*about selection button controlls */
require get_template_directory().'/inc/customizer/home-about/about-section.php';