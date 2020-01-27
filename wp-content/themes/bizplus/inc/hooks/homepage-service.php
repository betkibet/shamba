<?php
if ( ! function_exists( 'bizplus_home_service_array' ) ) :
    /**
     * Service Section array creation
     *
     * @since bizplus 1.0.0
     *
     * @param string $from_service
     * @return array
     */
    function bizplus_home_service_array( $from_service ){
        global $bizplus_customizer_all_values;
        $bizplus_home_service_number = absint($bizplus_customizer_all_values['bizplus-home-service-number']);
        $bizplus_home_service_single_words = absint($bizplus_customizer_all_values['bizplus-home-service-single-words']);

        $bizplus_home_service_contents_array = array();
        $bizplus_icons_array = array('bizplus-home-service-page-icon');
        $bizplus_home_service_page = array('bizplus-home-service-pages-ids');

        $bizplus_icons_arrays = evision_customizer_get_repeated_all_value(3 , $bizplus_icons_array);

        if ( 'from-category' ==  $from_service ){
            $bizplus_home_service_category = $bizplus_customizer_all_values['bizplus-home-service-category'];
            if( 0 != $bizplus_home_service_category ){
                $bizplus_home_service_args =    array(
                    'post_type' => 'post',
                    'cat' => absint($bizplus_home_service_category),
                    'posts_per_page' => absint($bizplus_home_service_number)
                );
            }
        }else {
                $bizplus_home_service_posts = evision_customizer_get_repeated_all_value(3 , $bizplus_home_service_page);
                $bizplus_home_service_posts_ids = array();
                if( null != $bizplus_home_service_posts ) {
                    foreach( $bizplus_home_service_posts as $bizplus_home_service_post ) {
                        if( 0 != $bizplus_home_service_post['bizplus-home-service-pages-ids'] ){
                            $bizplus_home_service_posts_ids[] = $bizplus_home_service_post['bizplus-home-service-pages-ids'];
                        }
                    }
                    if( !empty( $bizplus_home_service_posts_ids )){
                        $bizplus_home_service_args =    array(
                            'post_type' => 'page',
                            'post__in' => array_map( 'absint', $bizplus_home_service_posts_ids ),
                            'posts_per_page' => absint($bizplus_home_service_number),
                            'orderby' => 'post__in'
                        );
                    }
                }
            }
        // the query
        if( !empty( $bizplus_home_service_args )){

            $bizplus_home_service_contents_array = array(); /*again empty array*/
            $bizplus_home_service_post_query = new WP_Query( $bizplus_home_service_args );
            if ( $bizplus_home_service_post_query->have_posts() ) :
                $i = 1;
                while ( $bizplus_home_service_post_query->have_posts() ) : $bizplus_home_service_post_query->the_post();
                    $bizplus_home_service_contents_array[$i]['bizplus-home-service-title'] = get_the_title();
                    if (has_excerpt()) {
                        $bizplus_home_service_contents_array[$i]['bizplus-home-service-content'] = get_the_excerpt();
                    }
                    else {
                        $bizplus_home_service_contents_array[$i]['bizplus-home-service-content'] = bizplus_words_count( $bizplus_home_service_single_words ,get_the_content());
                    }
                    $bizplus_home_service_contents_array[$i]['bizplus-home-service-link'] = get_permalink();
                    if(isset( $bizplus_icons_arrays[$i] )){
                        $bizplus_home_service_contents_array[$i]['bizplus-home-service-page-icon'] = $bizplus_icons_arrays[$i]['bizplus-home-service-page-icon'];
                    }
                    else{
                        $bizplus_home_service_contents_array[$i]['bizplus-home-service-page-icon'] = 'fa-desktop';
                    }

                    $url ='';
                    if(has_post_thumbnail()){
                        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'bizplus-costume-medium' );
                        $url = $thumb['0'];
                    }
                    else{
                      $url = NULL;
                    }
                    $bizplus_home_service_contents_array[$i]['bizplus-home-service-page-image'] = $url;

                    $i++;
                endwhile;
                wp_reset_postdata();
            endif;
        }
        return $bizplus_home_service_contents_array;
    }
endif;

if ( ! function_exists( 'bizplus_home_service' ) ) :
    /**
     * Service Section
     *
     * @since bizplus 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function bizplus_home_service() {
        global $bizplus_customizer_all_values;
        if( 1 != $bizplus_customizer_all_values['bizplus-home-service-enable'] ){
            return null;
        }
        $bizplus_home_service_selection_options = $bizplus_customizer_all_values['bizplus-home-service-selection'];
        $bizplus_service_arrays = bizplus_home_service_array( $bizplus_home_service_selection_options );
        if( is_array( $bizplus_service_arrays )){
            $bizplus_home_service_number = absint($bizplus_customizer_all_values['bizplus-home-service-number']);
            $bizplus_home_service_enable_thumbnail = $bizplus_customizer_all_values['bizplus-home-service-thumbnail-enable'];
            $bizplus_home_service_button_text = $bizplus_customizer_all_values['bizplus-home-service-button-text'];
            $bizplus_home_service_button_link = $bizplus_customizer_all_values['bizplus-home-service-button-link'];
            $bizplus_home_service_enable_single_link = $bizplus_customizer_all_values['bizplus-home-service-enable-single-link'];
            ?>
            <section class="wrapper block-section wrap-service">
                <div class="container overhidden">
                    <div class="row">
                        <header class="title-section evision-animate slideInDown">
                            <?php 
                            $repeated_main_page = array('bizplus-service-main-pages-ids'); 
                            $bizplus_home_service_main_posts = evision_customizer_get_repeated_all_value(1 , $repeated_main_page);
                            $bizplus_home_service_main_posts_ids = array();
                            foreach ($bizplus_home_service_main_posts as $bizplus_home_service_main_post) {
                                if (0 != $bizplus_home_service_main_post['bizplus-service-main-pages-ids']) {
                                    $bizplus_home_service_main_posts_ids[] = $bizplus_home_service_main_post['bizplus-service-main-pages-ids'];
                                }
                                else {
                                    $bizplus_home_service_main_posts_ids[] = 2;
                                }
                            }
                            if( !empty( $bizplus_home_service_main_posts_ids )){
                                $bizplus_home_service_main_args = array(
                                    'post_type' => 'page',
                                    'post__in' => array_map( 'absint', $bizplus_home_service_main_posts_ids ),
                                    'orderby' => 'post__in'
                                );
                            }
                            if( !empty( $bizplus_home_service_main_args )){
                                $home_service_main_page_query = new WP_Query($bizplus_home_service_main_args);
                                while ($home_service_main_page_query->have_posts()): $home_service_main_page_query->the_post();
                            ?>
                            <?php
                            if (has_excerpt()) {
                                $bizplus_home_service_main_content = get_the_excerpt();
                            }
                            else {
                                $bizplus_home_service_main_content = bizplus_words_count( 15 ,get_the_content());
                            } ?>
                                <h3><?php echo esc_html( $bizplus_home_service_main_content );?></h3>
                                <h2><?php the_title(); ?></h2>
                                <span class="title-divider"></span>
                                <?php endwhile;
                            } ?>
                            <?php wp_reset_postdata(); ?>
                        </header>
                    </div>
                </div>
                <div class="container">
                    <div class="row block-row overhidden">
                        <?php 
                        if ($bizplus_home_service_enable_thumbnail == 1){
                           $bizplus_service_thumb = 'thumb-option'; 
                        } 
                        else{
                            $bizplus_service_thumb = '';
                        }
                        $i = 1;
                        $data_delay = 0;
                        foreach( $bizplus_service_arrays as $bizplus_service_array ){
                            if( $bizplus_home_service_number < $i){
                                break;
                            }
                            ?>
                            <div class="col-md-4 box-container evision-animate fadeInUp">
                                <div class="box-inner <?php echo $bizplus_service_thumb; ?> ">
                                    <?php
                                    if( 1 == $bizplus_home_service_enable_single_link ){
                                        ?>
                                    <a href="<?php echo esc_url( $bizplus_service_array['bizplus-home-service-link'] );?>" title="<?php echo esc_attr( $bizplus_service_array['bizplus-home-service-title'] );?>">
                                        <?php
                                    }
                                    ?>
                                        <div class="flip-container">
                                            <div class="flip-holder">
                                                <div class="front">
                                                    <i class="fa <?php echo esc_attr( $bizplus_service_array['bizplus-home-service-page-icon'] ); ?>"></i>
                                                </div>
                                                <div class="back">
                                                    <?php if (($bizplus_service_array['bizplus-home-service-page-image'] != NULL) && ($bizplus_home_service_enable_thumbnail == 1) ) { ?>
                                                        <img src="<?php echo esc_url($bizplus_service_array['bizplus-home-service-page-image']); ?>">
                                                    <?php }
                                                    else{ ?>
                                                        <i class="fa <?php echo esc_attr( $bizplus_service_array['bizplus-home-service-page-icon'] ); ?>"></i>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-content">
                                            <h3><?php echo esc_html( $bizplus_service_array['bizplus-home-service-title'] );?></h3>
                                            <div class="box-content-text">
                                                <p>
                                                    <?php echo wp_kses_post( $bizplus_service_array['bizplus-home-service-content'] );?>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php 
                        if( $i % 3 == 0 ){
                            echo "<div class='clear'></div>";
                        }
                        $i++;
                        }
                        ?>
                    </div>
                    <?php
                    if( !empty( $bizplus_home_service_button_link ) && !empty( $bizplus_home_service_button_text ) ){
                        ?>
                        <div class="btn-container browse-more-btn">
                            <a class="button button-outline" href="<?php echo esc_url( $bizplus_home_service_button_link );?>">
                                <?php echo esc_html( $bizplus_home_service_button_text );?>
                            </a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </section><!-- service section -->
            <?php
        }
    }
endif;
add_action( 'bizplus_homepage', 'bizplus_home_service', 15 );