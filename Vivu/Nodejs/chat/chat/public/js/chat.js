var StateNow="o";
var stranger;
var userID=0;
var match=0;
var strangerID=0;
var checkmsg=0;
var data;
var StateChat=null;

//server gui ve
    function StateChangeUser( state ){
        StateNow = state;
    }
    // nguoi online
    function online(munber){
        $("#online").html(munber+" online");
    }
    // bảo mật người dùng
    function SecurtyUser(string){
        userID=string['ID'];
        match=string['Match'];
        $.cookie("user",userID,{ expires: 365 });
        $.cookie("match",match,{ expires: 365 });
    }
    
    function stranger(string){
        strangerID=string[1];
        //info
    }
    function messentge(msg,h,m)
    {
        $("#viewdata").append("<div class='view_c' ><div class='regac with_c'><h6>"+emotify( msg )+"</h6><h6><small><b class='time'>"+h+":"+m+"</b></small></h6></div></div>  "); // tin nhan
    }
    function messenger(string){
        var msg = string['msg'];
        var h = string['h'];
        var m = string['m'];
        if ($("#main").height()-$("#main").scrollTop()<=46)
        {
            messentge(msg,h,m);
            $("#main").scrollTop($("#main").height());
        }
        else
        {
            $(".newmsgdv").show();
             messentge(msg,h,m);
            // thông báo có tin nhắn
        }
        
        if (string[2] == "y")
        {
            checkmsg =1;
        }else{
            checkmsg =0;
        }
    }
    function infoUser(string){
        // info
    }
    function stateMsg(string){
        switch (string){
            case "r":{
                $(".state:last").html("đã nhận");
            }break;
            case "v":{
                $(".state:last").html("đã xem");
            }break;
            case "y":{
                //
            }break;    
        }
    }
    
    // user gui len
    function userChat(){
        var data = { 1:userID,2:strangerID }
        return data;
    }
    function securtySend() {
        var id = 0;
        if(typeof $.cookie("user") == 'undefined' ) id= 0; else id =$.cookie("user");
        var match =0;
        if(typeof $.cookie("match") == 'undefined' ) match= 0; else match =$.cookie("match");
        var data = {0:id,1:match};
        return data;
    }
    function info(){
        // lay trong cookie
    }
    
    var loopw = function()
    {
        if(StateChat!='s')
        {
            SendData();
        }
    }
    
// xử lý gửi về
    function dataRecieve(string){
        //alert(string);
        var header = string[0];
        //alert(header);
        for (var i in header)
        {
            //alert(header[i]);
            if(header[i]==1)
            {
                StateChangeUser(string[1]);
            }else if(header[i]==2)
            {
                online( string[2]);
            }else if(header[i]==3)
            {
                SecurtyUser(string[3]);
            }else if(header[i]==4)
            {
                stranger(string[4]);
            }else if(header[i]==5)
            {
                 messenger(string[5]);
            }else if(header[i]==6)
            {
                infoUser(string[6]);
            }else if(header[i]==7)
            {
                stateMsg(string[7]);
            }
        }
        
        if(StateNow=='s')
        {
            var header = {0:"1",1:"2"};
            data ={0:header, 1:"s", 2:userChat()};
            setTimeout("SendData();", 2000);
            
        }else if(StateNow=='n')
        {
            var header = {0:"1",1:"2"};
            data ={0: header, 1:"n", 2:userChat()};
            setTimeout("SendData();", 2000);
            
        }else if(StateNow=='w')
        {
            var header = {0:"1",1:"2"};
            data ={0: header, 1:"w", 2:userChat()};
            setTimeout(loopw, 5000);
            
        }else if(StateNow=='e')
        {
            
        }
    }
    
    
    function dataR(string){
        //alert(string);
        var header = string[0];
        //alert(header);
        for (var i in header)
        {
            //alert(header[i]);
            if(header[i]==1)
            {
                StateChangeUser(string[1]);
            }else if(header[i]==2)
            {
                online( string[2]);
            }else if(header[i]==3)
            {
                SecurtyUser(string[3]);
            }else if(header[i]==4)
            {
                stranger(string[4]);
            }else if(header[i]==5)
            {
                 messenger(string[5]);
            }else if(header[i]==6)
            {
                infoUser(string[6]);
            }else if(header[i]==7)
            {
                stateMsg(string[7]);
            }
        }
    }

// ajax
    function SendData(){
        
        $.ajax({
            url: 'index.php?c=controll',
            type: 'POST',
            data: {data:data},
            dateType:'json',
            success: function(string){
                var dataj = $.parseJSON(string);
                dataRecieve(dataj);
            },
            error: function ()
            {
                alert('Có lỗi xảy ra');
            }
        });
    }
    
    function convertjson(string)
    {
        var datajs = JSON.stringify(string);
        return datajs;
    }
    
    function Send_msg(msg)
    {
        var header = {0:"1",1:"2",2:"4"};
         var datam ={0: header, 1:"n" , 2:userChat() , 4:msg};
        //data = convertjson(data);
        $.ajax({
            url: 'index.php?c=controll',
            type: 'POST',
            data: {data:datam},
            dateType:'json',
            success: function(string){
                var dataj = $.parseJSON(string);
                dataR(dataj);
            },
            error: function ()
            {
                alert('Có lỗi xảy ra');
            }
        });
    }
    
    function Online_user()
    {
        var header = {0:'1'};
        var datao={0:header, 1:'o'};
        $.ajax({
            url: 'index.php?c=controll',
            type: 'POST',
            data: {data:datao},
            dateType:'json',
            success: function(string){
                var dataj = $.parseJSON(string);
                online(dataj[2]);
                if(StateNow=="o")
                {
                    setTimeout("Online_user();", 5000);
                }
            },
            error: function ()
            {
                alert('Có lỗi xảy ra');
            }
        });
    }
    

    function singer()
    {
        var header = {0:"1",1:"3"};
        data ={0:header, 1:"a", 3:securtySend()};
        SendData();
    }
    
    function Start_chat()
    {
        StateChat='s';
        var header = {0:"1",1:"2"};
        data ={0:header, 1:"s", 2:userChat()};
        SendData();
    }
    
    function exit()
    {
        var header = {0:"1",1:"2"}
        var datae ={0: header, 1:"e", 2:userChat()};
        $.ajax({
            url: 'index.php?c=controll',
            type: 'POST',
            data: {data:datae},
            dateType:'json',
            success: function(string){
                var dataj = $.parseJSON(string);
                dataR(dataj);
            },
            error: function ()
            {
                alert('Có lỗi xảy ra');
            }
        });
    }

