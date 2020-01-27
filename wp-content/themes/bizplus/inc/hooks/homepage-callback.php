<?php

if ( ! function_exists( 'bizplus_home_callback_section' ) ) :
    /**
     * Callback
     *
     * @since bizplus 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function bizplus_home_callback_section() {
        global $bizplus_customizer_all_values;
        if( 1 != $bizplus_customizer_all_values['bizplus-callback-enable'] ){
            return null;
        }
        $bizplus_home_callback_single_words = $bizplus_customizer_all_values['bizplus-home-callback-single-words'];
        $bizplus_home_callback_posts = $bizplus_customizer_all_values['bizplus-callback-page'];
        $bizplus_home_callback_button = $bizplus_customizer_all_values['bizplus-home-callback-button-text'];
        $bizplus_home_callback_button_link = $bizplus_customizer_all_values['bizplus-home-callback-button-link'];

    ?>
    <?php
    if( !empty( $bizplus_home_callback_posts )){
        $bizplus_feature_callback_args =    array(
            'post_type' => 'page',
            'p' => absint($bizplus_home_callback_posts),
            'posts_per_page' => 1

        );
        $bizplus_fature_section_post_query = new WP_Query( $bizplus_feature_callback_args );
        if ( $bizplus_fature_section_post_query->have_posts() ) :
        while ( $bizplus_fature_section_post_query->have_posts() ) : $bizplus_fature_section_post_query->the_post();
        if(has_post_thumbnail()){
            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
        }
        else{
            $thumb[0] = get_template_directory_uri() .'/assets/img/callup-banner.png';
        }
        ?>               

        <section class="wrapper wrapper-callback bannerbg" style="background-image: url('<?php echo esc_url($thumb[0]); ?>')";>
            <div class="thumb-overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
                            <h2><?php the_title(); ?></h2>
                            <div class="text-content">
                                <?php
                                if (has_excerpt()) {
                                    $bizplus_home_callback_content = get_the_excerpt();
                                }
                                else {
                                    $bizplus_home_callback_content = bizplus_words_count( $bizplus_home_callback_single_words ,get_the_content());
                                } ?>
                                <?php echo wp_kses_post($bizplus_home_callback_content); ?>
                            </div>
                            <?php if( 1 == $bizplus_customizer_all_values['bizplus-home-callback-remove-button'] ){ ?>
                                <div class="btn-holder"><a href="<?php 
                                    if (empty($bizplus_home_callback_button_link)) {
                                        the_permalink();
                                    }
                                    else{
                                        echo esc_url($bizplus_home_callback_button_link);
                                    }
                                    ?>" class="button"> <?php echo esc_html($bizplus_home_callback_button);?></a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
    }
}
endif;
add_action( 'bizplus_homepage', 'bizplus_home_callback_section', 40 );