/**
 * jQuery sidebar menu 
 * 
 * Built on top of the jQuery library
 * http://jquery.com
 * 
 *  Created by Joy karmakar
 * 	http://www.desizning.com
 */
jQuery(document).ready(function ($) {
 	var dHeight = $(document).height();
	//alert(dHeight);
 	//$("#sidebar-left").css('min-height', dHeight+50); 
		
	//Multilevel sidebar menu
	$(".sidebar-menu ul.menu li").each(function(index, element) {
		var $target = $(this);
 		if ($target.find("ul").length > 0) {
 			$target.prepend('<span class="submenu_btn">+</span>');
		}
    });
	
	$(".sidebar-menu ul.menu li .submenu_btn").click(function(){
		var $submenu_btn = $(this)
		$submenu_btn.text($submenu_btn.text() == "-" ? "+": "-");
 		$submenu_btn.parent('li').addClass('active');
		$submenu_btn.parent('li').find('ul').first().slideToggle( "slow", function() {
			if ($submenu_btn.text() == "+") {
   			 	$submenu_btn.parent('li').removeClass('active');
			}
		});
  		$submenu_btn.next().addClass('current');
	});
 	$(".sidebar-menu ul.menu li.active").each(function(index, element) {
        //Show active submenu items. 
		$(this).find('span.submenu_btn').next().addClass('current');
		$(this).find("ul").first().show();
		$(this).find(".submenu_btn").first().text("-");
    });
 
	
	$(".sidebar-menu ul.menu > li").hover(function(e) {
 	   $(this).addClass('select')
    }).mouseleave(function(){
		$(this).removeClass('select');
	});
	
	
	$("a.sidebar-toggle").click(function(){
 		if($(this).hasClass('close')){
				$("#sidebar-left").width(230);
				$("#main-wrapper").css('margin-left', 230);
			}else{
				$("#sidebar-left").width(0);
    			$("#main-wrapper").css('margin-left', 0);
		}
		$(this).toggleClass('close open');
		return false;
	});
	
	//Hide sidebar outside click
	$(document).on('click touchend', function (e) {
		var container = $("#sidebar-left");
		if (!container.is(e.target) && container.has(e.target).length === 0 && container.width() > 0) {
			$("#sidebar-left").width(0);
			$("a.sidebar-toggle").removeClass('open').addClass('close');
		}
		 
	});

	//Multilevel sidebar menu end
	 
});
 