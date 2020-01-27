<?php
if ( ! function_exists( 'bizplus_home_blog' ) ) :
    /**
     * Blog Section
     *
     * @since BizPlus 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function bizplus_home_blog() {
        global $bizplus_customizer_all_values;
        $bizplus_home_blog_button_text = $bizplus_customizer_all_values['bizplus-home-blog-button-text'];
        $bizplus_home_blog_button_link = $bizplus_customizer_all_values['bizplus-home-blog-button-link'];
        $bizplus_home_blog_single_words = $bizplus_customizer_all_values['bizplus-home-blog-single-words'];
        
        $bizplus_home_blog_category = $bizplus_customizer_all_values['bizplus-home-blog-category'];
        $bizplus_home_blog_number = 1;
        $bizplus_sticky = get_option( 'sticky_posts' );
        if (empty($bizplus_sticky)) {
            $bizplus_home_blog_number = 4;
        }
        else{
            $bizplus_home_blog_number = 3;
        }
        if( 1 != $bizplus_customizer_all_values['bizplus-home-blog-enable'] ){
            return null;
        }
        ?>

        <section class="wrapper wrap-latestpost wrap-altbg">
            <div class="container overhidden">
                <div class="row">
                    <div class="col-md-12">
                        <header class="title-section evision-animate slideInDown" data-wow-delay="0s">
                        <?php 
                        $repeated_main_page = array('bizplus-blog-main-pages-ids'); 
                        $bizplus_home_blog_main_posts = evision_customizer_get_repeated_all_value(1 , $repeated_main_page);
                        $bizplus_home_blog_main_posts_ids = array();
                        foreach ($bizplus_home_blog_main_posts as $bizplus_home_blog_main_post) {
                            if (0 != $bizplus_home_blog_main_post['bizplus-blog-main-pages-ids']) {
                                $bizplus_home_blog_main_posts_ids[] = $bizplus_home_blog_main_post['bizplus-blog-main-pages-ids'];
                            }
                            else {
                                $bizplus_home_blog_main_posts_ids[] = 2;
                            }
                        }
                        if( !empty( $bizplus_home_blog_main_posts_ids )){
                            $bizplus_home_blog_main_args = array(
                                'post_type' => 'page',
                                'post__in' => array_map( 'absint', $bizplus_home_blog_main_posts_ids ),
                                'orderby' => 'post__in'
                            );
                        }
                        if( !empty( $bizplus_home_blog_main_args )){
                            $home_blog_main_page_query = new WP_Query($bizplus_home_blog_main_args);
                            while ($home_blog_main_page_query->have_posts()): $home_blog_main_page_query->the_post();
                        ?>
                        <?php
                        if (has_excerpt()) {
                            $bizplus_home_blog_main_content = get_the_excerpt();
                        }
                        else {
                            $bizplus_home_blog_main_content = bizplus_words_count( 15 ,get_the_content());
                        } ?>
                            <h3><?php echo esc_html( $bizplus_home_blog_main_content );?></h3>
                            <h2><?php the_title(); ?></h2>
                            <span class="title-divider"></span>
                            <?php endwhile;
                        } ?>
                        <?php wp_reset_postdata(); ?>
                        </header>
                    </div>
                </div>
            </div>
            <div class="container overhidden">
                <div class="row">
                    <!-- if there is any sticky -->
                    <?php
                    $bizplus_home_blog_stiky_args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 1,
                    );
                    $bizplus_home_blog_sticky_post_query = new WP_Query($bizplus_home_blog_stiky_args);
                    $bizplus_sticky_flag = true;
                    if ($bizplus_home_blog_sticky_post_query->have_posts()) :
                        $data_delay = 0;
                        while ($bizplus_home_blog_sticky_post_query->have_posts()) : $bizplus_home_blog_sticky_post_query->the_post();
                            if(has_post_thumbnail()){
                                $thumbs = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'bizplus-sticky-post' );
                                $urls = $thumbs['0'];
                            }
                            else{
                                $urls = get_template_directory_uri().'/assets/img/no-image.jpg';
                            }
                            $data_wow_delay = 'data-wow-delay='.$data_delay.'s';
                                if ($bizplus_sticky_flag == true){
                                    if ( is_sticky()) { ?>
                                        <div class="col-xs-12 col-sm-12 col-md-8">
                                            <div class="featurepost latestpost evision-animate slideInDown" <?php echo esc_attr( $data_wow_delay );?>>
                                                <div class="row row-same-height">
                                                    <div class="col-xs-12 col-sm-6 col-md-7 col-same-height">
                                                        <div class="latestpost-thumb">
                                                            <a href="<?php the_permalink();?>">
                                                                <img src="<?php echo esc_url( $urls ); ?>" alt="<?php the_title_attribute();?>">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-5 col-same-height">
                                                        <div class="latestpost-inner">
                                                            <div class="latestpost-content">
                                                                <h3>
                                                                    <a href="<?php the_permalink();?>">
                                                                        <?php the_title(); ?>
                                                                    </a>
                                                                </h3>
                                                                <?php
                                                                if (has_excerpt()) {
                                                                    $bizplus_home_blog_content = get_the_excerpt();
                                                                }
                                                                else {
                                                                    $bizplus_home_blog_content = bizplus_words_count( absint($bizplus_home_blog_single_words), get_the_content());
                                                                } 
                                                                echo esc_html( $bizplus_home_blog_content );
                                                                ?>
                                                                
                                                            </div>
                                                            <div class="latestpost-footer">
                                                                <span>
                                                                    <?php
                                                                    $archive_year  = get_the_time('Y'); 
                                                                    $archive_month = get_the_time('m'); 
                                                                    $archive_day   = get_the_time('d'); 
                                                                    ?>
                                                                    <a href="<?php echo esc_url(get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><i class="fa fa-calendar"></i> <?php echo esc_html(get_the_date('M j, Y'));?></a>
                                                                </span>
                                                                <span>
                                                                    <a href="<?php the_permalink(); ?>">
                                                                        <i class="fa fa-comment"></i>
                                                                        <?php
                                                                            $commentscount = get_comments_number();
                                                                            if($commentscount == 1): $commenttext = ''; endif;
                                                                            if($commentscount > 1 || $commentscount == 0): $commenttext = ''; endif;
                                                                            echo esc_html($commentscount).' '.esc_html($commenttext);
                                                                        ?>
                                                                    </a>
                                                                </span>
                                                                <span class="moredetail"><a href="<?php the_permalink(); ?>"><i class="fa fa-angle-right"></i></a></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php 
                                    }
                                    $bizplus_sticky_flag = false;
                                }

                             wp_reset_postdata(); ?>
                        <?php endwhile; 
                        endif;
                        ?>
                <!-- not any sticky -->
                    <?php
                    $bizplus_home_blog_args = array(
                        'post_type' => 'post',
                        'posts_per_page' => intval( $bizplus_home_blog_number ),
                        'cat'           => absint($bizplus_home_blog_category),
                        'post__not_in' => get_option( 'sticky_posts' ),
                    );
                    $bizplus_flag = true;
                    $bizplus_home_blog_post_query = new WP_Query($bizplus_home_blog_args);
                    if ($bizplus_home_blog_post_query->have_posts()) :
                        $data_delay = 0;
                        while ($bizplus_home_blog_post_query->have_posts()) : $bizplus_home_blog_post_query->the_post();
                            if(has_post_thumbnail()){
                                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'bizplus-sticky-post' );
                                $url = $thumb['0'];
                            }
                            else{
                                $url = get_template_directory_uri().'/assets/img/no-image.jpg';
                            }
                            /*thumbnail lfor small post*/
                            if(has_post_thumbnail()){
                                $thumb_small = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'bizplus-small-post' );
                                $url_small = $thumb_small['0'];
                            }
                            else{
                                $url_small = get_template_directory_uri().'/assets/img/no-image-100-100.png';
                            }
                            $data_wow_delay = 'data-wow-delay='.$data_delay.'s';
                            if ( $bizplus_flag == true){
                                if (empty($bizplus_sticky)) { ?>
                                    <div class="col-xs-12 col-sm-12 col-md-8">
                                        <div class="featurepost latestpost evision-animate slideInDown" <?php echo esc_attr( $data_wow_delay );?>>
                                            <div class="row row-same-height">
                                                <div class="col-xs-12 col-sm-6 col-md-7 col-same-height">
                                                    <div class="latestpost-thumb">
                                                        <a href="<?php the_permalink();?>">
                                                            <img src="<?php echo esc_url( $url ); ?>" alt="<?php the_title_attribute();?>">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-md-5 col-same-height">
                                                    <div class="latestpost-inner">
                                                        <div class="latestpost-content">
                                                            <h3>
                                                                <a href="<?php the_permalink();?>">
                                                                    <?php the_title(); ?>
                                                                </a>
                                                            </h3>
                                                            <?php
                                                            if (has_excerpt()) {
                                                                $bizplus_home_blog_content = get_the_excerpt();
                                                            }
                                                            else {
                                                                $bizplus_home_blog_content = bizplus_words_count( absint($bizplus_home_blog_single_words), get_the_content());
                                                            } 
                                                            echo esc_html( $bizplus_home_blog_content );
                                                            ?>
                                                        </div>
                                                        <div class="latestpost-footer">
                                                            <span>
                                                                <?php
                                                                $archive_year  = get_the_time('Y'); 
                                                                $archive_month = get_the_time('m'); 
                                                                $archive_day   = get_the_time('d'); 
                                                                ?>
                                                                <a href="<?php echo esc_url(get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><i class="fa fa-calendar"></i> <?php echo esc_html(get_the_date('M j, Y'));?></a>
                                                            </span>
                                                            <span>
                                                                <a href="<?php the_permalink(); ?>">
                                                                    <i class="fa fa-comment"></i>
                                                                    <?php
                                                                        $commentscount = get_comments_number();
                                                                        if($commentscount == 1): $commenttext = ''; endif;
                                                                        if($commentscount > 1 || $commentscount == 0): $commenttext = ''; endif;
                                                                        echo esc_html($commentscount).' '.esc_html($commenttext);
                                                                    ?>
                                                                </a>
                                                            </span>
                                                            <span class="moredetail"><a href="<?php the_permalink(); ?>"><i class="fa fa-angle-right"></i></a></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php 
                                }
                                else{ ?>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="latestpost evision-animate slideInDown" <?php echo esc_attr( $data_wow_delay );?>>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-2 col-md-4">
                                                    <div class="latestpost-thumb">
                                                        <a href="<?php the_permalink();?>">
                                                            <img src="<?php echo esc_url( $url_small ); ?>" alt="<?php the_title_attribute();?>">
                                                        </a>
                                                    </div>

                                                </div>
                                                <div class="col-xs-12 col-sm-10 col-md-8 pad0l">
                                                    <div class="latestpost-inner">
                                                        <div class="latestpost-content">
                                                            <h3>
                                                                <a href="<?php the_permalink();?>">
                                                                    <?php the_title(); ?>
                                                                </a>
                                                            </h3>
                                                        </div>
                                                        <div class="latestpost-footer">
                                                            <span>
                                                                <?php
                                                                $archive_year  = get_the_time('Y'); 
                                                                $archive_month = get_the_time('m'); 
                                                                $archive_day   = get_the_time('d'); 
                                                                ?>
                                                                <a href="<?php echo esc_url(get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><i class="fa fa-calendar"></i> <?php echo esc_html(get_the_date('M j, Y'));?></a>
                                                            </span>
                                                            <span>
                                                                <a href="<?php the_permalink(); ?>">
                                                                    <i class="fa fa-comment"></i>
                                                                    <?php
                                                                        $commentscount = get_comments_number();
                                                                        if($commentscount == 1): $commenttext = ''; endif;
                                                                        if($commentscount > 1 || $commentscount == 0): $commenttext = ''; endif;
                                                                        echo esc_html($commentscount).' '.esc_html($commenttext);
                                                                    ?>
                                                                </a>
                                                            </span>
                                                            <span class="moredetail"><a href="<?php the_permalink(); ?>"><i class="fa fa-angle-right"></i></a></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                                $bizplus_flag = false;
                            }
                            else { ?>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="latestpost evision-animate slideInDown" <?php echo esc_attr( $data_wow_delay );?>>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-2 col-md-4">
                                                <div class="latestpost-thumb">
                                                    <a href="<?php the_permalink();?>">
                                                        <img src="<?php echo esc_url( $url_small ); ?>" alt="<?php the_title_attribute();?>">
                                                    </a>
                                                </div>

                                            </div>
                                            <div class="col-xs-12 col-sm-10 col-md-8 pad0l">
                                                <div class="latestpost-inner">
                                                    <div class="latestpost-content">
                                                        <h3>
                                                            <a href="<?php the_permalink();?>">
                                                                <?php the_title(); ?>
                                                            </a>
                                                        </h3>
                                                    </div>
                                                    <div class="latestpost-footer">
                                                        <span>
                                                            <?php
                                                            $archive_year  = get_the_time('Y'); 
                                                            $archive_month = get_the_time('m'); 
                                                            $archive_day   = get_the_time('d'); 
                                                            ?>
                                                            <a href="<?php echo esc_url(get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><i class="fa fa-calendar"></i> <?php echo esc_html(get_the_date('M j, Y'));?></a>
                                                        </span>
                                                        <span>
                                                            <a href="<?php the_permalink(); ?>">
                                                                <i class="fa fa-comment"></i>
                                                                <?php
                                                                    $commentscount = get_comments_number();
                                                                    if($commentscount == 1): $commenttext = ''; endif;
                                                                    if($commentscount > 1 || $commentscount == 0): $commenttext = ''; endif;
                                                                     echo esc_html($commentscount).' '.esc_html($commenttext);
                                                                ?>
                                                            </a>
                                                        </span>
                                                        <span class="moredetail"><a href="<?php the_permalink(); ?>"><i class="fa fa-angle-right"></i></a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } 
                            ?>

                            <?php wp_reset_postdata(); ?>
                        <?php endwhile; 
                        endif;
                        ?>
                <?php
                    if( !empty ( $bizplus_home_blog_button_text ) ){
                        ?>
                        <div class="clear"></div>
                        <div class="btn-container">
                            <a class="button button-outline" href="<?php echo esc_url( $bizplus_home_blog_button_link );?>">
                                <?php echo esc_html( $bizplus_home_blog_button_text );?>
                            </a>
                        </div>
                        <?php
                    }
                ?>
            </div>
        </section>
        <?php
    }
endif;
add_action( 'bizplus_homepage', 'bizplus_home_blog', 40 );