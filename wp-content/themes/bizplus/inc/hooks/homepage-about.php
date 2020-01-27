<?php

if ( ! function_exists( 'bizplus_home_about' ) ) :
    /**
     * About Section
     *
     * @since BizPlus 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function bizplus_home_about() {
        global $bizplus_home_about_bg;
        global $bizplus_customizer_all_values;
        $bizplus_home_about_button_text = $bizplus_customizer_all_values['bizplus-home-about-button-text'];
        $repeated_page = array('bizplus-about-pages-ids');
        $bizplus_home_about_single_words = $bizplus_customizer_all_values['bizplus-home-about-single-words'];
        $bizplus_home_about_posts = evision_customizer_get_repeated_all_value(1 , $repeated_page);
        $bizplus_home_about_posts_ids = array();
        foreach ($bizplus_home_about_posts as $bizplus_home_about_post) {
            if (0 != $bizplus_home_about_post['bizplus-about-pages-ids']) {
                $bizplus_home_about_posts_ids[] = $bizplus_home_about_post['bizplus-about-pages-ids'];
            }
            else {
                $bizplus_home_about_posts_ids[] = 2;
            }
        }
        if( !empty( $bizplus_home_about_posts_ids )){
            $bizplus_home_about_args = array(
                'post_type' => 'page',
                'post__in' => array_map( 'absint', $bizplus_home_about_posts_ids ),
                'orderby' => 'post__in'
            );
        }
        if( (1 != $bizplus_customizer_all_values['bizplus-home-about-enable'])){
            return;
        } ?>
        <section class="wrapper wrapper-info wrap-altbg">
            <div class="about-content">
                <div class="container overhidden">
                    <div class="row">
                        <div class="col-md-12">
                            <header class="title-section evision-animate slideInDown">
                            <?php 
                            $repeated_main_page = array('bizplus-about-main-pages-ids'); 
                            $bizplus_home_about_main_posts = evision_customizer_get_repeated_all_value(1 , $repeated_main_page);
                            $bizplus_home_about_main_posts_ids = array();
                            foreach ($bizplus_home_about_main_posts as $bizplus_home_about_main_post) {
                                if (0 != $bizplus_home_about_main_post['bizplus-about-main-pages-ids']) {
                                    $bizplus_home_about_main_posts_ids[] = $bizplus_home_about_main_post['bizplus-about-main-pages-ids'];
                                }
                                else {
                                    $bizplus_home_about_main_posts_ids[] = 2;
                                }
                            }
                            if( !empty( $bizplus_home_about_main_posts_ids )){
                                $bizplus_home_about_main_args = array(
                                    'post_type' => 'page',
                                    'post__in' => array_map( 'absint', $bizplus_home_about_main_posts_ids ),
                                    'orderby' => 'post__in'
                                );
                            }
                            if( !empty( $bizplus_home_about_main_args )){
                                $home_about_main_page_query = new WP_Query($bizplus_home_about_main_args);
                                while ($home_about_main_page_query->have_posts()): $home_about_main_page_query->the_post();
                            ?>
                            <?php
                            if (has_excerpt()) {
                                $bizplus_home_about_main_content = get_the_excerpt();
                            }
                            else {
                                $bizplus_home_about_main_content = bizplus_words_count( 15 ,get_the_content());
                            } ?>
                                <h3><?php echo wp_kses_post($bizplus_home_about_main_content); ?></h3>
                                <h2><?php the_title(); ?></h2>
                                <span class="title-divider"></span>
                                <?php endwhile;
                            } ?>
                            <?php wp_reset_postdata(); ?>
                            </header>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <?php
                    if( !empty( $bizplus_home_about_args )){
                        $home_about_query = new WP_Query($bizplus_home_about_args);
                        while ($home_about_query->have_posts()): $home_about_query->the_post();
                            if(has_post_thumbnail()){
                                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
                                $url = $thumb['0'];
                            }
                            else{
                                $url = get_template_directory_uri().'/assets/img/slider.jpg';
                            } ?>
                            <div class="thumb-holder evision-animate pulse" style="background-image: url(<?php echo esc_url( $url ); ?>)">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-8 col-md-7 content-outer">
                                        <div class="content-area evision-animate slideInLeft">
                                            <div class="content-inner">
                                                <h2><a href="<?php the_permalink();?>"> <?php the_title(); ?></a></h2>
                                                <div class="content-text">
                                                    <?php
                                                    if (has_excerpt()) {
                                                        $bizplus_home_about_content_word_count = get_the_excerpt();
                                                    }
                                                    else {
                                                        $bizplus_home_about_content_word_count = bizplus_words_count( absint($bizplus_home_about_single_words) ,get_the_content());
                                                    } ?>
                                                    <?php echo wp_kses_post( $bizplus_home_about_content_word_count );?>
                                                </div>
                                                <?php
                                                $bizplus_home_about_button_text = $bizplus_customizer_all_values['bizplus-home-about-button-text'];
                                                    if( !empty( $bizplus_home_about_button_text ) ){
                                                        ?>
                                                        <div class="btn-holder">
                                                            <a class="button button-outline button-outline-small" href="<?php the_permalink();?>">
                                                                <?php echo esc_html( $bizplus_home_about_button_text );?>
                                                            </a>
                                                        </div>
                                                        <?php
                                                    } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                    }
                    ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
        </section>
        <?php
    }
endif;
add_action( 'bizplus_homepage', 'bizplus_home_about', 12 );

