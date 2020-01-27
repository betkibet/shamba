<?php
if ( ! function_exists( 'bizplus_featured_slider_array' ) ) :
    /**
     * Featured Slider array creation
     *
     * @since BizPlus 1.0.0
     *
     * @param string $from_slider
     * @return array
     */
    function bizplus_featured_slider_array( $from_slider ){
        global $bizplus_customizer_all_values;
        $bizplus_feature_slider_number = $bizplus_customizer_all_values['bizplus-featured-slider-number'];
        $bizplus_feature_slider_single_words = absint( $bizplus_customizer_all_values['bizplus-fs-single-words'] );
        $repeated_page = array('bizplus-fs-pages-ids');
        $bizplus_feature_slider_args = array();
        $bizplus_feature_slider_contents_array = array();

        if ( 'from-category' ==  $from_slider ){
            $bizplus_feature_slider_category = esc_html($bizplus_customizer_all_values['bizplus-featured-slider-category']);
            if( 0 != $bizplus_feature_slider_category ){
                $bizplus_feature_slider_args =    array(
                    'post_type' => 'post',
                    'cat' => absint($bizplus_feature_slider_category),
                    'ignore_sticky_posts' => true
                );
            }
        }
        else{
            $bizplus_feature_slider_posts = evision_customizer_get_repeated_all_value(3 , $repeated_page);
            $bizplus_feature_slider_posts_ids = array();
            if( null != $bizplus_feature_slider_posts ) {
                foreach( $bizplus_feature_slider_posts as $bizplus_feature_slider_post ) {
                    if( 0 != $bizplus_feature_slider_post['bizplus-fs-pages-ids'] ){
                        $bizplus_feature_section_posts_ids[] = $bizplus_feature_slider_post['bizplus-fs-pages-ids'];
                    }
                }

                if( !empty( $bizplus_feature_section_posts_ids )){
                    $bizplus_feature_slider_args =    array(
                        'post_type' => 'page',
                        'post__in' => array_map( 'absint', $bizplus_feature_section_posts_ids ),
                        'posts_per_page' => absint($bizplus_feature_slider_number),
                        'orderby' => 'post__in'
                    );
                }

            }
        }
        if( !empty( $bizplus_feature_slider_args )){
            // the query
            $bizplus_fature_section_post_query = new WP_Query( $bizplus_feature_slider_args );

            if ( $bizplus_fature_section_post_query->have_posts() ) :
                $i = 0;
                while ( $bizplus_fature_section_post_query->have_posts() ) : $bizplus_fature_section_post_query->the_post();
                    $url ='';
                    if(has_post_thumbnail()){
                        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'bizplus-main-banner' );
                        $url = $thumb['0'];
                    }
                    $bizplus_feature_slider_contents_array[$i]['bizplus-feature-slider-title'] = get_the_title();
                    if (has_excerpt()) {
                        $bizplus_feature_slider_contents_array[$i]['bizplus-feature-slider-content'] = get_the_excerpt();
                    }
                    else {
                        $bizplus_feature_slider_contents_array[$i]['bizplus-feature-slider-content'] = bizplus_words_count( $bizplus_feature_slider_single_words ,get_the_content());
                    }
                    $bizplus_feature_slider_contents_array[$i]['bizplus-feature-slider-link'] = get_permalink();
                    $bizplus_feature_slider_contents_array[$i]['bizplus-feature-slider-image'] = $url;
                    $i++;
                endwhile;
                wp_reset_postdata();
            endif;
        }
        return $bizplus_feature_slider_contents_array;
    }
endif;

if ( ! function_exists( 'bizplus_featured_home_slider' ) ) :
    /**
     * Featured Slider
     *
     * @since bizplus 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function bizplus_featured_home_slider() {
        global $bizplus_customizer_all_values;

        if( 1 != $bizplus_customizer_all_values['bizplus-feature-slider-enable'] ){
            return null;
        }
        $bizplus_feature_slider_selection_options = $bizplus_customizer_all_values['bizplus-featured-slider-selection'];
        $bizplus_slider_arrays = bizplus_featured_slider_array( $bizplus_feature_slider_selection_options );


        if( is_array( $bizplus_slider_arrays )){
        $bizplus_feature_slider_number = $bizplus_customizer_all_values['bizplus-featured-slider-number'];
        $bizplus_feature_slider_mode = $bizplus_customizer_all_values['bizplus-fs-slider-mode'];
        $bizplus_feature_slider_time = $bizplus_customizer_all_values['bizplus-fs-slider-time'];
        $bizplus_feature_slider_pause_time = $bizplus_customizer_all_values['bizplus-fs-slider-pause-time'];
        $bizplus_feature_enable_arrow = $bizplus_customizer_all_values['bizplus-fs-enable-arrow'];
        $bizplus_feature_enable_pager = $bizplus_customizer_all_values['bizplus-fs-enable-pager'];
        $bizplus_feature_enable_autoplay = $bizplus_customizer_all_values['bizplus-fs-enable-autoplay'];
        $bizplus_feature_enable_title = $bizplus_customizer_all_values['bizplus-fs-enable-title'];
        $bizplus_feature_enable_caption = $bizplus_customizer_all_values['bizplus-fs-enable-caption'];
        $bizplus_feature_enable_search = $bizplus_customizer_all_values['bizplus-search-enable'];
        $bizplus_feature_button_text = $bizplus_customizer_all_values['bizplus-fs-button-text'];

    ?>

    <section class="wrapper main-slider wrapper-slider bannerbg">
        <?php if( 1 == $bizplus_feature_enable_arrow){ ?>
            <div class="controls">
                <a href="#" class="slide-prev" id="slide-prev"><i class="fa fa-angle-left"></i></a> 
                <a href="#" class="slide-next" id="slide-next"><i class="fa fa-angle-right"></i></a>
            </div>
        <?php }  ?>

        
            <div id="cycle-slideshow" class="cycle-slideshow bannerbg"
            data-cycle-log="false"
            data-cycle-fx=<?php echo esc_attr( $bizplus_feature_slider_mode);?>
            data-cycle-speed="<?php echo (esc_attr( $bizplus_feature_slider_time) * 1000)?>"
            data-cycle-carousel-fluid=true
            data-cycle-carousel-visible=1
            data-cycle-pause-on-hover="true"
            data-cycle-slides="> div"
            data-cycle-prev="#slide-prev"
            data-cycle-next="#slide-next"
            data-cycle-auto-height=container
            data-cycle-swipe=true
            data-cycle-swipe-fx=scrollHorz
            <?php if( 1 == $bizplus_feature_enable_pager){ ?>
                data-cycle-pager="#slide-pager"
            <?php }  ?>
            <?php if( 1 != $bizplus_feature_enable_autoplay){ ?>
                data-cycle-timeout=0
            <?php }  ?>
            <?php if(1 == $bizplus_feature_enable_autoplay){ ?>
                data-cycle-timeout=<?php echo (esc_attr( $bizplus_feature_slider_pause_time) * 1000)?>
            <?php }  ?>
            >
                <?php
                $i = 1;
                foreach( $bizplus_slider_arrays as $bizplus_slider_array ){
                    if( $bizplus_feature_slider_number < $i){
                        break;
                    }
                    if(empty($bizplus_slider_array['bizplus-feature-slider-image'])){
                        $bizplus_feature_slider_image = get_template_directory_uri().'/assets/img/no-image-1260_530.png';
                    }
                    else{
                        $bizplus_feature_slider_image =$bizplus_slider_array['bizplus-feature-slider-image'];
                    }
                    ?>
                    <div class="slide-item" style="background-image: url('<?php echo esc_url( $bizplus_feature_slider_image )?>');">
                        <div class="thumb-overlay">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-10 col-sm-10 col-md-8 col-xs-offset-1 col-sm-offset-1 banner-content">
                                        <?php if ((1 == $bizplus_feature_enable_title) || (1 == $bizplus_feature_enable_caption)){?>
                                            <div class="banner-content-inner">
                                                <?php if( 1 == $bizplus_feature_enable_title) {
                                                    ?>
                                                        <h2 class="slider-title"><a href="<?php echo esc_url( $bizplus_slider_array['bizplus-feature-slider-link'] );?>"><?php echo esc_html( $bizplus_slider_array['bizplus-feature-slider-title'] );?></a></h2>
                                                    <?php
                                                }
                                                if( 1 == $bizplus_feature_enable_caption){
                                                    ?>
                                                    <div class="text-content">
                                                        <?php echo wp_kses_post( $bizplus_slider_array['bizplus-feature-slider-content'] );?>
                                                    </div>
                                                    <div class="btn-holder">
                                                        <a href="<?php echo esc_url( $bizplus_slider_array['bizplus-feature-slider-link'] );?>" class="button"><?php echo esc_html($bizplus_feature_button_text); ?></a>
                                                    </div>
                                                    <?php
                                                }?>      
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                $i++;
                }
                ?>
                <?php wp_reset_postdata(); ?>
            </div>
       
        <div class="cycle-pager slide-pager" id="slide-pager"></div>
    </section>
    <?php
        }
    }
endif;
add_action( 'homepage-main-slider', 'bizplus_featured_home_slider', 10 );