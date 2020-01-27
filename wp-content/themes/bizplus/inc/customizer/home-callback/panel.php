<?php
global $bizplus_panels;
/*creating panel for callback Section setting*/
$bizplus_panels['bizplus-callback-panel'] =
    array(
        'title'          => __( 'Home/Front Callback Section', 'bizplus' ),
        'priority'       => 176
    );


/*callback section enable control */
require get_template_directory().'/inc/customizer/home-callback/options.php';

/*callback selection settings */
require get_template_directory().'/inc/customizer/home-callback/settings.php';