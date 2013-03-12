/* Foundation v2.2 http://foundation.zurb.com */
jQuery(document).ready(function ($) {

	/* Use this js doc for all application specific JS */

	/* TABS --------------------------------- */
	/* Remove if you don't need :) */

	function activateTab($tab) {
		var $activeTab = $tab.closest('dl').find('a.active'),
				contentLocation = $tab.attr("href") + 'Tab';

		//Make Tab Active
		$activeTab.removeClass('active');
		$tab.addClass('active');

    	//Show Tab Content
		$(contentLocation).closest('.tabs-content').children('li').hide();
		$(contentLocation).css('display', 'block');
	}

	$('dl.tabs').each(function () {
		//Get all tabs
		var tabs = $(this).children('dd').children('a');
		tabs.click(function (e) {
			activateTab($(this));
		});
	});

	if (window.location.hash) {
		activateTab($('a[href="' + window.location.hash + '"]'));
	}

	/* ALERT BOXES ------------ */
	$(document).delegate("a.close", "click", function(event) {
    event.preventDefault();
	  $(".alert-box").fadeOut(function(event){
	    $(this).remove();
	  });
	});
	
	function escape_Input(){
		if($('.nulled').is('*')){
			console.log($('.nulled').parent().find('input.input-text'));
			$('.standname-data').each(function (index) {
				$(this).find('input').hide();
			});
			$('.nulled').parent().find('input.input-text').show();
		}
	}
	
	escape_Input();
	
	$('.stand-items li a.button').live('click', function(e) {
		var stand = $(this).data('stand');
		document.getElementById('selectedStand').value=stand;
		removeAll();
		$(this).addClass('nulled');
		$(this).parent().find('input.expand').show();
		$(this).parent().find('img').addClass('selected');
	});

	function removeAll()
	{
		$('.button').each(function (index) {
			$(this).removeClass('nulled');
			$(this).parent().find('input.expand').hide();
			$(this).parent().find('img').removeClass('selected');						
		});
	}
	
	/* PLACEHOLDER FOR FORMS ------------- */
	/* Remove this and jquery.placeholder.min.js if you don't need :) */

	$('input, textarea').placeholder();

	/* TOOLTIPS ------------ */
	$(this).tooltips();



	/* UNCOMMENT THE LINE YOU WANT BELOW IF YOU WANT IE6/7/8 SUPPORT AND ARE USING .block-grids */
//	$('.block-grid.two-up>li:nth-child(2n+1)').css({clear: 'left'});
//	$('.block-grid.three-up>li:nth-child(3n+1)').css({clear: 'left'});
//	$('.block-grid.four-up>li:nth-child(4n+1)').css({clear: 'left'});
//	$('.block-grid.five-up>li:nth-child(5n+1)').css({clear: 'left'});



	/* DROPDOWN NAV ------------- */

	var lockNavBar = false;
	$('.nav-bar a.flyout-toggle').live('click', function(e) {
		e.preventDefault();
		var flyout = $(this).siblings('.flyout');
		if (lockNavBar === false) {
			$('.nav-bar .flyout').not(flyout).slideUp(500);
			flyout.slideToggle(500, function(){
				lockNavBar = false;
			});
		}
		lockNavBar = true;
	});
  if (Modernizr.touch) {
    $('.nav-bar>li.has-flyout>a.main').css({
      'padding-right' : '75px'
    });
    $('.nav-bar>li.has-flyout>a.flyout-toggle').css({
      'border-left' : '1px dashed #eee'
    });
  } else {
    $('.nav-bar>li.has-flyout').hover(function() {
      $(this).children('.flyout').show();
    }, function() {
      $(this).children('.flyout').hide();
    })
  }


	/* DISABLED BUTTONS ------------- */
	/* Gives elements with a class of 'disabled' a return: false; */
  
  
  // $(".alert-box").on("click", "a.close", function() {
		// console.log($(this));
		  // event.preventDefault();
		  // $(".alert-box").fadeOut(function(event){
		    // $(this).remove();
		  // });
	// });

});


// $(".alert-box").on("click", "a.close", function() {
		// console.log($(this));
		  // event.preventDefault();
		  // $(".alert-box").fadeOut(function(event){
		    // $(this).remove();
		  // });
	// });