//responsive navigation menu 

// wait until document loads and then call menus and toggleSelect
$(document).ready(function() {
	configureMenus();
	toggleSelect();
});

//function to control menu behavior based on screen size
function configureMenus() {
			 var windowState = 'large';
			  
			 var sw = document.body.clientWidth;
			 if (sw < 481) {
				 smMenu();
			 } else if (sw >= 481 && sw <= 768) {
					 medMenu();
			 } else {
					 lgMenu();
				  };
			  
			  $(window).resize(function() {
				  var sw = document.body.clientWidth;
				  if (sw < 481 && windowState != 'small') {
					 smMenu();
				  }
				  if (sw > 480 && sw < 769 && windowState != 'medium') {
					 medMenu();
				  }  
				  if (sw > 768 && windowState != 'large') {
					 lgMenu();
				  } 
			  });

			function smMenu() {
			$('.menuToggle a').off('click');
			$('.topMenu h3').off('click touchstart');
			$('html').off('touchstart');
			$('#mainNav').off('touchstart');

			$('.expand').removeClass('expand');
			$('.menuToggle').remove();
			
			 $('.topMenu').before('<div class="menuToggle"><a href="#">menu<span class="indicator">+</span></a></div>');
			
			 $('.topMenu h3').append('<span class="indicator">+</span>');
		
		
			$('.menuToggle a').click(function() {
				
				$('.topMenu').toggleClass('expand');
				
				var newValue = $(this).find('span.indicator').text() == '+' ? '-' : '+';
				
				$(this).find('span.indicator').text(newValue);
			});
			
		
			$(".topMenu h3").click(function() {
				
				var currentItem = $(this).siblings('.submenu');
			
				$('ul.submenu').not(currentItem).removeClass('expand');
				
				$('.topMenu h3').not(this).find('span.indicator:contains("-")').text('+');
				
				$(this).siblings('.submenu').toggleClass('expand');
				
				var newValue = $(this).find('span.indicator').text() == '+' ? '-' : '+';
				$(this).find('span.indicator').text(newValue);
			});
			
			windowState = 'small';
		}
		
		function medMenu() {
			//reset the menu in case it's being resized from a small screen
			   
			$('.menuToggle a').off('click');
			$('.topMenu h3').off('click');
		
			$('.expand').removeClass('expand');
		
			$('.topMenu h3').find('span.indicator').remove();
	
			$('.menuToggle').remove();
			
			//check to see if the device supports touch
			if ('ontouchstart' in document.documentElement)
			{
				 $('.topMenu').find('li.hover').removeClass('hover');
				 $(".topMenu h3").bind('touchstart', function(e){
					var currentItem = $(this).siblings('.submenu');
					$('ul.submenu').not(currentItem).removeClass('expand');
					$(this).siblings('.submenu').toggleClass('expand');
				});
				$('html').bind('touchstart', function(e) {
					$('.topMenu').find('ul.submenu').removeClass('expand');
				});
				$('#mainNav').bind('touchstart', function(e){
					e.stopPropagation();
			   });
			}
			windowState = 'medium';
		}
		
		function lgMenu() {
			   
			$('.menuToggle a').off('click');
			$('.topMenu h3').off('click touchstart');
			$('html').off('touchstart');
			$('#mainNav').off('touchstart');
			
			
			$('.topMenu').find('ul.submenu').removeClass('expand');
			
		
			$('.topMenu h3').find('span.indicator').remove();
			
			$('.menuToggle').remove();
			
			windowState = 'large';
		}
}


//function to swap ul menus for select elements at smaller screen sizes
function toggleSelect() {
	var windowState = 'large';
	
	$(document).ready(function() {
		var sw = document.body.clientWidth;
		if (sw < 769) {
		   smScreen();
		}
	})
	$(window).resize(function() {
		var sw = document.body.clientWidth;
		if (sw < 769 && windowState == 'large') {
		   smScreen();
		} 
		if (sw > 768 && windowState == 'small') {
			lgScreen();
		}
	});
	//convert list menus to select elements
	function smScreen() {
		$('nav.archives ul').each(function() {
			var $select = $('<select />');
			var $initial = $('<option>Choose a gallery</option>');
			$initial.attr({
				value: '#',
				selected: 'selected'
			});
			$select.append($initial);
			$(this).find('a').each(function() {
				var $option = $('<option />');
				$option.attr('value', $(this).attr('href')).html($(this).html());
				$option.attr('title', $(this).attr('title'));
				$select.append($option);
			});
			$select.change(function() {
	  window.location = $(this).find("option:selected").val();
	});

			$(this).replaceWith($select);
		});
		 
		  windowState = 'small';
	  };
	
	function lgScreen() {
		//target the select menu
	   $('nav.archives select').each(function() {
				$(this).find(':first-child').remove();
			   var $ul = $('<ul />');
			   $(this).find('option').each(function() {
				   var $li = $('<li />');
				   var $a = $('<a />');
				   $a.attr('href', $(this).attr('value')).html($(this).html());
				   $a.attr('title', $(this).attr('title'));
				   $ul.append($li);
				   $li.append($a);
			   });
			 
			   $(this).replaceWith($ul);
		   });
		
		   windowState = 'large';
	  };
}