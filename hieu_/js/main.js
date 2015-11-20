jQuery(document).ready(function(){
	alert('call');
	function datawidth(){
        var InitStr = screen.width;
        jQuery('body').attr('data-width',InitStr);
    }
    datawidth();
    jQuery(window).resize(function(){
        datawidth();
    });
})