function Online_user()
{
    var data ={0:{"1"}, 1:"o"};
    dataS = convertjson(data);
    SendData("chat.php",dataS);
}

function singer()
{
    var data ={0:{"1","3"}, 1:"a", 3:securtySend()};
    dataS = convertjson(data);
    SendData("chat.php",dataS);
    loop_a();
}

function Start_chat()
{
    var data ={0:{"1","2"}, 1:"s", 2:userChat()};
    dataS = convertjson(data);
    SendData("chat.php",dataS);
    loop_s();
}

function Send_msg(msg)
{
    var data ={0:{"1","2","4"}, 1:"n" , 2:userChat() , 4:msg};
    dataS = convertjson(data);
    SendData("chat.php",dataS);
}

function check_chat()
{
    var data ={0:{"1","2"}, 1:"n", 2:userChat()};
    dataS = convertjson(data);
    SendData("chat.php",dataS);
}

function wait_chat()
{
    var data ={0:{"1","2"}, 1:"w", 2:userChat()};
    dataS = convertjson(data);
    SendData("chat.php",dataS);
}

function exit_chat()
{
    var data ={0:{"1","2"}, 1:"e", 2:userChat()};
    dataS = convertjson(data);
    SendData("chat.php",dataS);
    
}

function loop_o()
{
    if(StateNow=="o")
    {
        Online_user();
        window.setTimeout("loop_o();", 5000);
    }
}

function loop_a()
{
    if(StateNow=="a")
    {
        wait_chat();
        window.setTimeout("loop_a();", 2000);
    }
}

function loop_s()
{
    if(StateNow=="s")
    {
        Start_chat();
        window.setTimeout("loop_s();", 2000);
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
            window.setTimeout("loop_msg();", 2000);
        }
        
    }
    else if(StateNow=="e")
    {
        
        // thông báo người lạ thoát chuyển trạng thái
        StateNow="w";
        
        loop_a();
    }
}
