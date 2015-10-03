$(function(){$("#hoi").click(function(){$("#cuboid section").removeClass("view").addClass("read");});});
$(function(){$("#back").click(function() {$("#cuboid section").removeClass("read").addClass("view");});});  
$(function(){$("#send").click(function() {var name=  $.trim($("#name").val());var msg=  $.trim($("#msg").val());if(name == "") {alert("Bạn chưa nhập tên!");return false;}if(msg == "") {alert("Bạn chưa nhập câu hỏi!");return false;}$("#cuboid section").removeClass("read").addClass("complete");$.ajax({url : "gui.php",type : "POST",async: false,data : "name="+name+"&msg="+msg,success : function (result){$("#cuboid section").removeClass("complete").addClass("ende"); $("#resuft").html("");var v="<h1>"+result+"</h1>";$("#resuft").html(v);setTimeout(complete, 3000);}});});});
function complete(){$("#cuboid section").removeClass("ende").addClass("view");$("#name").val("");$("#msg").val("");};  
function black(){ $(".zebra-style tr:odd").addClass("odd");};
$(document).ready(function(){$.ajax({url: "check.php",type: 'POST',dataType: "html",success: function(msg){if (msg!=""){$("#add").html(msg); black();}}});});
$(function() {$('#re').click(function() {check();});});

function check() {$.ajax({url: "check.php",type: 'POST',dataType: "html",success: function(msg){if (msg!=""){$("#add").html("");$("#add").html(msg); black();}}});}