var vitri;
var start=0;
var add=1;
var usingid=$.cookie('id');
//alert(usingid);
function xem(){
             $('a.delete_single').click(function() {
                    var $this = $(this);
                    var c = $this.text();
                    var b=c.substring(3);
                    //alert(b);
                    $.ajax({
                    			url: "aws.php",
                    			type: 'POST',
                                data: "stt="+b,
                    			success: function(view){
                    			 $('#print').html(view);
                                 }
                        });
                    po2();
                    });
 };

$(document).ready(function(){
          
            //setTimeout(xem, 1000); 
            $(".zebra-style tr:odd").addClass("odd");
            check_q();
            check_a();
            $("#menu").hover(
    			function(){ 
    			 	$(this).stop(true,false).animate({left: 0}, 500); },
    			function(){
    			 	$(this).stop(true,false).animate({left: -285}, 500); 
    		});
    		$("#menu1").hover(
    			function(){ 
    			 	$(this).stop(true,false).animate({left: 0}, 500); },
    			function(){
    			 	$(this).stop(true,false).animate({left: -585}, 500); 
    		});
    
           
            });
    //$(function(){$("#back").click(function() {$("#cuboid section").removeClass("read").addClass("view");});});  
    $(function(){$("#send").click(function() {
        var name=  $.trim($("#name").val());
        var msg=  $.trim($("#msg").val());
        if(name == "") {alert("Bạn chưa nhập tên!");return false;}
        if(msg == "") {alert("Bạn chưa nhập câu hỏi!");return false;}
        $.ajax({
            url : "gui.php",
            type : "POST",
            data : "name="+name+"&msg="+msg+"&id="+usingid,
            success : function (result){
                    $('#infos').html(result);;
                    $("#name").val("");
                    $("#msg").val("");
                    po();
                },
			error: function (){
				alert('Có lỗi xảy ra');
			}
            });
        });
    });
    
 
 
    
    
    
    function check_q(){
   $.ajax({
			url: "question.php",
			type: 'POST',

            data: "id="+start,
			success: function(string){
			 if (string!="n"){
				    var data = $.parseJSON(string);
                    for( var i in data){
                        var row=data[i];
                        var vi="<tr><td style='text-align: center;'>"+add+"</td><td>"+row[1]+"</td><td>"+row[2]+"</td><td id=id"+row[0]+" style='background: rgb(218, 111, 75); text-align: center;'><a href='javascript:;' class='delete_single'>xem<p class='aws' style='display:none'>"+row[0]+"</p></a></td></tr>";
                        var a=$("#viewdata").html();
                        $("#viewdata").html(a+vi);                  
                        start++;
                        add++;
                        }
                   if(data){
                           xem(); 
                        }
                    $(".zebra-style tr:odd").addClass("odd");
               } },
			error: function (){
				alert('Có lỗi xảy ra');
			}
		});
    setTimeout(check_q, 3000);    
};

function check_a(){
   $.ajax({
			url: "check.php",
			type: 'POST',
			cache: false,
			success: function(string){
			 if (string!="n"){
				var data = $.parseJSON(string);
                for( var i in data){
                    var row=data[i];
                    var stt="#id"+row[0];
                    $(stt).css("background","rgb(190, 190, 200)")
                }
                }
			},
			error: function (){
				alert('Có lỗi xảy ra');
			}
		});
  setTimeout(check_a, 10000); 
};


