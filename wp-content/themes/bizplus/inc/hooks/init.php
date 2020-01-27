<?php
/**
 * Implement Editor Styles
 *
 * @since BizPlus 1.0.0
 *
 * @param null
 * @return null
 *
 */
add_action( 'init', 'bizplus_add_editor_styles' );

if ( ! function_exists( 'bizplus_add_editor_styles' ) ) :
    function bizplus_add_editor_styles() {
        add_editor_style( 'editor-style.css' );
    }
endif;