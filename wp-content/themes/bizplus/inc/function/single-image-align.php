<?php 
/*image alignment single post*/

if( ! function_exists( 'bizplus_single_post_image_align' ) ) :
    /**
     * BizPlus default layout function
     *
     * @since  BizPlus 1.0.0
     *
     * @param int
     * @return string
     */
    function bizplus_single_post_image_align( $post_id = null ){
        global $bizplus_customizer_all_values,$post;
        if( null == $post_id && isset ( $post->ID ) ){
            $post_id = $post->ID;
        }
        $bizplus_single_post_image_align = $bizplus_customizer_all_values['bizplus-single-post-image-align'];
        $bizplus_single_post_image_align_meta = get_post_meta( $post_id, 'bizplus-single-post-image-align', true );

        if( false != $bizplus_single_post_image_align_meta ) {
            $bizplus_single_post_image_align = $bizplus_single_post_image_align_meta;
        }
        return $bizplus_single_post_image_align;
    }
endif;