var StateNow="o";
var stranger;
var userID=0;
var match=0;
var strangerID=0;
var checkmsg=0;

//server gui ve
    function StateChangeUser( state ){
        StateNow = state;
    }
    // nguoi online
    function online(munber){
        $("#online").html(muber);
    }
    // bảo mật người dùng
    function SecurtyUser(string){
        userID=string[1];
        match=string[2];
        $.cookie("user",userID,{ expires: 365 });
        $.cookie("match",match,{ expires: 365 };
    }
    
    function stranger(string){
        strangerID=string[1];
        //info
    }
    function messentge(msg,time)
    {
        var h = time[0];
        vả m = time[1];
        $("#viewdata").append("<div class='view_c' ><div class='regac with_c'><h6>"+emotify( msg )+"</h6><h6><small><b class='time'>"+h+":"+m+"</b></small></h6></div></div>  "); // tin nhan
    }
    function messenger(string){
        var msg = string[1];
        var time = string[3];
        if ($("#main").height()-$("#main").scrollTop()<=46)
        {
            messentge(msg,time);
            $("#main").scrollTop($("#main").height());
        }
        else
        {
            $(".newmsgdv").show();
             messentge(msg,time);
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
    function dataRecieve(string){
        var header = string[0];
        for (i in header){
            switch (i){
                console.write(i);
                case "1": StateChangeUser( srting[1]);break;
                case "2": online(string[2]);break;
                case "3": SecurtyUser(string[3]); break;
                case "4": stranger(string[4]); break;
                case "5": messenger(string[5]); break;
                case "6": infoUser(string[6]); break;
                case "7": stateMsg(string[7]); break;
            }
        }
    }
// user gui len
    function userChat(){
        var data = { 1:userID,2:strangerID }
        return data;
    }
    function securtySend(){
        var data = {1:$.cookie("user"),2:$.cookie("match")};
        return data;
    }
    function info(){
        // lay trong cookie
    }
    function newSend(){
        var dataSend = new Array();
        var header = new Array();
        dataSend[1] = stateUser;
        header[1]="1";
        if (stateUser != "a"){
            if (stateUser == "s"){
                dataSend[3] = securtySend();
                header[3]="3";  
            }else{
                dataSend[2] = userChat();
                header[2]="2";
            }
        }
        
        // chua co dong bo thong tin
        dataSend[0] = header;
        return dataSend;
    }
// ajax
    function SendData(url,dataS){
        $.ajax({
            url: url,
            type: 'POST',
            data: {data:dataS},
            datatype:json,
            success: funftion(string){
                dataRecieve($.parseJSON(string));
                },
            error: function (){
                alert('Có lỗi xảy ra');
            }
        })
    }
    
    function convertjson(string)
    {
        data = JSON.stringify(string);
        return data;
    }