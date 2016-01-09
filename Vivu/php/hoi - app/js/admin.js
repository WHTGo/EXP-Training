 $(document).ready(function(){
        $.getScript('js/popup.js');
    });
    $(function(){

         $('#ok').click(function(){
            login();
            });
         function login(){ 
            var user=  $.trim($("#id").val());
            var pass=  $.trim($("#pass").val());
            if(pass == "") {alert("Bạn chưa nhập password!");return false;}
            if(user == "") {alert("Bạn chưa nhập user!");return false;}
            $.ajax({
                url : "login.php",
                type : "POST",
                data : "user="+user+"&pass="+pass,
                success : function (results){
                    if (results!='n'){
                        //alert('ok');
                        $.getScript(results);
                        $("#name").val("");
                        $("#msg").val("");
                        $('#login').hide();
                        $('#main').show();
                    }else{
                        alert('User ho?c Password sai!')
                    }
                        
                    },
    			error: function (){
    				alert('Có l?i x?y ra');
    			}
                });
                     
         }
            
    });
    