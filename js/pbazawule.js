
jQuery(document).ready(function($) {
	// random background
	var colors = ["#EBF2FF", "#D5D8EB", "#D0E0EE", "#DBE5FF", "#C8E8FF", "#E4F3FF", "#ACD1E5", "#E4F2FD", "#ACD1E5", "#B1D6F0"];
	$(".home .entry-content .post").each(function() {
		$( this ).css("background" , colors[Math.floor(Math.random() * colors.length)]);
	});

	// sticky menu
	$(function () {
	    var sidebar = $('.header-content');
	    var content = $('.hentry');
	    var top = sidebar.offset().top + 1;
	    // $(window).resize(function() {
	    $(window).scroll(function (event) {
	    	var y = $(this).scrollTop();
	    	var width = $(window).width();
	    	if ( width < 1440) {
		    	if (y >= top) {
		    		sidebar.addClass('fixed');
		    		content.removeClass('scroll-content').addClass('fixed-content');
		    	} else { 
		    		sidebar.removeClass('fixed');
		    		content.removeClass('fixed-content').addClass('scroll-content');
		    	}
		    } else {
		    	sidebar.removeClass('fixed');
		    }
	    }); 
	});

	// add 'show all' to list + conditional
	// if ( window.location.pathname == '/' ) {
	if ( $( ".home" ).length > 0 ) {
    	$("#category-menu li:first-child").before("<li id='cat-all'><a href='#' data-filter='*'>all</a></li>");
	}

	// toggle button text - on mobile view
	$(".menu-toggle").toggle(
		function() { $(this).text("hide").append("<div class='spinner'><div class='spinner__item1'></div><div class='spinner__item2'></div><div class='spinner__item3'></div></div>"); },
		function() { $(this).text("filters").append("<div class='spinner'><div class='spinner__item1'></div><div class='spinner__item2'></div><div class='spinner__item3'></div></div>"); }
    );

    // toggle intro bio
    $('input.read-more-state').click(function() {
    	$('.description-p').slideToggle();
    });

	// post (isotope ) 'category' filter
		// cache container
		var $container = $('.home .entry-content');

		// initialize isotope
		$container.isotope({
		  itemSelector : '.post',
		  layoutMode : 'fitRows'
		});

		// filter items when filter link is clicked
		$('.home #category-menu a').click(function(){
		  var selector = $(this).attr('data-filter');
		  $container.isotope({ filter: selector });
		  return false;
		});

		// debugging...
		// $('.entry-content').isotope({ filter: '.post' }, function( $items ) {
		//   var id = this.attr('id'),
		//       len = $items.length;
	    //   console.log( 'Isotope has filtered for ' + len + ' items in #' + id );
		// });
	      
	 	var $optionSets = $('.home #category-menu'),
	 		$optionLinks = $optionSets.find('a');

		  	$optionLinks.click(function(){
			    var $this = $(this);
			    // don't proceed if already selected
			    if ( $this.hasClass('selected') ) {
			      return false;
			    }

			    var $optionSet = $this.parents('.home #category-menu');
			    	$optionSet.find('.selected').removeClass('selected');
			    	$this.addClass('selected');
			    
			    return false;
			});

});