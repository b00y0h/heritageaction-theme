;(function ($, window, undefined) {
  'use strict';

  var Page  = (function() {

      var $container      = $( '#hs-container' ),
      // the scroll container that wraps the articles
      $scroller     = $container.find( 'div.hs-content-scroller' ),
      $menu       = $container.find( 'aside' ),
      // menu links
      $links        = $menu.find( 'nav > a' ),
      $articles     = $container.find( 'div.hs-content-wrapper > .widgets' ),
      // button to scroll to the top of the page
      // only shown when screen size < 715
      $toTop        = $container.find( 'a.hs-totop-link' ),
      // the browser nhistory object
      History       = window.History,
      // animation options
      animation     = { speed : 800, easing : 'easeInOutExpo' },
      // jScrollPane options
      scrollOptions   = { verticalGutter : 0, hideFocus : true },
      // init function
      init        = function() {

        // initialize some events
        _initEvents();
        // jumps to the respective panel
        // according to the url
        _goto();

      },
      _goto       = function( panel ) {

          // get the url from history state (e.g. panel=3) and extract the panel number
        var panel   = panel || History.getState().url.queryStringToJSON().panel,
          isHome    = ( panel === undefined ),
          // we will jump to the introduction panel if theres no panel
          $article  = $( panel ? '#' + 'panel' + panel : '#' + 'introduction' );

        if( $article.length ) {

            // left / top of the element
          var left    = $article.position().left,
            top     = $article.position().top - 70,
            // check if we are scrolling down or left
            // is_v will be true when the screen size < 715
            is_v    = ( $(document).height() - $(window).height() > 0 ),
            // animation parameters:
            // if vertically scrolling then the body will animate the scrollTop,
            // otherwise the scroller (div.hs-content-scroller) will animate the scrollLeft
            param   = ( is_v ) ? { scrollTop : (isHome) ? top : top + $menu.outerHeight( true ) } : { scrollLeft : left },
            $elScroller = ( is_v ) ? $( 'html, body' ) : $scroller;

          $elScroller.stop().animate( param, animation.speed, animation.easing, function() {

            // active class for selected panel
            $articles.removeClass( 'hs-content-active' );
            $article.addClass( 'hs-content-active' );

          } );

        }

      },
      _saveState      = function( panel ) {

        // adds a new state to the history object
        // this will trigger the statechange on the window
        if( History.getState().url.queryStringToJSON().panel !== panel ) {

          History.pushState( null, null, '?panel=' + panel );

        }

      },
      _initEvents     = function() {

        _initWindowEvents();
        _initMenuEvents();
        _initArticleEvents();

      },
      _initWindowEvents = function() {

        $(window).on({
          // triggered when the history state changes - jumps to the respective panel
          'statechange' : function( event ) {

            _goto();

          }
        });

      },
      _initMenuEvents   = function() {

        // when we click a menu link we check which panel the link refers to,
        // and we save the state on the history obj.
        // the statechange of the window is then triggered and the page/scroller scrolls to the
        // respective panel's position
        $links.on( 'click', function( event ) {

          var href    = $(this).attr('href'),
            panel   = ( href.search(/panel/) !== -1 ) ? href.substring(6) : 0;

          _saveState( panel );

          return false;

        });

      },
      _initArticleEvents  = function() {

        // when we click on an article we check which panel the article refers to,
        // and we save the state on the history obj.
        // the statechange of the window is then triggered and the page/scroller scrolls to the
        // respective panel's position
        $container.on( 'click', 'article.hs-content', function( event ) {

          var id      = $(this).attr('id'),
            panel   = ( id.search(/panel/) !== -1 ) ? id.substring(5) : 0;

          _saveState( panel );

          return false;

        });

      };

    return { init : init };

  })();

  new Page.init();

}(jQuery, window));