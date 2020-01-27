<?php

if ( ! function_exists( 'bizplus_portfolio' ) ) :
    /**
     * Portfolio Section
     *
     * @since BizPlus 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function bizplus_portfolio() {

        global $bizplus_customizer_all_values;
        $bizplus_home_portfolio_number = $bizplus_customizer_all_values['bizplus-home-portfolio-number'];
        $repeated_category = array('bizplus-home-portfolio-category-ids');
        if( 1 != $bizplus_customizer_all_values['bizplus-home-portfolio-enable'] ){
            return null;
        }
        ?>
        <section class="wrapper wrap-portfolio wrap-altbg">
            <div class="container overhidden">
                <div class="row">
                    <div class="col-md-12">
                        <header class="title-section evision-animate slideInDown">
                        <?php 
                        $repeated_main_page = array('bizplus-portfolio-main-pages-ids'); 
                        $bizplus_home_portfolio_main_posts = evision_customizer_get_repeated_all_value(1 , $repeated_main_page);
                        $bizplus_home_portfolio_main_posts_ids = array();
                        foreach ($bizplus_home_portfolio_main_posts as $bizplus_home_portfolio_main_post) {
                            if (0 != $bizplus_home_portfolio_main_post['bizplus-portfolio-main-pages-ids']) {
                                $bizplus_home_portfolio_main_posts_ids[] = $bizplus_home_portfolio_main_post['bizplus-portfolio-main-pages-ids'];
                            }
                            else {
                                $bizplus_home_portfolio_main_posts_ids[] = 2;
                            }
                        }
                        if( !empty( $bizplus_home_portfolio_main_posts_ids )){
                            $bizplus_home_portfolio_main_args = array(
                                'post_type' => 'page',
                                'post__in' => array_map( 'absint', $bizplus_home_portfolio_main_posts_ids ),
                                'orderby' => 'post__in'
                            );
                        }
                        if( !empty( $bizplus_home_portfolio_main_args )){
                            $home_portfolio_main_page_query = new WP_Query($bizplus_home_portfolio_main_args);
                            while ($home_portfolio_main_page_query->have_posts()): $home_portfolio_main_page_query->the_post();
                        ?>
                        <?php
                        if (has_excerpt()) {
                            $bizplus_home_portfolio_main_content = get_the_excerpt();
                        }
                        else {
                            $bizplus_home_portfolio_main_content = bizplus_words_count( 15 ,get_the_content());
                        } ?>
                            <h3><?php echo esc_html( $bizplus_home_portfolio_main_content );?></h3>
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
                    <?php
                        $bizplus_portfolio_category = evision_customizer_get_repeated_all_value(2 , $repeated_category);
                        $bizplus_portfolio_cat_posts_ids=array();
                        foreach( $bizplus_portfolio_category as $bizplus_portfolio_cat_post ) {
                            if( 0 != $bizplus_portfolio_cat_post['bizplus-home-portfolio-category-ids'] ){
                                $bizplus_portfolio_cat_posts_ids[] = $bizplus_portfolio_cat_post['bizplus-home-portfolio-category-ids'];
                            }
                        }
                        $bizplus_home_portfolio_args = array();
                        if( !empty( $bizplus_portfolio_cat_posts_ids) ){
                            $bizplus_home_portfolio_args = array(
                                'post_type' => 'post',
                                'cat' => absint($bizplus_portfolio_cat_posts_ids),
                                'ignore_sticky_posts' => true,
                                'posts_per_page' => absint( $bizplus_home_portfolio_number ),
                            );
                        } ?>
                        <div id="filters" class="button-group"> 
                            <button class="button button-outline is-checked" data-filter="*"><?php echo __( 'show all', 'bizplus' ) ?></button>
                            <?php for ($j=0; $j < count($bizplus_portfolio_cat_posts_ids) ; $j++) {
                                $bizplus_category = get_cat_name( $bizplus_portfolio_cat_posts_ids[$j]);
                                $bizplus_category_id = get_cat_id($bizplus_category);
                                if (!empty($bizplus_category)) { ?>
                                    <button class="button button-outline" data-filter=".<?php echo esc_html('cat-'.$bizplus_category_id)?>"><?php echo esc_attr( $bizplus_category)?></button>
                            <?php }     
                            } ?>
                        </div>
                        <?php if (!empty ($bizplus_portfolio_cat_posts_ids)){ ?>
                            <div id='port-gallery' class="grid">
                                <?php 
                                $bizplus_home_portfolio_post_query = new WP_Query($bizplus_home_portfolio_args);
                                if ($bizplus_home_portfolio_post_query->have_posts()) :
                                    $data_delay = 0;
                                    while ($bizplus_home_portfolio_post_query->have_posts()) : $bizplus_home_portfolio_post_query->the_post();
                                        $bizplus_cat_id = array();
                                        if(has_post_thumbnail()){
                                            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
                                            $url = $thumb['0'];
                                        }
                                        else{
                                            $url = get_template_directory_uri().'/assets/img/no-image.jpg';
                                        }
                                        $data_wow_delay = 'data-wow-delay='.$data_delay.'s';
                                        ?> 
                                        <?php 
                                        $bizplus_categories = get_the_category();
                                        foreach ($bizplus_categories as $bizplus_cat) {
                                            $bizplus_cat_id[] = $bizplus_cat->term_id;
                                        }
                                        $cat_ids = implode(' cat-',$bizplus_cat_id);
                                        ?>
                                        <div class="element-item <?php echo ('cat-'.esc_attr($cat_ids)); ?> " data-category="transition">
                                            <div class="radius-thumb-holder">
                                                <figure>  
                                                    <img src="<?php echo esc_url( $url ); ?>" alt="<?php the_title_attribute();?>">
                                                </figure>
                                                <div class="radius-thumb-hover">
                                                    <h3 class="radius-thumb-title">
                                                        <a href="<?php the_permalink();?>" <?php the_title_attribute(); ?>>
                                                            <?php the_title(); ?>
                                                        </a>
                                                    </h3>
                                                    <a class="popup-open" href="<?php echo esc_url( $url ); ?>" alt="<?php the_title_attribute();?>">
                                                        <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    <?php endwhile; ?>
                                    <?php endif; wp_reset_postdata(); 
                                ?>
                            </div>
                        <?php } else {
                        $url = get_template_directory_uri().'/assets/img/no-image.jpg';
                         ?>
                            <div id='port-gallery' class="grid">
                                <div class="element-item" data-category="transition">
                                    <div class="radius-thumb-holder">
                                        <figure>  
                                            <img src="<?php echo esc_url( $url ); ?>" alt="<?php the_title_attribute();?>">
                                        </figure>
                                        <div class="radius-thumb-hover">
                                            <h3 class="radius-thumb-title">
                                                <a href="#">
                                                    <?php echo esc_html__( 'Item title', 'bizplus' ); ?>
                                                </a>
                                            </h3>
                                            <a class="popup-open" href="<?php echo esc_url( $url ); ?>" alt="<?php the_title_attribute();?>">
                                                <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>   
                </div>
            </div>
        </section>
        <?php
    }
endif;
add_action( 'bizplus_homepage', 'bizplus_portfolio', 20 );