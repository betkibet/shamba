<?php
/**
 * For displaying home page.
 * @package bizplus
 */
global $bizplus_customizer_all_values;

get_header();
if ( 'posts' == get_option( 'show_on_front' ) ) {
    include( get_home_template() );
    }
    else{
    	
		/**
		 * bizplus_homepage hook
		 * @since bizplus 1.0.0
		 *
		 * @hooked bizplus_homepage -  10
		 * @sub_hooked bizplus_homepage -  30
		 */
		do_action( 'bizplus_homepage' ); ?>
        <?php  
        $bizplus_selected_page = absint($bizplus_customizer_all_values['bizplus-enable-selected-page']);
        if ($bizplus_selected_page == 1) { ?>
            <div id="content" class="site-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <header class="entry-headers">
                                <?php the_title( '<h1 class="entry-titles">', '</h1>' ); ?>
                            </header><!-- .entry-header -->
                        </div>
                    </div>
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main" role="main">

                            <?php
                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/content', 'page' );

                                // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                                endif;

                            endwhile; // End of the loop.
                            ?>

                        </main><!-- #main -->
                    </div><!-- #primary -->
                    <?php
                        get_sidebar();
                    ?>
                </div>
            </div>
        <?php } ?>
	<?php }
get_footer();
