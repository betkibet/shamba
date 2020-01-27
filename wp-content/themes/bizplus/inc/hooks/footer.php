<?php
if ( ! function_exists( 'bizplus_before_footer' ) ) :
    /**
     * Footer content
     *
     * @since BizPlus 1.0.0
     *
     * @param null
     * @return false | void
     *
     */
    function bizplus_before_footer() {
    ?>
    </div>
    </div><!-- #content -->
        <!-- *****************************************
             Footer section starts
    ****************************************** -->
    <footer id="colophon" class="wrapper site-footer" role="contentinfo">
    <?php
    }
endif;
add_action( 'bizplus_action_before_footer', 'bizplus_before_footer', 10 );

if ( ! function_exists( 'bizplus_widget_before_footer' ) ) :
    /**
     * Footer content
     *
     * @since bizplus 1.0.0
     *
     * @param null
     * @return false | void
     *
     */
    function bizplus_widget_before_footer() {
        global $bizplus_customizer_all_values;
        if( !is_active_sidebar( 'footer-col-one' ) && !is_active_sidebar( 'footer-col-two' ) && !is_active_sidebar( 'footer-col-three' )){
            return false;
        }?>
        <section class="wrapper block-section footer-widget">
            <div class="container overhidden">
                <div class="contact-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <?php if( is_active_sidebar( 'footer-col-one' ) ) : ?>
                                    <div class="contact-list col-md-4">
                                        <?php dynamic_sidebar( 'footer-col-one' ); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if( is_active_sidebar( 'footer-col-two' )  ) : ?>
                                    <div class="contact-list col-md-4">
                                        <?php dynamic_sidebar( 'footer-col-two' ); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if( is_active_sidebar( 'footer-col-three' )  ) : ?>
                                    <div class="contact-list col-md-4">
                                        <?php dynamic_sidebar( 'footer-col-three' ); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php
    }
endif;
add_action( 'bizplus_action_widget_before_footer', 'bizplus_widget_before_footer', 10 );

if ( ! function_exists( 'bizplus_footer' ) ) :
    /**
     * Footer content
     *
     * @since BizPlus 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function bizplus_footer() {
        global $bizplus_customizer_all_values;
        ?>
        <?php
        if( has_nav_menu( 'social' ) ){
            ?>
        <section class="wrapper wrap-social">
            <div class="container social-menu">
                <div class="footer-social-menu">
                        <div class="social-widget evision-social-section social-icon-only top-tooltip">
                            <?php
                                wp_nav_menu( array( 'theme_location' => 'social', 'link_before' => '<span>',
                                    'link_after'=>'</span>' , 'menu_id' => 'primary-menu','fallback_cb' => false, ) );
                            ?>
                        </div>
                </div>
            </div>
        </section>
        <?php
        }
        ?>
        
        <!-- footer site info -->
        <section id="colophon" class="wrapper wrap-site-info" role="contentinfo">
             <div class="container site-info">
                <?php
                if(isset($bizplus_customizer_all_values['bizplus-copyright-text'])){
                    echo wp_kses_post( $bizplus_customizer_all_values['bizplus-copyright-text'] );
                }
                ?>
                <span class="sep"> | </span>
                <?php printf( esc_html__( 'Theme: %1$s by %2$s', 'bizplus' ), 'BizPlus', '<a href="http://evisionthemes.com/" target = "_blank" rel="designer">eVisionThemes </a>' ); ?>
            </div><!-- .site-info -->
        </section><!-- #colophon -->

    </footer><!-- #colophon -->
    <!-- *****************************************
             Footer section ends
    ****************************************** -->
    <?php
    }
endif;
add_action( 'bizplus_action_footer', 'bizplus_footer', 10 );

if ( ! function_exists( 'bizplus_page_end' ) ) :
    /**
     * Page end
     *
     * @since BizPlus 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function bizplus_page_end() {
    global $bizplus_customizer_all_values;
        ?>
        </div><!-- #page -->
    <?php
     if( isset( $bizplus_customizer_all_values['bizplus-enable-back-to-top'] )  && 1 == $bizplus_customizer_all_values['bizplus-enable-back-to-top']) {
        ?>
            <a id="gotop" class="back-tonav" href="#page"><i class="fa fa-angle-up"></i></a>
        <?php
        }
    }
endif;
add_action( 'bizplus_action_after', 'bizplus_page_end', 10 );