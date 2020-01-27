// On window load

jQuery(window).load(function(){
  jQuery('#load-wrap').css('opacity','0').hide();
});

// On document ready
jQuery(document).ready(function ($) {
    // Search

    //hide and show search 
    $(".search-holder .button-search").click(function(){
        $("#top-search").slideToggle("400");
    });
        // add toggle class to search icon
    $(".search-holder .button-search").click(function () {
      $("i.fa.fa-search").toggleClass("fa-close");   
    });  

    //What happen on window scroll
    function back_to_top(){
        var scrollTop = $(window).scrollTop();
        var offset = 500;
        if (scrollTop < offset) {
            $('.evision-back-to-top').hide();
        } else {
            $('.evision-back-to-top').show();
        }
    }

    // slick jQuery 
    jQuery('.carousel-group').slick({
      autoplay: true,
      autoplaySpeed: 3000,
      dots: true,
      slidesToShow: 4,
      slidesToScroll: 1,
      lazyLoad: 'ondemand',
      responsive: [
         {
           breakpoint: 1024,
           settings: {
             slidesToShow: 3,
             slidesToScroll: 3,
             infinite: true,
             dots: true
           }
         },
         {
           breakpoint: 768,
           settings: {
             slidesToShow: 2,
             slidesToScroll: 2
           }
         },
         {
           breakpoint: 481,
           settings: {
             slidesToShow: 1,
             slidesToScroll: 1
           }
         }
         // You can unslick at a given breakpoint now by adding:
         // settings: "unslick"
         // instead of a settings object
       ]
    });

    jQuery(window).on("scroll", function (e) {
        back_to_top();
    });
    back_to_top();

    $('a[href*="#"]').on('click', function(event){
        if ($(this.hash).length){
            event.preventDefault();
            $("html, body").stop().animate({scrollTop: $(this.hash).offset().top - 70}, 2e3, "easeInOutExpo");
        }
    });

    /*wow js*/
    wow = new WOW({
            boxClass: 'evision-animate'
        }
    )
    wow.init();

    // mmenu
    jQuery("#site-navigation").mmenu({
       // options
       "classes": "mm-slide mm-light",
       "counters": true,
       "header": true,
       "offCanvas": {
          "position"  : "right",
          "zposition": "back"
           },
       "extensions" : [ 'effect-slide-menu', 'pageshadow' ],
       "navbar"         : {
        "title"     : 'MENU'
       },
       "navbars"        : [{
            "position"  : 'top',
            "content"       : [
                'prev',
                'title',
                'close'
            ]
        }
       ]
    }, {
       // configuration
       clone: true
    });


    // window scroll
    $(window).scroll(function() {
      
      // fixed header
      var fixedBackgroundColor = 'rgba(0,0,0,0.7)',
          scrollTopPosition    = (document.documentElement && document.documentElement.scrollTop) || 
              document.body.scrollTop,
          // scrollTopPosition    = $('body').scrollTop(),
          selectedHeader       = $('.wrapper-site-identity'),
          defaultHeaderCss     = {

                                   'backgroundColor' : 'transparent'
                                 },
          selectedHeaderHidden = $(selectedHeader).find('.site-description');

      selectedHeader.css( defaultHeaderCss);
      selectedHeaderHidden.show();

      if( scrollTopPosition > 15 ){
        defaultHeaderCss.backgroundColor = fixedBackgroundColor;
        selectedHeaderHidden.display = 'none';
        defaultHeaderCss.paddingTop = '5px';
        defaultHeaderCss.paddingBottom = '5px';
        selectedHeader.css( defaultHeaderCss );
        selectedHeaderHidden.hide();
      } else {

         defaultHeaderCss.paddingTop = '15px';
         defaultHeaderCss.paddingBottom = '15px';
        selectedHeader.css( defaultHeaderCss );
      }
      

      // gotop on scroll
      if( scrollTopPosition > 240 ) {
        $('#gotop').css({'bottom': 25});
      } else {
        $('#gotop').css({'bottom': -125});
      }

    });

    // resize
    $(window).resize(function(){
       var  mastheadHeight = $('#masthead').outerHeight(),
            mobileScreen = $(window).width();
          $( '#fixedhead' ).css({'width': mobileScreen });
          //mobileScreenMargin(mobileScreen);
    });

    // popup for image in isotope
    $( '#port-gallery' ).photobox( '.element-item .popup-open', {
     time:0,
     zoomable:false
     //single: true
    });

    // gmap
    jQuery("#gmaptoggle").click(function(){
        $("#gmaptoggle-container").toggleClass("gmaptoggle-full");
        $("#gmaptoggle i").toggleClass("fa-arrow-circle-up fa-arrow-circle-down");
    });

    /*google map customizer value assigned*/
    var mapDataValue = google_map_value['bizplus-home-map-detail'];
    var zoomLevel = google_map_value['bizplus-home-map-zoom-level'];
    var latlag = mapDataValue.split(',');
    var myCenter=new google.maps.LatLng(parseFloat(latlag[0]),parseFloat(latlag[1]));
    function initialize()
    {
    var mapProp = {
      center:myCenter,
      zoom:parseInt(zoomLevel),
      scrollwheel: false,
      navigationControl: true,
      mapTypeControl: true,
      scaleControl: true,
      draggable: true,
      mapTypeId:google.maps.MapTypeId.ROADMAP
      };
    var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
    var marker=new google.maps.Marker({
      position:myCenter,
      });
    marker.setMap(map);
    }
    google.maps.event.addDomListener(window, 'load', initialize);

        // applying photobox on a `gallery` element which has lots of thumbnails links.
        // Passing options object as well:
        //-----------------------------------------------
       
});
