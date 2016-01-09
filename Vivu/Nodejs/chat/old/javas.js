
$(document).ready(function(){
$(".zebra-style tr:odd").addClass("odd");



$(document).ready(function(){
	// G?n s? ki?n onclick vào #viewbtn
	$('#re').click(function() {
	//	var strURL = $('#base_url').val();
		$.ajax({
			url: "check.php",
			type: 'POST',
			cache: false,
			data: {stt:view}
			success: function(string){
			
				/**
				 * Ki?u m?c ð?nh tr? v? là d?ng String, b?n dùng hàm parseJSON ð? phân tích d? li?u tr? v?
				 * có 2 cách parse JSON là : JSON.parse() và $.parseJSON();
				 * 1. var getData = JSON.parse(string);
				 * 2. var getData = $.parseJSON(string);
				**/
				var getData = $.parseJSON(string);
				//input d? li?u l?y v? t? server vào textbox
			//	$('#txt_username').val(getData.username);
			//	$('#txt_password').val(getData.password);
			//	$('#txt_email').val(getData.email);
				
				//Tr? loading v? tr?ng thái ban ð?u
			//	$('#loading').html(' ');
            var view="<div><tr><td>"getData.stt"</td><td >"getData.name"</td><td >"getData.msg"</td></tr></div>"
            
            
            },
			error: function (){
				alert('Có l?i x?y ra');
			}
		});
	});
});