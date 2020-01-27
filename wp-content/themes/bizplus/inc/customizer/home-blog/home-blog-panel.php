<?php
global $bizplus_panels;
/*creating panel for blog Section setting*/
$bizplus_panels['bizplus-home-blog-panel'] =
    array(
        'title'          => __( 'Home/Front blog Section', 'bizplus' ),
        'priority'       => 180
    );


/*blog section enable control */
require get_template_directory().'/inc/customizer/home-blog/enable-blog-section.php';

/*blog selection options */
require get_template_directory().'/inc/customizer/home-blog/blog-options.php';

/*blog selection button controlls */
require get_template_directory().'/inc/customizer/home-blog/blog-button-section.php';