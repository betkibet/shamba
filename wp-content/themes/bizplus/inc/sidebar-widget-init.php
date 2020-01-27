<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bizplus_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'bizplus' ),
        'id'            => 'sidebar-1',
        'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

        register_sidebar(array(
            'name' => esc_html__('Footer Column One', 'bizplus'),
            'id' => 'footer-col-one',
            'description' => esc_html__('Displays items on footer section.','bizplus'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title'  => '<h1 class="widget-title">',
            'after_title'   => '</h1>',
        ));
            register_sidebar(array(
                'name' => esc_html__('Footer Column Two', 'bizplus'),
                'id' => 'footer-col-two',
                'description' => esc_html__('Displays items on footer section.','bizplus'),
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget' => '</aside>',
                'before_title'  => '<h1 class="widget-title">',
                'after_title'   => '</h1>',
            ));
            register_sidebar(array(
                'name' => esc_html__('Footer Column Three', 'bizplus'),
                'id' => 'footer-col-three',
                'description' => esc_html__('Displays items on footer section.','bizplus'),
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget' => '</aside>',
                'before_title'  => '<h1 class="widget-title">',
                'after_title'   => '</h1>',
            ));
}
add_action( 'widgets_init', 'bizplus_widgets_init' );