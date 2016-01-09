//var vitri;
var start=0;
var userid=0;
var add=1;
function xem(){
             $('a.delete_single').click(function() {
                    var $this = $(this);
                    var c = $this.text();
                    var b=c.substring(3);
                    userid =  parseInt(b);
                    //alert(userid);
                    $.ajax({
                    			url: "aws_ad.php",
                    			type: 'POST',
                                data: "stt="+userid,
                    			success: function(view){
                    			 $('#print').html(view)
                                 }
                        });
                    po2();
                    });
             $('a.aws').click(function() {
                    var $this = $(this);
                    var c = $this.text();
                    var b=c.substring(7);
                    userid =  parseInt(b);
                    //alert(userid);
                      po();
              		
                                        
                    });
              $('a.an').click(function() {
                    var $this = $(this);
                    var c = $this.text();
                    var b=c.substring(2);
                    var u =  parseInt(b);
                    
                    $.ajax({
                    			url: "delete_view.php",
                    			type: 'POST',
                                data: "stt="+u,
                    			success: function(view){
                    			 if(view=='o'){
                    			     
                                     var stt4="#idv"+u;
                                    $(stt4).css("background","rgb(218, 111, 75)");
                                    var stt5="#id"+u;
                                    $(stt5).css("background","rgb(218, 111, 75)");
                                    }else{
                                        alert(view);
                                    }
                                     }
                            });
                    });      
              $('a.view').click(function() {
                    var $this = $(this);
                    var c = $this.text();
                    var b=c.substring(4);
                    var d = parseInt(b);
                      $.ajax({
                    			url: "view.php",
                    			type: 'POST',
                                data: "stt="+d,
                    			success: function(view){
                    			 if(view=='o'){
                    			     var stt3="#idv"+d;
                                    $(stt3).css("background","rgb(190, 190, 200)");
                    			 }else{ alert(view);}
                    			     
                                     }
                            });
                    });
               $('a.xoa').click(function() {
                    var $this = $(this);
                    var c = $this.text();
                    var b=c.substring(3);
                    var e =  parseInt(b);
                     $.ajax({
                    			url: "xoa.php",
                    			type: 'POST',
                                data: "stt="+e,
                    			success: function(view){
                    			 if(view=='o'){
                    			     
                                     var stt2="#id"+e;
                                    $(stt2).css("background","rgb(218, 111, 75)");
                                    }else{ alert(view);
                                            exit();
                                        
                                        }
                                     }
                            });
                    });
 };

$(document).ready(function(){
          
            //setTimeout(xem, 1000); 
            $(".zebra-style tr:odd").addClass("odd");
            check_q();
            check_a();
            check_v();
           
            });
    //$(function(){$("#back").click(function() {$("#cuboid section").removeClass("read").addClass("view");});});  
 
 
    
    
    
    function check_q(){
   $.ajax({
			url: "question_a.php",
			type: 'POST',

            data: "id="+start,
			success: function(string){
			 if (string!="n"){
				    var data = $.parseJSON(string);
                    for( var i in data){
                        var row=data[i];
                        var vi="<tr><td style='text-align: center;'>"+add+"</td><td>"+row[1]+"</td><td>"+row[2]+"</td><td id='id"+row[0]+"' style='background: rgb(218, 111, 75); text-align: center;'><a href='javascript:;' class='delete_single' >xem<p style='display:none'>"+row[0]+"</p></a></td><td style='text-align: center;'><a href='javascript:;' class='aws'>Trả lời<p style='display:none'>"+row[0]+"</p></a></td><td  id='idv"+row[0]+"'style='background: rgb(218, 111, 75); text-align: center;'><a href='javascript:;' class='view'>view<p class='aws' style='display:none'>"+row[0]+"</p></a></td><td style='text-align: center;'><a href='javascript:;' class='xoa'>xóa<p style='display:none '>"+row[0]+"</p></a></td><td style='text-align: center;'><a href='javascript:;' class='an'>ẩn<p style='display:none'>"+row[0]+"</p></a></td></tr>";
                        var a=$("#viewdata").html();
                        $("#viewdata").html(a+vi);                  
                        start++;
                        add++;
                        }
                        if(data){
                            check_v();
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
			url: "check_ad.php",
			type: 'POST',
			cache: false,
			success: function(string){
			 if (string!="n"){
				var data = $.parseJSON(string);
                for( var i in data){
                    var row=data[i];
                    var stt1="#id"+row[0];
                    $(stt1).css("background","rgb(190, 190, 200)")
                }
                }
			},
			error: function (){
				alert('Có lỗi xảy ra');
			}
		});
  setTimeout(check_a, 3000); 
};
function check_v(){
   $.ajax({
			url: "view_view.php",
			type: 'POST',
			cache: false,
			success: function(string){
			 if (string!="n"){
				var data = $.parseJSON(string);
                for( var i in data){
                    var row=data[i];
                    var stt6="#idv"+row[0];
                    $(stt6).css("background","rgb(190, 190, 200)");
                    
                }
                }
			},
			error: function (){
				alert('Có lỗi xảy ra');
			}
		});
};

$(function(){$("#send_a").click(function() {
        var msg =  $.trim($("#msg_aws").val());
        if(msg == "") {alert("Bạn chưa nhập câu hỏi!");return false;}
        $.ajax({
            url : "admin_aws.php",
            type : "POST",
            data : "stt="+userid+"&msg="+msg,
            success : function (result){
                if(result=='o'){
                    $("#msg_aws").val("");
                    //alert('ok');
                    var stt9="#id"+userid;
                    $(stt9).css("background","rgb(190, 190, 200)");
                }else{
                      alert(result);
                }     
            },
			error: function (){
				alert('Có lỗi xảy ra');
			}
            });
             $(".modal-box, .modal-overlay").fadeOut(500, function() {
                $(".modal-overlay").remove();
            });
        });
    });
   

