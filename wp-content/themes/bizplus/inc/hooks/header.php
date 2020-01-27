<?php
if ( ! function_exists( 'bizplus_set_global' ) ) :
/**
 * Setting global values for all saved customizer values
 *
 * @since BizPlus 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bizplus_set_global() {
    /*Getting saved values start*/
    $GLOBALS['bizplus_customizer_all_values'] = bizplus_get_all_options(1);
}
endif;
add_action( 'bizplus_action_before_head', 'bizplus_set_global', 0 );

if ( ! function_exists( 'bizplus_doctype' ) ) :
/**
 * Doctype Declaration
 *
 * @since BizPlus 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bizplus_doctype() {
    ?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>
<?php
}
endif;
add_action( 'bizplus_action_before_head', 'bizplus_doctype', 10 );

if ( ! function_exists( 'bizplus_before_wp_head' ) ) :
/**
 * Before wp head codes
 *
 * @since BizPlus 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bizplus_before_wp_head() {
    ?>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php
}
endif;
add_action( 'bizplus_action_before_wp_head', 'bizplus_before_wp_head', 10 );

if( ! function_exists( 'bizplus_default_layout' ) ) :
    /**
     * BizPlus default layout function
     *
     * @since  BizPlus 1.0.0
     *
     * @param int
     * @return string
     */
    function bizplus_default_layout( $post_id = null ){

        global $bizplus_customizer_all_values,$post;
        $bizplus_default_layout = $bizplus_customizer_all_values['bizplus-default-layout'];
        if( is_home()){
            $post_id = get_option( 'page_for_posts' );
        }
        if( null == $post_id && isset ( $post->ID ) ){
            $post_id = $post->ID;
        }
        $bizplus_default_layout_meta = get_post_meta( $post_id, 'bizplus-default-layout', true );

        if( false != $bizplus_default_layout_meta ) {
            $bizplus_default_layout = $bizplus_default_layout_meta;
        }
        return $bizplus_default_layout;
    }
endif;

if ( ! function_exists( 'bizplus_body_class' ) ) :
/**
 * add body class
 *
 * @since BizPlus 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bizplus_body_class( $bizplus_body_classes ) {
    if(!is_front_page() || ( is_front_page())){
        $bizplus_default_layout = bizplus_default_layout();
        if( !empty( $bizplus_default_layout ) ){
            if( 'left-sidebar' == $bizplus_default_layout ){
                $bizplus_body_classes[] = 'evision-left-sidebar';
            }
            elseif( 'right-sidebar' == $bizplus_default_layout ){
                $bizplus_body_classes[] = 'evision-right-sidebar';
            }
            elseif( 'both-sidebar' == $bizplus_default_layout ){
                $bizplus_body_classes[] = 'evision-both-sidebar';
            }
            elseif( 'no-sidebar' == $bizplus_default_layout ){
                $bizplus_body_classes[] = 'evision-no-sidebar';
            }
            else{
                $bizplus_body_classes[] = 'evision-right-sidebar';
            }
        }
        else{
            $bizplus_body_classes[] = 'evision-right-sidebar';
        }
    }
    return $bizplus_body_classes;

}
endif;
add_action( 'body_class', 'bizplus_body_class', 10, 1);

if ( ! function_exists( 'bizplus_before_page_start' ) ) :
/**
 * intro loader
 *
 * @since BizPlus 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bizplus_before_page_start() {
    global $bizplus_customizer_all_values;
    /*intro loader*/
}
endif;
add_action( 'bizplus_action_before', 'bizplus_before_page_start', 10 );

if ( ! function_exists( 'bizplus_page_start' ) ) :
/**
 * page start
 *
 * @since BizPlus 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bizplus_page_start() {
?>
    <div id="page" class="site">
<?php
}
endif;
add_action( 'bizplus_action_before', 'bizplus_page_start', 15 );

if ( ! function_exists( 'bizplus_skip_to_content' ) ) :
/**
 * Skip to content
 *
 * @since BizPlus 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bizplus_skip_to_content() {
    ?>
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bizplus' ); ?></a>
<?php
}
endif;
add_action( 'bizplus_action_before_header', 'bizplus_skip_to_content', 10 );

if ( ! function_exists( 'bizplus_header' ) ) :
/**
 * Main header
 *
 * @since BizPlus 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bizplus_header() {
    global $bizplus_customizer_all_values;
    global $wp_version;
    global $post;
    ?>
        <header id="masthead" class="wrapper site-header" role="banner">
            <div class="wrapper wrapper-site-identity">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-xs-12 rtl-fright">
                            <div class="site-branding">
                                <?php bizplus_the_custom_logo(); ?>
                                <?php if ( is_front_page() && is_home() ) : ?>
                                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                <?php else : ?>
                                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                                <?php endif;

                                $description = get_bloginfo( 'description', 'display' );
                                if ( $description || is_customize_preview() ) : ?>
                                    <h2 class="site-description"><?php echo $description ; ?></h2>
                                <?php endif; ?>
                            </div><!-- .site-branding -->
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12 rtl-fleft">
                            
                            <div class="row">
                                <div class="col-md-11 col-sm-11 col-xs-10">
                                    <nav id="site-navigation" class="main-navigation" role="navigation">
                                        <?php wp_nav_menu( array( 
                                        'theme_location' => 'primary',
                                        'container' => false,
                                        ) ); ?>
                                    </nav>
                                </div>
                                
                                    <div class="col-xs-12 col-sm-1 col-md-1">
                                        <a href="#site-navigation" id="hamburger" class="clearfix"><span></span></a>
                                        <?php 
                                        $bizplus_enable_search = $bizplus_customizer_all_values['bizplus-search-enable' ];
                                        if ($bizplus_enable_search == 1) { ?>
                                            <div class="search-holder">
                                              <a class="button-search button-outline" href="#">
                                              <i class="fa fa-search"></i></a>                                 
                                            </div>
                                         <?php } ?>

                                    </div>
                                     <div id="top-search" class="top-search clearfix">
                                        <?php get_search_form(); ?>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- slider section -->
            <?php 
            if (  is_front_page() && !is_home() ) {
                do_action('homepage-main-slider');
            }
            else {
                do_action('bizplus-page-inner-title');
            }
            ?>

        </header>
<?php 
}
endif;
add_action( 'bizplus_action_header', 'bizplus_header', 10 );

if( ! function_exists( 'bizplus_add_breadcrumb' ) ) :

/**
 * Breadcrumb
 *
 * @since BizPlus 1.0.0
 *
 * @param null
 * @return null
 *
 */
    function bizplus_add_breadcrumb(){
        global $bizplus_customizer_all_values;
        // Bail if Breadcrumb disabled
        $breadcrumb_enable_breadcrumb = $bizplus_customizer_all_values['bizplus-enable-breadcrumb' ];
        if ( 1 != $breadcrumb_enable_breadcrumb ) {
            return;
        }
        // Bail if Home Page
        if ( is_front_page() || is_home() ) {
            return;
        }
        echo '<div id="breadcrumb" class="wrapper wrap-breadcrumb"><div class="container">';
         bizplus_simple_breadcrumb();
        echo '</div><!-- .container --></div><!-- #breadcrumb -->';
        return;
    }
endif;
add_action( 'bizplus_action_after_title', 'bizplus_add_breadcrumb', 10 );


