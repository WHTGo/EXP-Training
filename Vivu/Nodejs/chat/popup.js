var appendthis =  ("<div class='modal-overlay js-modal-close'></div>");

function po(){
    $("body").append(appendthis);
    $(".modal-overlay").fadeTo(500, 0.7);
		$('#popup1').fadeIn($(this).data());
	};  
function po2(){
    $("body").append(appendthis);
    $(".modal-overlay").fadeTo(500, 0.7);
		$('#popup2').fadeIn($(this).data());
	};    
  
$(function(){

$(".js-modal-close, .modal-overlay").click(function() {
    $(".modal-box, .modal-overlay").fadeOut(500, function() {
        $(".modal-overlay").remove();
    });
 
});
 
$(window).resize(function() {
    $(".modal-box").css({
        top: ($(window).height() - $(".modal-box").outerHeight()) / 2,
        left: ($(window).width() - $(".modal-box").outerWidth()) / 2
    });
});
 
$(window).resize();
 
});