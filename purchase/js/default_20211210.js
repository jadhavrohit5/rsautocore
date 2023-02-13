// JavaScript Document
//Smoothly return anywhere in a page
function smoothScroll(obj, speed, adj_height) {
   var y = $(obj).offset().top;
   $('html, body').delay(20).animate({
      scrollTop: y - adj_height
   }, speed);
}
//=======================================================================
//Push check box value in array in a input box
function checkboxVals(checkbox, id) {
   var allVals = [];
   $(checkbox + ' :checked').each(function () {
      if ($(this).val() != '') {
         allVals.push($(this).val());
      }
   });
   $(id).val(allVals)
}
function redirect(url){
	window.location.href = url;
}
//Protect right click====================================================
function contextmenu(obj) {
   $(document).on("contextmenu", obj, function (e) {
      e.preventDefault()
   });
}
//Display ajax content===================================================
function ajaxGet(url, obj) {
 	$(obj).html('<span class="loader">&nbsp;</span>');
	$.get(url, function(data){ $(obj).html(data);});
}
//=======================================================================
//Ajax post form
function postForm(obj,url){
 	var postData = obj.serializeArray();
	obj.css({position: 'relative'});
 	obj.find('.response').remove();
  	$.ajax({
			url: url,
			type: "POST",
			data: postData, 	
 			cache: false,
			dataType: "json",
			beforeSend: function() {
				var fWidth = obj.width();
				var fHeight = obj.height();
				var fStyle = 'width:' + fWidth + 'px; height: ' + fHeight + 'px;';
				obj.append('<div class="response"><span class="ajax_submitter" style="' + fStyle + '">&nbsp;</span></div>');
 			}
		})
		.done(function(data) {
			if(data.success){
				obj.html(data.successMsg);
			} 
  			if(data.error){ 
  				obj.find('.response').html('<span class="redMsg"><span>'+data.errorMsg+'</span></span>');
			}
		})
		.fail(function(xhr, textStatus, error) {
 			 alert("Error occured. please try again");
			 obj.find('.response').remove();
 		}) 
		
   	return false;
}
//=======================================================================
 

 jQuery(document).ready(function ($) { 	
	$(document).on('click','.errorMsg span.c, .msg span.c',function(){$(this).parent().slideUp()});
	$( window ).scroll(function() { var y = $(this).scrollTop(); if(y>72) $("#back-top").fadeIn(); else  $("#back-top").fadeOut(); });
 	$("#back-top a").on('click', function () { smoothScroll('body', 300, 10); return false;});
	$("a.jump_link").on('click', function () { var obj= $(this).attr('href'); smoothScroll(obj, 300, 0); return false;});

	//------------------------------------------------------------------

	$('.toggleBlock h3').on('click', function() {
		$(this).next('.toggleBox').toggle();
		$(this).toggleClass('down');
	});
	
	$('a.sidebar-toggle, .parts_menu .close-nav').on('click', function() {
		$('.parts_menu').toggleClass('active');
		return false;
	});

	//------------------------------------------------------------------
	//Confirm link
      $('.cnf').on('click', function () {
         var msg = $(this).data('cnf');
         var agree = confirm(msg);
         if (agree) return true;
         else return false;
      });
});
 





