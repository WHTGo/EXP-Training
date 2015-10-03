var appendthis =  ("<div class='modal-overlay js-modal-close'></div>");

function setup(){
    $("body").append(appendthis);
    $(".modal-overlay").fadeTo(300, 0.7);
		$('#setup').fadeIn($(this).data());
	};  
function inforanger(){
    $("body").append(appendthis);
    $(".modal-overlay").fadeTo(300, 0.7);
		$('#inforanger').fadeIn($(this).data());
	};  


$(function(){

$(".js-modal-close, .modal-overlay").click(function() {
    $(".modal-box, .modal-overlay").fadeOut(300, function() {
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