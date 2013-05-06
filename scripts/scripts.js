/* 
* Skeleton V1.0.3
* Copyright 2011, Dave Gamache
* www.getskeleton.com
* Free to use under the MIT license.
* http://www.opensource.org/licenses/mit-license.php
* 7/17/2011
*/	
	

$(document).ready(function() {
  
  /* Scrolling nav stuff
	================================================== */
	$('#mast a, #hero a, #steps a, #details a').smoothScroll({
	  easing: 'swing',
	  speed: 2000,
	  exclude: ['.about a']
	});
	
	var a = $('#back-to-top');
	$(a).hide().removeAttr("href");
	// $(window).scrollTop() > 400 && $(a).fadeIn("slow");
	
	$(window).scroll(function() {
	  $(this).scrollTop() >= 400 ? $(a).fadeIn("slow") : $(a).fadeOut("slow");
	});
	
	$(a).click(function(){
	  $('html, body').animate({ scrollTop: "0px"}, 1200);
	});

  
  /* Designs slideshow
	================================================== */
  $('#slideshow').cycle({
    // fx: 'scrollVert',
    timeout: 0,
    pager:  '#slideshow-nav', 
    pagerAnchorBuilder: function(idx, slide) { 
        // return selector string for existing anchor 
        return '#slideshow-nav li:eq(' + idx + ') a'; 
    }
  });
  
  $("a[rel*=leanModal]").leanModal({ top : 200, overlay : 0.8 });
  
  /* Contact form
	================================================== */
	$('#ajax-form').isHappy({
    fields: {
      '#name': {
        //required: true,
        message: 'I need to know your name!'
      },
      '#email': {
        //required: true,
        message: "I need a real address please :D",
        test: happy.email
      },
      '#message': {
        //required: true,
        message: 'Please let me know something.'
      }
    },
    submitButton: '#send'
  });
	
	$('#ajax-form').ajaxForm({
	  // target identifies the element(s) to update with the server response 
    target: '#contact-success',
    
    // clear the form if successful
    resetForm: true,

    // success identifies the function to invoke when the server response 
    // has been received; here we apply a fade-in effect to the new content 
    success: function() { 
      $('#ajax-form').fadeOut('slow');
      $('#contact-success').fadeIn('slow');
    }
	});
	
	// Open all external links in a new window
  $('a[rel="external"]').click( function() {
     window.open( $(this).attr('href') );
     return false;
  });
  
});
