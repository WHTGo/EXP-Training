
$(document).ready(function(){
$(".zebra-style tr:odd").addClass("odd");



$(document).ready(function(){
	// G?n s? ki?n onclick v�o #viewbtn
	$('#re').click(function() {
	//	var strURL = $('#base_url').val();
		$.ajax({
			url: "check.php",
			type: 'POST',
			cache: false,
			data: {stt:view}
			success: function(string){
			
				/**
				 * Ki?u m?c �?nh tr? v? l� d?ng String, b?n d�ng h�m parseJSON �? ph�n t�ch d? li?u tr? v?
				 * c� 2 c�ch parse JSON l� : JSON.parse() v� $.parseJSON();
				 * 1. var getData = JSON.parse(string);
				 * 2. var getData = $.parseJSON(string);
				**/
				var getData = $.parseJSON(string);
				//input d? li?u l?y v? t? server v�o textbox
			//	$('#txt_username').val(getData.username);
			//	$('#txt_password').val(getData.password);
			//	$('#txt_email').val(getData.email);
				
				//Tr? loading v? tr?ng th�i ban �?u
			//	$('#loading').html(' ');
            var view="<div><tr><td>"getData.stt"</td><td >"getData.name"</td><td >"getData.msg"</td></tr></div>"
            
            
            },
			error: function (){
				alert('C� l?i x?y ra');
			}
		});
	});
});