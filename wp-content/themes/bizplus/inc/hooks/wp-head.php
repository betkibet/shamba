<?php

if( ! function_exists( 'bizplus_wp_head' ) ) :

    /**
     * bizplus wp_head hook
     *
     * @since  bizplus 1.0.0
     */
    function bizplus_wp_head(){
      
        global $bizplus_customizer_all_values;
        global $bizplus_google_fonts;

        $bizplus_background_color = get_background_color();
        $bizplus_primary_color_option = $bizplus_customizer_all_values['bizplus-primary-color'];
        $bizplus_alternate_primary_color_option = $bizplus_customizer_all_values['bizplus-alternate-primary-color'];
        $bizplus_site_identity_color_option = $bizplus_customizer_all_values['bizplus-site-identity-color'];
        $bizplus_main_title_color_option = $bizplus_customizer_all_values['bizplus-main-title-color'];
        $bizplus_main_sub_title_color_option = $bizplus_customizer_all_values['bizplus-main-sub-title-color'];
        $bizplus_menu_color_option = $bizplus_customizer_all_values['bizplus-menu-color'];
        $bizplus_text_over_image_color_option = $bizplus_customizer_all_values['bizplus-text-over-image-color'];
        $bizplus_button_standard_color_option = $bizplus_customizer_all_values['bizplus-button-standard-color'];
        $bizplus_button_border_color_option = $bizplus_customizer_all_values['bizplus-button-border-color'];
        $bizplus_link_color_option = $bizplus_customizer_all_values['bizplus-link-color'];
        $bizplus_primary_hover_color_option = $bizplus_customizer_all_values['bizplus-primary-hover-color'];
        $bizplus_button_standard_hover_color_option = $bizplus_customizer_all_values['bizplus-button-standard-hover-color'];
        
        $bizplus_bg_hearder_color_option = $bizplus_customizer_all_values['bizplus-bg-header-color'];
        $bizplus_bg_breadcrumb_color_option = $bizplus_customizer_all_values['bizplus-bg-breadcrumb-color'];
        $bizplus_bg_footer_color_option = $bizplus_customizer_all_values['bizplus-bg-footer-color'];
        
        /*font settings*/
        $bizplus_font_family_primary_option = $bizplus_google_fonts[$bizplus_customizer_all_values['bizplus-font-family-Primary']];
        $bizplus_font_family_site_identity_option = $bizplus_google_fonts[$bizplus_customizer_all_values['bizplus-font-family-site-identity']];
        $bizplus_font_family_title_option = $bizplus_google_fonts[$bizplus_customizer_all_values['bizplus-font-family-title']];
        $bizplus_font_family_subtitle_option = $bizplus_google_fonts[$bizplus_customizer_all_values['bizplus-font-family-subtitle']];

        /*about section background image*/
        $bizplus_home_about_posts = evision_customizer_get_repeated_all_value(1 , array('bizplus-about-pages-ids'));
        $bizplus_home_about_posts_ids = array();
        if (null != $bizplus_home_about_posts) {
            foreach ($bizplus_home_about_posts as $bizplus_home_about_post) {
                if (0 != $bizplus_home_about_post['bizplus-about-pages-ids']) {
                    $bizplus_home_about_posts_ids = $bizplus_home_about_post['bizplus-about-pages-ids'];
                }
            }
        }
        if (has_post_thumbnail($bizplus_home_about_posts_ids)){
            $bizplus_home_about_bg = wp_get_attachment_image_src( get_post_thumbnail_id($bizplus_home_about_posts_ids), 'full' );
        }  
        else{
            $bizplus_home_about_bg[0] = get_template_directory_uri()."/assets/img/about-bg.jpg";
        }
        /*end of about section*/

        $bizplus_banner_image = $bizplus_customizer_all_values['bizplus-default-banner-image'];
        ?>
        <style type="text/css">
        /*=====COLOR OPTION=====*/

        /*Color*/
        /*----------------------------------*/
        /*background color*/ 
        <?php 
        if( !empty($bizplus_background_color) ){
        ?>
          .box-inner,
          .wrap-team .box-inner:hover .box-content, 
          .wrap-team .box-inner:focus .box-content, 
          .wrap-team .box-inner:active .box-contentm
          .slick-prev:before,
          .slick-next:before,
          body:not(.home) #page .site-content, 
          body.home.blog #page .site-content {
            background-color: #<?php echo esc_html( $bizplus_background_color );?>;
          }
        <?php
        } 
        /*Primary*/
        if( !empty($bizplus_primary_color_option) ){
        ?>
            section.wrapper-slider .slide-pager .cycle-pager-active,
            section.wrapper-slider .slide-pager .cycle-pager-active:visited,
            section.wrapper-slider .slide-pager .cycle-pager-active:hover,
            section.wrapper-slider .slide-pager .cycle-pager-active:focus,
            section.wrapper-slider .slide-pager .cycle-pager-active:active,
            .title-divider,
            .title-divider:visited,
            .block-overlay-hover,
            .block-overlay-hover:visited,
            #gmaptoggle,
            #gmaptoggle:visited,
            .evision-back-to-top,
            .evision-back-to-top:visited,
            .search-form .search-submit,
            .search-form .search-submit:visited,
            .widget_calendar tbody a,
            .widget_calendar tbody a:visited,
            .wrap-portfolio .button.is-checked,
            .button.button-outline:hover, 
            .button.button-outline:focus, 
            .button.button-outline:active,
            .radius-thumb-holder,
            .radius-thumb-holder:before,
            .radius-thumb-holder:hover:before, 
            .radius-thumb-holder:focus:before, 
            .radius-thumb-holder:active:before,
            #pbCloseBtn:hover:before,
            .slide-pager .cycle-pager-active, 
            .slick-dots .slick-active button,
            .slide-pager span:hover,
            .featurepost .latestpost-footer .moredetail a, 
            .featurepost .latestpost-footer .moredetail a:visited,
            #load-wrap,
            .back-tonav,
            .back-tonav:visited,
            .wrap-service .box-container .box-inner:hover .box-content, 
            .wrap-service .box-container .box-inner:focus .box-content,
            .search-holder .search-bg.search-open form{
              background-color: <?php echo esc_html( $bizplus_primary_color_option );?>;
            }

            .widget-title,
            .widgettitle,
            .wrapper-slider,
            .flip-container .front,
            .flip-container .back{
              border-color: <?php echo esc_html( $bizplus_primary_color_option );?> !important; /*#2e5077*/
            }

            @media screen and (min-width: 768px){
            .main-navigation li:hover > a:after,
            .main-navigation .current_page_item > a:after,
            .main-navigation .current-menu-item > a:after,
            .main-navigation .current_page_ancestor > a:after,
            .main-navigation li.active > a:after,
            .main-navigation li.active > a:after,
            .main-navigation li.active > a:after,
            .main-navigation li.current_page_parent a:after {
                background-color: <?php echo esc_html( $bizplus_primary_color_option );?> !important;
              }
            }

            .latestpost-footer .moredetail a,
            .latestpost-footer .moredetail a:visited{
              color: <?php echo esc_html( $bizplus_primary_color_option );?> !important;
            }
        <?php
        }
        if( !empty($bizplus_alternate_primary_color_option) ){
        ?>
            /*Alternate primary color*/
            .search-section button.catselect,
            .search-section button.catselect:visited,
            .wrap-altbg{
              background-color: <?php echo esc_html( $bizplus_alternate_primary_color_option );?> !important;
            }
        <?php
        } 
        if( !empty($bizplus_site_identity_color_option) ){
        ?>
            /*Site identity / logo & tagline*/
            .site-header .wrapper-site-identity .site-title a,
            .site-header .wrapper-site-identity .site-title a:visited,
            .site-header .wrapper-site-identity .site-description {
              color: <?php echo esc_html( $bizplus_site_identity_color_option );?> !important; /*#545C68*/
            }
        <?php
        } 
        if( !empty($bizplus_main_title_color_option) ){
        ?>
            /*Main Titile*/
            .title-section h2,
            .latestpost-content h3 a,
            .latestpost-content h3 a:visited{
              color: <?php echo esc_html( $bizplus_main_title_color_option );?> !important;
            }
        <?php
        } 
        if( !empty($bizplus_main_sub_title_color_option) ){
        ?>
            /*Main Sub Titile*/
            .title-section h3{
              color: <?php echo esc_html( $bizplus_main_sub_title_color_option );?> !important;
            }
        <?php
        } 
        if( !empty($bizplus_menu_color_option) ){
        ?>
            /*Menu*/
            .main-navigation a {
              color: <?php echo esc_html( $bizplus_menu_color_option );?>;
            }
        <?php
        } 
        if( !empty($bizplus_text_over_image_color_option) ){
        ?>
            /*Text over image*/
            .wrapper-slider .slide-item .slider-title a,
            .wrapper-slider .slide-item .slider-title a:visited,
            .wrapper-slider .slide-item .container-fluid,
            .wrapper-slider .slide-item .text-content,
            .wrap-popportfolio,
            h2.block-post-title a,
            .wrap-popportfolio a.line-btn,
            .wrap-popportfolio a.line-btn:visited,
            .wrap-info,
            .wrap-info .title-section h2,
            .wrap-info a.line-btn,
            .wrap-info a.line-btn:visited,
            .page-inner-title .entry-header .entry-title,
            .bannerbg,
            .bannerbg h2,
            .bannerbg .title-section h2,
            .bannerbg .title-section h3,
            .bannerbg .content-area h2 a,
            .bannerbg .content-area .content-text,
            .bannerbg .button.button-outline,
            .bannerbg .button.button-outline:visited,
            .testimonial-slider .slide-item .text-content,
            .testimonial-slider .slider-title a, 
            .testimonial-slider .slider-title a:visited,
            .entry-meta.entry-inner span,
            .entry-inner .posted-on a, 
            .entry-inner .cat-links a, 
            .entry-inner .tags-links a, 
            .entry-inner .author a, 
            .entry-inner .comments-link a {
              color: <?php echo esc_html( $bizplus_text_over_image_color_option );?> !important;
            }

            .wrapper-slider .slide-pager span,
            .wrapper-slider .slide-pager span:visited,
            .bannerbg .title-divider{
              background-color: <?php echo esc_html( $bizplus_text_over_image_color_option );?> !important;
            }

            .testimonial-slider .banner-content-holder,
            .bannerbg .button.button-outline,
            .bannerbg .button.button-outline:visited{
              border-color: <?php echo esc_html( $bizplus_text_over_image_color_option );?> !important;
            }

            .testimonial-slider .thumb-holder > img:hover,
            .testimonial-slider .thumb-holder > img:focus{
              box-shadow: 0 0 0 3px <?php echo esc_html( $bizplus_text_over_image_color_option );?> !important;
            }
        <?php
        } 
        if( !empty($bizplus_button_standard_color_option) ){
        ?>
            /*Button standard*/
            .button,
            button,
            html input[type="button"],
            input[type="button"],
            input[type="reset"],
            input[type="submit"],
            button:visited,
            .button:visited,
            input[type="button"]:visited,
            input[type="reset"]:visited,
            input[type="submit"]:visited,
            .search-section button.pageselect,
            .search-section button.pageselect:visited {
              background: <?php echo esc_html( $bizplus_button_standard_color_option );?> !important;
            }
        <?php
        } 
        if( !empty($bizplus_button_border_color_option) ){
        ?>
            /*Button border only*/
            .button-outline,
            .button-outline:visited{
              border-color: <?php echo esc_html( $bizplus_button_border_color_option );?> !important;
            }
        <?php
        } 
        if( !empty($bizplus_link_color_option) ){
        ?>
            /*Link color*/
            .posted-on a,
            .cat-links a,
            .tags-links a,
            .author a,
            .comments-link a,
            .edit-link a,
            .nav-links .nav-previous a,
            .nav-links .nav-next a,
            .comment-metadata a,
            .pingback .edit-link a {
              color: <?php echo esc_html( $bizplus_link_color_option );?> !important;
            }
        <?php
        } 
        if( !empty($bizplus_primary_hover_color_option) ){
        ?>
            /*Hover*/
            /*----------------------------------*/

            /*Primary hover*/
              a:hover,
              a:focus,
              a:active,
              h1 a:hover,
              h1 a:focus,
              h1 a:active,
              h2 a:hover,
              h2 a:focus,
              h2 a:active,
              h3 a:hover,
              h3 a:focus,
              h3 a:active,
              h4 a:hover,
              h4 a:focus,
              h4 a:active,
              h5 a:hover,
              h5 a:focus,
              h5 a:active,
              h6 a:hover,
              h6 a:focus,
              h6 a:active,
              .contact-widget ul li a:hover,
              .contact-widget ul li a:focus,
              .contact-widget ul li a:active,
              .contact-widget ul li a:hover i,
              .contact-widget ul li a:focus i,
              .contact-widget ul li a:active i,
              .site-title a:hover,
              .site-title a:focus,
              .site-title a:active,
              .main-navigation li:hover > a,
              .main-navigation li:focus > a,
              .main-navigation li:active > a,
              .main-navigation ul ul a:hover,
              .main-navigation ul ul a:focus,
              .main-navigation ul ul a:active,
              .wrapper-slider .slide-item .slider-title a:hover,
              .wrapper-slider .slide-item .slider-title a:focus,
              .wrapper-slider .slide-item .slider-title a:active,
              .latestpost-content h3 a:hover,
              .latestpost-content h3 a:focus,
              .latestpost-content h3 a:active,
              .latestpost-footer a:hover,
              .latestpost-footer a:focus,
              .latestpost-footer a:active,
              .latestpost-footer a:hover i,
              .latestpost-footer a:focus i,
              .latestpost-footer a:active i,
              .posted-on a:hover,
              .posted-on a:focus,
              .posted-on a:active,
              .cat-links a:hover,
              .cat-links a:focus,
              .cat-links a:active,
              .tags-links a:hover,
              .tags-links a:focus,
              .tags-links a:active,
              .author a:hover,
              .author a:focus,
              .author a:active,
              .comments-link a:hover,
              .comments-link a:focus,
              .edit-link a:hover,
              .edit-link a:focus,
              .edit-link a:active,
              .nav-links .nav-previous a:hover,
              .nav-links .nav-previous a:focus,
              .nav-links .nav-previous a:active,
              .nav-links .nav-next a:hover,
              .nav-links .nav-next a:focus,
              .nav-links .nav-next a:active,
              .search-form .search-submit:hover,
              .search-form .search-submit:focus,
              .search-form .search-submit:active,
              .widget li a:hover,
              .widget li a:focus,
              .widget li a:active{
              color: <?php echo esc_html( $bizplus_primary_hover_color_option );?> !important; /*#DFB200*/
            }

            .wrapper-slider .controls .slide-prev i:hover,
            .wrapper-slider .controls .slide-prev i:focus,
            .wrapper-slider .controls .slide-prev i:active,
            .wrapper-slider .controls .slide-next i:hover,
            .wrapper-slider .controls .slide-next i:focus,
            .wrapper-slider .controls .slide-next i:active,
            .search-section button.catselect:hover,
            .search-section button.catselect:focus,
            .search-section button.catselect:active,
            .search-section button.pageselect:hover,
            .search-section button.pageselect:focus,
            .search-section button.pageselect:active,
            .wrapper-slider .slide-pager span:hover,
            .wrapper-slider .slide-pager span:focus,
            .wrapper-slider .slide-pager span:active,
            .latestpost-footer .moredetail a:hover,
            .latestpost-footer .moredetail a:focus,
            .latestpost-footer .moredetail a:active,
            .latestpost:hover:after,
            .latestpost:focus:after,
            .latestpost:active:after,
            #gmaptoggle:hover,
            #gmaptoggle:focus,
            #gmaptoggle:active,
            .widget_calendar tbody a:hover,
            .widget_calendar tbody a:focus,
            .widget_calendar tbody a:active,
            .search-holder .search-bg,
            .featurepost .latestpost-footer .moredetail a:hover, 
            .featurepost .latestpost-footer .moredetail a:focus,
            .featurepost .latestpost-footer .moredetail a:active{
              background-color: <?php echo esc_html( $bizplus_primary_hover_color_option );?> !important; /*#DFB200*/
            }

            .wrapper-slider .controls .slide-prev i:hover,
            .wrapper-slider .controls .slide-prev i:focus,
            .wrapper-slider .controls .slide-prev i:active,
            .wrapper-slider .controls .slide-next i:hover,
            .wrapper-slider .controls .slide-next i:focus,
            .wrapper-slider .controls .slide-next i:active,
            .nav-links .nav-previous a:hover,
            .nav-links .nav-previous a:focus,
            .nav-links .nav-previous a:active,
            .nav-links .nav-next a:hover,
            .nav-links .nav-next a:focus,
            .nav-links .nav-next a:active{
              border-color: <?php echo esc_html( $bizplus_primary_hover_color_option );?> !important;
            }
        <?php
        } 
        if( !empty($bizplus_button_standard_hover_color_option) ){
        ?>
            /*Button standard*/
            button:hover,
            a.btn:hover,
            a.line-btn:hover,
            input[type="button"]:hover,
            input[type="reset"]:hover,
            input[type="submit"]:hover,
            button:focus,
            a.btn:focus,
            a.line-btn:focus,
            input[type="button"]:focus,
            input[type="reset"]:focus,
            input[type="submit"]:focus,
            button:active,
            a.btn:active,
            a.line-btn:active,
            input[type="button"]:active,
            input[type="reset"]:active,
            input[type="submit"]:active {
              background-color: <?php echo esc_html( $bizplus_button_standard_hover_color_option );?> !important;
            }

            a.line-btn:hover,
            a.line-btn:focus,
            a.line-btn:active{
              border-color: <?php echo esc_html( $bizplus_button_standard_hover_color_option );?> !important;
            }
            
        <?php
        } 
        if( !empty($bizplus_bg_hearder_color_option) ){
        ?>
            /*Background Color*/
              /*Header*/
              .top-header,
              .site-header{
                background-color: <?php echo esc_html( $bizplus_bg_hearder_color_option );?> !important;
              }
        <?php
        } 
        if( !empty($bizplus_bg_breadcrumb_color_option) ){
        ?> 
              .wrap-breadcrumb{
                background-color: <?php echo esc_html( $bizplus_bg_breadcrumb_color_option );?> !important; /*#1D3A5B*/
              }
        <?php
        } 
        if( !empty($bizplus_bg_footer_color_option) ){
        ?> 
          /*footer*/
          .site-footer{
            background-color: <?php echo esc_html( $bizplus_bg_footer_color_option );?> !important; /*#636B6B*/
          }

        <?php
        } 
        if( !empty($bizplus_font_family_primary_option) ){
        /*=====FONT FAMILY OPTION=====*/
        ?> 
        /*Primary*/
          html, body, p, button, input, select, textarea, pre, code, kbd, tt, var, samp , .main-navigation a, search-input-holder .search-field{
          font-family: '<?php echo esc_html( $bizplus_font_family_primary_option ); ?>'; /*Lato*/
          }
        <?php
        } 

        if( !empty($bizplus_font_family_site_identity_option) ){
        ?> 
          /*Site identity / logo & tagline*/
          .site-title a, .site-description {
          font-family: '<?php echo esc_html( $bizplus_font_family_site_identity_option ); ?>'; /*Lato*/
          }
        <?php
        } 
        if( !empty($bizplus_font_family_title_option) ){
        ?> 
          /*Title*/
          h1, h1 a,
          h2, h2 a,
          h3, h3 a,
          h4, h4 a,
          h5, h5 a,
          h6, h6 a{
            font-family: '<?php echo esc_html( $bizplus_font_family_title_option ); ?>'; /*Lato*/
          }
        <?php
        } 
          if( !empty($bizplus_font_family_subtitle_option) ){
          ?>
          /*Subtitle*/
          .title-section h3 {
            font-family: "<?php echo esc_html( $bizplus_font_family_subtitle_option ); ?>"; /*Cookie*/
          }
        <?php
        }
        /* about bg */
        if( !empty( $bizplus_home_about_bg) ){
        ?>
        .sub-wrapper {
            background-image: url(<?php echo esc_url($bizplus_home_about_bg[0]);?>);
        }
        .sub-wrapper.about-only{
          background-size: 100%;
        }

        .sub-wrapper.testimonial-only{
          background-image: none;
        }
        
        <?php
        }
        /* Banner Image */
        if( !empty( $bizplus_banner_image ) ){
        ?>
        .page-inner-title {
         background-image: url(<?php echo esc_url($bizplus_banner_image);?>);
        }
        <?php 
        }?>
        </style>
    <?php
    }
endif;
add_action( 'wp_head', 'bizplus_wp_head' );