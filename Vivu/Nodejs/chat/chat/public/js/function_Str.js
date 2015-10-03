
function Online_user()
{
    var header = {0:'1'};
    var data ={0:header, 1:'o'};
    //data = convertjson(data);
    SendData(data);
}

function singer()
{
    var header = {0:"1",1:"3"};
    var data ={0:header, 1:"a", 3:securtySend()};
    //data = convertjson(data);
    SendData(data);
    //StateNow="w";
    
   
    loop_w();
     alert(State);
}

function Start_chat()
{
    var header = {0:"1",1:"2"};
    var data ={0:header, 1:"s", 2:userChat()};
    //data = convertjson(data);
    SendData(data);
    loop_s();
}

function Send_msg(msg)
{
    var header = {0:"1",1:"2",2:"4"};
    var data ={0: header, 1:"n" , 2:userChat() , 4:msg};
    //data = convertjson(data);
    SendData(data);
}

function check_chat()
{
    var header = {0:"1",1:"2"};
    var data ={0: header, 1:"n", 2:userChat()};
    //data = convertjson(data);
    SendData(data);
}

function wait_chat()
{
    var header = {0:"1",1:"2"};
    var data ={0: header, 1:"w", 2:userChat()};
    //data = convertjson(data);
    SendData(data);
}

function exit_chat()
{
    //var header = 
    var data ={0:{0:"1",1:"2"}, 1:"e", 2:userChat()};
    //data = convertjson(data);
    SendData(data);
    
}

function loop_o()
{
    if(StateNow=="o")
    {
        Online_user();
        window.setTimeout("loop_o();", 5000);
    }
}

function loop_w()
{
    alert(StateNow);
    //if(StateNow=='o'){ StateNow='w';};
    if(StateNow=='w')
    {
        //alert('loop_w');
        wait_chat();
        window.setTimeout("loop_w();", 2000);
    }
}

function loop_s()
{
    alert(StateNow);
    if(StateNow=="s")
    {
        Start_chat();
        window.setTimeout("loop_s();", 2000);
    }
    if(StateNow=="n")
    {
        check_chat();
    }
}

function loop_msg()
{
    if(StateNow=="n")
    {
        check_chat();
        if(checkmsg==1)
        {
            check_chat();
        }else
        {
            window.setTimeout("loop_msg();", 1000);
        }
        
    }
    else if(StateNow=="e")
    {
        
        // thông báo người lạ thoát chuyển trạng thái
        StateNow="w";
        
        loop_a();
    }
}
