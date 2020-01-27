<?php
if( ! function_exists( 'bizplus_excerpt_length' ) ) :

    /**
     * Excerpt length
     *
     * @since  BizPlus 1.0.0
     *
     * @param null
     * @return int
     */
    function bizplus_excerpt_length( $length ){
        global $bizplus_customizer_all_values;
        $excerpt_length = $bizplus_customizer_all_values['bizplus-number-of-words'];
        if ( empty( $excerpt_length) ) {
            $excerpt_length = $length;
        }
        return absint( $excerpt_length );

    }

endif;
add_filter( 'excerpt_length', 'bizplus_excerpt_length', 999 );