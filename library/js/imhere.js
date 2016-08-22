/*
This file contain any js scripts I wanted to add to the site.
Instead of calling it in the header or throwing it inside wp-head()
this file will be called automatically in the footer so as not to
slow the page load.
*/

// Modernizr.load loading the right scripts only if you need them
Modernizr.load([
	{
    // // Let's see if we need to load selectivizr
    // test : Modernizr.borderradius,
    // // Modernizr.load loads selectivizr for IE6-8
    // nope : ['selectivizr-min.js']
	}
]);

// as the page loads, cal these scripts
(function($){
  $(function(){

// add all your scripts here

// TICKER
       $("#ticker").eventTicker({
            effect      :"slide-v",
            autoplay    :true,
            timer       :3000,
            color       :"blue",
            border      :true
        });

// Plugin initialization
    $('.modal-predsednictvo').leanModal();
    $('.materialboxed').materialbox();
    $('.button-collapse').sideNav({
      menuWidth: 350, // Default is 240
      edge: 'left', // Choose the horizontal origin
      closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
     }
    );

//Ripple effect for elements
// $('a.ubermenu-target').addClass('waves-effect waves-light');


// Detect touch screen and enable scrollbar if necessary
    function is_touch_device() {
      try {
        document.createEvent("TouchEvent");
        return true;
      } catch (e) {
        return false;
      }
    }
    if (is_touch_device()) {
      $('#nav-mobile').css({ overflow: 'auto'});
    }


//RESIZE TEXT
    var toggleFlowTextButton = $('#lang-normal');
    toggleFlowTextButton.click( function(){
      $('.section, .topheader, ul').children('p, a, li').each(function(){
           // $(this).toggleClass('flow-text');
           $('p, a, li').removeClass('flow-text');
          // // $('p, a, li').removeClass('flow-text');

        });
    });
    var toggleFlowTextButton = $('#lang-big');
    toggleFlowTextButton.click( function(){
      $('.section, .hentry, ul').children('p, a, li').each(function(){
           // $(this).toggleClass('flow-text');
           $(this).addClass('flow-text');

        });
    });

// TOAST
$('#gacr').click(function(){
    Materialize.toast('I am a toast!', 3000, 'blue')
});



  /* Toggle grid button
     ==========================================================================
    dont forget to add to button href="javascript:void(0)"
     */

  /*
  // 1. THE JQUERY WAY
  var flip = 0;
  $('#btnToggleGrid').on('click', function(){
    // Get line-height
    var vcLineHeight = parseInt($('p').css('line-height'));
    console.log(vcLineHeight);
    if(flip == 0){
      $('body').addClass('grid');
      // $('.verticalGrid').css('background', vcImg);
      flip = 1;
    } else if (flip == 1) {
      $('body').addClass('grid-double');
      flip = 2;
    } else if (flip == 2) {
      $('body').removeClass('grid-double');
      $('body').removeClass('grid');
      // $('.verticalGrid').css('background', 'none');
      flip = 0;
    };
  });

  ----
  */

console.log('GACR');


// add class



  }); // end of document ready
})(jQuery); // end of jQuery name space