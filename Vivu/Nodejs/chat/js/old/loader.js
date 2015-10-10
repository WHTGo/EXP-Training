$(document).ready(function(){$.ajax({url: "check.php",type: 'POST',dataType: "html",success: function(msg){if (msg!=""){$("#add").html(msg);}}});});
$(function() {$(document).ready(function(){$('#re').click(function() {$.ajax({url: "check.php",type: 'POST',dataType: "html",success: function(msg){if (msg!=""){$("#add").html("");$("#add").html(msg);}}});});});});
