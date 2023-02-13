// JavaScript Document
/*
// "JK lightbox " by desizning - Version 1.0
// Copyright (c) 2008- 2016 http://www.desizning.com/
// This code cannot be redistributed without permission from desizning.com
// Developer: J karmakar
// Developer email: joy@desizning.com
// ***Last update: May 07, 2016***

 */
//

function lightbox(src){
	$('html').css('overflow','hidden');
 	var dWidth = $(document).width();
	var dHeight = $(document).height();
	var wHeight = $(window).height();
 	$('#lightbox').height(wHeight);
	
	var scrollTop = $(window).scrollTop();
	var lightbox_width = $("#lightbox").width();
	var centerPos= (dWidth - lightbox_width)/2;
	$("#lightbox").css('left', 0 );	
	$("#lightbox").css('top', scrollTop);
	$("#overlay").height(dHeight).css('opacity', .8);
 	//$(document).find("select:not('select.selectmenu')").hide();
	
 	 $('#lightbox iframe').attr({'src': src}).height(wHeight-60);
 	 $("#overlay").show();	
	 $("#lightbox").hide().show();	 
 }
  
function hideLightbox(){ 
	$('html').css('overflow','auto');
	$('#lightbox iframe').attr('src', "");
	$("#lightbox").hide();
	$("#overlay").hide();
	//$('select').not('.selectmenu').show();
	//$(document).find("select:not('select.selectmenu')").show();
}

$(document).ready(function() {
	//jQuery('<div id="overlay"></div><div id="lightbox"><div id="closeButton" class="tooltip" title="Close Window" ><span alt="Close">&nbsp;</span></div><iframe src="" frameborder="0" scrolling="yes"  marginheight="0" marginwidth="0" ></iframe></div>').appendTo('body'); 
	jQuery('<div id="lightbox"><div id="closeButton" class="tooltip" title="Close Window" ><span alt="Close">&nbsp;</span></div><iframe src="" frameborder="0" scrolling="yes"  marginheight="0" marginwidth="0" ></iframe></div>').appendTo('body'); 
	$("#overlay").hide();
	$("#lightbox").hide();	
	$("#lightbox, #lightbox #closeButton, #overlay").click(function(){
 		hideLightbox();
		});	
 	$(document).keyup(function(e) {
   		if (e.keyCode == 27) { hideLightbox(); } // Hide Lightbox on escape keypress
	});
	
	$(window).resize(function(){
		var wHeight = $(window).height();
		$('#lightbox').height(wHeight);
		$('#lightbox iframe').height(wHeight-60);
	});
	  
	$(document).on('click','.jk-lightbox', function(e){
		e.preventDefault();
	});
});