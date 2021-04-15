/*
 * Put all your regular jQuery in here.
*/
jQuery(document).ready(function($) {

  /*
   * Smooth Scrolling
  */
  $('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });  

  /*
   * Mobile Navigation
  */
  $('.menu-toggle').click(function(e) {
    e.preventDefault();
    
    $('.site-header').toggleClass('open')
    $('.site-header.reversed').toggleClass('reverse');
    $('.toggle-icon').toggleClass('open');
    $('.main-navigation').toggleClass('open');
    
  });

  /*
   * Home Page Slider
  */
  $('.service-sector').hover(function(e) {

    $('.service-sector-bgs').toggleClass('active');

  });

  $('.service-sectors-links .service-sector').hover(function(e) {

    var target = $(this).data('target');

    $(this).toggleClass('active');
    $('.service-sector-bgs').find(target).toggleClass('active');

  });

  $('#page .overlap').each(function() {
        var currentBlock = $(this);
        var padding = 60;

        var oldPrevPadding = parseInt( $(this).prev().css('padding-bottom').replace("px", "") );
        var prevPadding = oldPrevPadding + padding;

        $(this).prev().css('padding-bottom', prevPadding + 'px');
        $(this).css('margin-top', '-' + padding + 'px');
  });

  $(window).load(function() {

    if( $(window).width() > 720 ) { 
      $('h1:not(".masthead-title"), h2:not(".widowed"), h3:not(".widowed"), h4:not(".widowed"), h5:not(".widowed"), h6:not(".widowed"), p:not(".widowed")').widowFix();
    }

  });

  $(window).resize(function() {

    if( $(window).width() > 720 ) { 
      $('h1:not(".masthead-title"), h2:not(".widowed"), h3:not(".widowed"), h4:not(".widowed"), h5:not(".widowed"), h6:not(".widowed"), p:not(".widowed")').each(function() {

        $(this).html( $(this).html().replace(/&nbsp;/g, ' ') );
        $(this).widowFix();

      });
    }

  });

  $.fn.visible = function(partial) {
    
      var $t            = $(this),
          $w            = $(window),
          viewTop       = $w.scrollTop(),
          viewBottom    = viewTop + $w.height(),
          _top          = $t.offset().top,
          _bottom       = _top + $t.height(),
          compareTop    = partial === true ? _bottom : _top,
          compareBottom = partial === true ? _top : _bottom;
    
    return ((compareBottom <= viewBottom) && (compareTop >= viewTop));

  };
  
  var win = $(window);
  var allMods = $(".animate-in, .blocks-gallery-item, .animate-in-extended");
  /*
  win.on( 'scroll resize load', function(event) {
    
    allMods.each(function(i, el) {
        var el = $(el);
        if (el.visible(true)) {
          setTimeout(function() {

           el.addClass("animated-in"); 
          }, (i) * 50);
        } 
    });
      
  });
  */

  var controller = new ScrollMagic.Controller();
  var tween = TweenMax.staggerFromTo('.animation', 0.5,
      {
        scale: 1,
      },
      {
        backgroundColor: 'rgb(255, 39, 46)',
        scale: 5,
        rotation: 360
      },
      0.4
  );

  var revealElements = document.querySelectorAll(".animate-in, .blocks-gallery-item, .animate-in-extended");
    for (var i=0; i<revealElements.length; i++) { // create a scene for each element
      new ScrollMagic.Scene({
        triggerElement: revealElements[i], // y value not modified, so we can use element as trigger as well
        offset: 0,                        // start a little later
        triggerHook: 0.9,
        reverse: false,
      })
      .setClassToggle(revealElements[i], "animated-in") // add class toggle
      //.addIndicators({name: "animate-in " + (i+1) })
      .addTo(controller);
    }

  win.scroll(function(event) {

    var el = $('.animate-scroll-across img');
    var w = $(window);

    el.each(function() {

      if (el.visible(true) && w.width() > 1 && el.length ) {

        var scrollTop = w.scrollTop();
        var object = el.offset();
        var windowHt = w.height() - 64;
        var windowWt = w.width();
        var screenPos = ( object.top - scrollTop );
        var percent = Math.round( ( screenPos / windowHt ) * 100 );
        var newPos = Math.round( ( ( 7 / 3 ) * percent) - ( 70 ) );

        el.css({
          'transform': 'translateX( ' + newPos + '%)'
        });

        console.log('percent: ' + percent + '; newPos: ' + newPos);

      };

    });

  });

}); /* end of as page load scripts */
