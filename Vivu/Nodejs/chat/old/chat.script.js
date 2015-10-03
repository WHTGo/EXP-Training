           var no ="n";
            var youname ="Ngu?i l?";
            var myname = "B?n";
            var xmlHttp;
            var xmlHttp1;
            var xmlHttp2;
            var xmlHttp3;
            var xmlHttp4;
            var xmlHttp5;
            var xmlHttp6;
            var xmlHttp7;
            var xmlHttp8;
            var xmlHttp9;
            var xmlHttp10;
            var xmlHttp11;
            var userId = 0;
            var math=0;
            var strangerId = 0;
            var playTitleFlag = false;
            var cok;
            var now = new Date();
            var mathhttp;
            now.setFullYear(now.getFullYear()+1);
            now.toGMTString();
            
            
            
            
            // Generic function to create xmlHttpRequest for any browser //
            function GetXmlHttpObject()
                {
                var xmlHttp = null;

                try
                    {
                    // Firefox, Opera 8.0+, Safari
                    xmlHttp = new XMLHttpRequest();
                    }
                catch (e)
                    {
                    //Internet Explorer
                    try
                        {
                        xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
                        }
                    catch (e)
                        {
                        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
                        }
                    }

                return xmlHttp;
                }


            // Ajax part to get number of online chat //
            function getNumberOfOnlineUsers()
                {
                xmlHttp = GetXmlHttpObject();

                if (xmlHttp == null)
                    {
                    alert("Browser does not support HTTP Request");
                    return;
                    }

                var url = "getNumberOfUsers.php?id=" + userId;
                xmlHttp.open("POST", url, true);
                xmlHttp.onreadystatechange = stateChanged;
                xmlHttp.send(null);
                }

            function stateChanged()
                {
                if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
                    {
                    var count = xmlHttp.responseText;
                    document.getElementById("onlinecount").innerHTML = count + " dang online";
                    
                    window.setTimeout("getNumberOfOnlineUsers();", 2000);
                    }
                }
                
             // online IT-team
             /*function Time(){
                var now = new Date();
                now.setFullYear(now.getFullYear()+1);
                return now;
            }*/
            function writeCK(){
                if (getCookie("id")!=null){
                    userId=getCookie("id");
                    math=getCookie("math");
                }
            }
            function add_id_math(val){
                userId=val%1000000000;
                val=val-userId;
                math=val/1000000000;
                
            }
            function autologin(){
                writeCK();
                cok = GetXmlHttpObject();

                if (cok == null)
                    {
                    alert("Browser does not support HTTP Request");
                    return;
                    }

                var url = "autologin?id=" + userId +"&math=" + math;
                cok.open("POST", url, true);
                cok.onreadystatechange = req();
                cok.send(null);
                }

            function req()
                {
                   var res = cok.responseText;
                   if (res=="N"){
                    // chua dang kí
                   }else{
                    
                    document.getElementById("sl").style.display = 'none';
                    document.getElementById("silo").innerHTML+= "<div class='user'>Chào! "+res+" </div>";
                    }
                    
                }/*
            function exit(){
                userId=0;
                math=0;
                eraseCookie("id");
                eraseCookie("math");
                document.getElementById("silo").innerHTML = "";
                document.getElementById("sl").style.display = 'block';
                
            }*/
            
            function login(){
                var mail = document.getElementById("mail").value;
                var pass = document.getElementById("pass").value;
                var l=GetXmlHttpObject();

                if (l == null)
                    {
                    alert("Browser does not support HTTP Request");
                    return;
                    }

                var url = "login?mail=" + mail +"&pass=" + pass;
                l.open("POST", url, true);
                l.onreadystatechange = reg;
                l.send(null);
                }
                
                
            function reg(){
                if (l.readyState == 4 || l.readyState == "complete")
                    {
                    var vlai = l.responseText;
                    add_id_math(vlai);
                    var now = new Date();
                    now.setFullYear(now.getFullYear()+1);
                    now.toGMTString();
            
                    setCookie("id",userId,now);
                    setCookie("math",math,now);
                    autologin();
                    }
    
                     
            }
            
            
                
            
            /* function Day()
                {
                xmlHttp11 = GetXmlHttpObject();

                if (xmlHttp11 == null)
                    {
                    alert("Browser does not support HTTP Request");
                    return;
                    }

                var url = "datetime.php";
                xmlHttp11.open("POST", url, true);
                xmlHttp11.onreadystatechange = daytime;
                xmlHttp11.send(null);
                }
            function daytime(){
                if (xmlHttp11.readyState == 4 || xmlHttp11.readyState == "complete")
                    {
                    var end = xmlHttp11.responseText;
    
            }
          
          */
          
          
          
            /*
            function OnlineUsers()
                {
                xmlHttp1 = GetXmlHttpObject();

                if (xmlHttp1 == null)
                    {
                    alert("Browser does not support HTTP Request");
                    return;
                    }

                var url = "online.php?id=" + userId;
                xmlHttp1.open("POST", url, true);
                xmlHttp1.onreadystatechange = Online;
                xmlHttp1.send(null);
                }
              function Online()
              {
                //.....
              }
               
            */

            // End of get number of online users//

            // Ajax part start chat //
            function startChat()
                {
                    userId=getCookie("id");
                    math=getCookie("math");
                    xmlHttp2 = GetXmlHttpObject();

                if (xmlHttp2 == null)
                    {
                    alert("Browser does not support HTTP Request");
                    return;
                    }

                var url = "startChat.php?userId=" + userId +"&math=" + math;
                xmlHttp2.open("POST", url, true);
                xmlHttp2.onreadystatechange = stateChanged2;
                xmlHttp2.send(null);
                }

            function stateChanged2()
                {
                if (xmlHttp2.readyState == 4 || xmlHttp2.readyState == "complete")
                    {
                    userId = trim(xmlHttp2.responseText);
                   // userId=val%1000000000;
                   // val=val-userId;
                   // math=val/1000000000;
                    document.getElementById("chatbox").style.display = 'block';
                    document.getElementById("sendbtn").disabled = true;
                    document.getElementById("chatmsg").disabled = true;
                    document.getElementById("disconnectbtn").disabled = true;

                    document.getElementById("intro").style.display = 'none';
                    document.getElementById("sayHi").style.display = 'none';
                    document.getElementById("lit").style.display = 'none'
                        
                    if (document.getElementById("chatDisconnected") != undefined)
                        document.getElementById("chatDisconnected").style.display = 'none';

                    if (document.getElementById("startNew") != undefined)
                        document.getElementById("startNew").style.display = 'none';
                    if ((getCookie("id")==null) || (userId!=getCookie("id"))){
                        
                        setCookie("id",userId,now);
                        if (getCookie("math")==null){
                            maths();
                        }
                    }
                    randomChat();
                    }
                }
                function maths()
                    {
                        mathhttp = GetXmlHttpObject();
                    if (mathhttp == null)
                        {
                        alert("Browser does not support HTTP Request");
                        return;
                        }
    
                    var url = "math.php?id=" + userId ;
                    mathhttp.open("POST", url, true);
                    mathhttp.onreadystatechange = mat;
                    mathhttp.send(null);
                    }
                function mat(){ 
                if (mathhttp.readyState == 4 || mathhttp.readyState == "complete")
                    {
                    math = trim(mathhttp.responseText);
                    
                    setCookie("math",math,now);
                    }
                }
                
                

            // End of start chat//

            // Ajax part leave chat //
            function leaveChat()
                {
                playTitleFlag = false;
                xmlHttp3 = GetXmlHttpObject();

                if (xmlHttp3 == null)
                    {
                    alert("Browser does not support HTTP Request");
                    return;
                    }

                var url = "leaveChat.php?userId=" + userId;
                xmlHttp3.open("POST", url, true);
                xmlHttp3.onreadystatechange = stateChanged3;
                xmlHttp3.send(null);
                }

            function stateChanged3()
                {
                }

            // End of leave chat//

            // Ajax part random chat //
            function randomChat()
                {
                xmlHttp4 = GetXmlHttpObject();

                if (xmlHttp4 == null)
                    {
                    alert("Browser does not support HTTP Request");
                    return;
                    }

                var url = "randomChat.php?userId=" + userId;
                xmlHttp4.open("POST", url, true);
                xmlHttp4.onreadystatechange = stateChanged4;
                xmlHttp4.send(null);
                }

            function stateChanged4()
                {
                if (xmlHttp4.readyState == 4 || xmlHttp4.readyState == "complete")
                    {
                    strangerId = trim(xmlHttp4.responseText);

                    if (strangerId != "0")
                        {
                        document.getElementById("sendbtn").disabled = false;
                        document.getElementById("chatmsg").disabled = false;
                        document.getElementById("disconnectbtn").disabled = false;
                        document.getElementById("sayHi").style.display = 'block';
                        document.getElementById("connecting").style.display = 'none';
                        document.getElementById("looking").style.display = 'none';
                        
                        listenToReceive();
                        isTyping();
                        }

                    else
                        {
                        window.setTimeout("randomChat();", 2000);
                        }
                    }
                }

            // End of random chat//

            // Ajax part random chat //
            function listenToReceive()
                {
                xmlHttp5 = GetXmlHttpObject();

                if (xmlHttp5 == null)
                    {
                    alert("Browser does not support HTTP Request");
                    return;
                    }

                var url = "listenToReceive.php?userId=" + userId + "&youId=" + strangerId;
                xmlHttp5.open("POST", url, true);
                xmlHttp5.onreadystatechange = stateChanged5;
                xmlHttp5.send(null);
                }

            function stateChanged5()
                {
                if (xmlHttp5.readyState == 4 || xmlHttp5.readyState == "complete")
                    {
                    var msg = xmlHttp5.responseText;

                    if (trim(msg) == "||--noResult--||")
                        {
                        // other party is disconnected//
                        document.getElementById("sendbtn").disabled = true;
                        document.getElementById("chatmsg").disabled = true;
                        document.getElementById("disconnectbtn").disabled = true;
                        document.getElementById("sayHi").style.display = 'none';
                        document.getElementById("chatDisconnected").style.display = 'block';
                        document.getElementById("logbox").innerHTML
                            += "<div id='startNew' class='logitem'><div><br><input value='B?t d?u chat l?i' onclick='startNewChat();' type='button' class='startnewconver'> ho?c <a href='#' onclick='saveLog();'>luu log chat</a></div></div>";
                        document.getElementById("logbox").scrollTop = document.getElementById("logbox").scrollHeight;
                        leaveChat();

                        return;
                        }

                    else if (trim(msg) != "" && msg != undefined)
                        {
                        // Message received //
                        document.getElementById("logbox").innerHTML
                            += "<div class='logitem'><div class='strangermsg'><span class='msgsource'>"+youname+": </span>"
                                   + msg + "</div></div>";
                        document.getElementById("logbox").scrollTop = document.getElementById("logbox").scrollHeight;
                        
                        playTitleFlag = true;
                        playTitle();
                        }
                    //OnlineUsers();
                    window.setTimeout("listenToReceive();", 2000);
                    }
                }

            // End of random chat//

            // Ajax part send chat message //
            function sendMsg()
                {
                var msg = document.getElementById("chatmsg").value;

                if (trim(msg) != "")
                    {
                    appendMyMessage();
                    xmlHttp6 = GetXmlHttpObject();

                    if (xmlHttp6 == null)
                        {
                        alert("Browser does not support HTTP Request");
                        return;
                        }

                    document.getElementById("chatmsg").value = "";
                    var url = "sendMsg.php?userId=" + userId + "&strangerId=" + strangerId + "&msg=" + msg;
                    xmlHttp6.open("POST", url, true);
                    xmlHttp6.onreadystatechange = stateChanged6;
                    xmlHttp6.send(null);
                    }
                }

            function stateChanged6()
                {
                }

            // End of send chat message//

            //function to append my message to the chat area//
            function appendMyMessage()
                {
                var msg = document.getElementById("chatmsg").value;

                if (trim(msg) != "")
                    {
                    document.getElementById("logbox").innerHTML
                        += "<div class='logitem'><div class='youmsg'><span class='msgsource'>B?n: </span> " + msg
                               + "</div></div>";
                    document.getElementById("logbox").scrollTop = document.getElementById("logbox").scrollHeight;
                    }
                }

            //function to disconnect
            function disconnect()
                {
                var flag = confirm("Are you sure you want to be disconnected from this chat?");

                if (flag)
                    {
                    leaveChat();
                    document.getElementById("sendbtn").disabled = true;
                    document.getElementById("chatmsg").disabled = true;
                    document.getElementById("disconnectbtn").disabled = true;

                    document.getElementById("sayHi").style.display = 'none';
                    document.getElementById("chatDisconnected").style.display = 'block';
                    }
                }

            //function to send on pressing Enter Key//
            function tryToSend(event)
                {
                var key = event.keyCode;

                if (key == "13")
                    {
                    sendMsg();
                    return;
                    }

                var msg = document.getElementById("chatmsg").value;

                if (trim(msg) != "")
                    {
                    typing();
                    }

                else
                    {
                    stopTyping();
                    }
                }


            // Ajax part to indicat user is typing //
            function typing()
                {
                xmlHttp7 = GetXmlHttpObject();

                if (xmlHttp7 == null)
                    {
                    alert("Browser does not support HTTP Request");
                    return;
                    }

                var url = "typing.php?userId=" + userId;
                xmlHttp7.open("POST", url, true);
                xmlHttp7.onreadystatechange = stateChanged7;
                xmlHttp7.send(null);
                }

            function stateChanged7()
                {
                if (xmlHttp7.readyState == 4 || xmlHttp7.readyState == "complete")
                    {
                    }
                }

            // End of indicat user is typing //


            // Ajax part to indicat user is not typing //
            function stopTyping()
                {
                xmlHttp8 = GetXmlHttpObject();

                if (xmlHttp8 == null)
                    {
                    alert("Browser does not support HTTP Request");
                    return;
                    }

                var url = "stopTyping.php?userId=" + userId;
                xmlHttp8.open("POST", url, true);
                xmlHttp8.onreadystatechange = stateChanged8;
                xmlHttp8.send(null);
                }

            function stateChanged8()
                {
                if (xmlHttp8.readyState == 4 || xmlHttp8.readyState == "complete")
                    {
                    }
                }

            // End of indicat user is not typing //

            // Ajax to see if stranger is typing//
            function isTyping()
                {
                xmlHttp9 = GetXmlHttpObject();

                if (xmlHttp9 == null)
                    {
                    alert("Browser does not support HTTP Request");
                    return;
                    }

                var url = "isTyping.php?strangerId=" + strangerId;
                xmlHttp9.open("POST", url, true);
                xmlHttp9.onreadystatechange = stateChanged9;
                xmlHttp9.send(null);
                }

            function stateChanged9()
                {
                if (xmlHttp9.readyState == 4 || xmlHttp9.readyState == "complete")
                    {
                    if (trim(xmlHttp9.responseText) == "typing")
                        {
                        //alert("stranger is typing");
                        document.getElementById("typing").style.display = 'block';
                        }

                    else
                        {
                        document.getElementById("typing").style.display = 'none';
                        }

                    window.setTimeout("isTyping();", 2000);
                    }
                }

            //Ajax to see if stranger is typing//

            // to start new chat //
            function startNewChat()
                {
                document.getElementById("logbox").innerHTML = "";
                document.getElementById("logbox").innerHTML
                    = "<div id='connecting' class='logitem'><div class='statuslog'>Ðang k?t n?i v?i máy ch?..</div></div><div id='looking' class='logitem'><div class='statuslog'>B?n ch? tý nhé, dang tìm ki?m Ngu?i l?.</div></div><div id='sayHi' class='logitem'><div class='statuslog'>B?n dang chat v?i Ngu?i l?. Nói \"Xin chào!\" d? b?t d?u..</div></div><div id='chatDisconnected' class='logitem'><div class='statuslog'>Ngu?i l? dã thoát.</div></div>";
                startChat();
                }

            // function to trim strings
            function trim(sVal)
                {
                var sTrimmed = "";

                for (i = 0; i < sVal.length; i++)
                    {
                    if (sVal.charAt(i) != " " && sVal.charAt(i) != "\f" && sVal.charAt(i) != "\n" && sVal.charAt(i)
                                                                                                         != "\r"
                        && sVal.charAt(i) != "\t")
                        {
                        sTrimmed = sTrimmed + sVal.charAt(i);
                        }
                    }

                return sTrimmed;
                }

            // function to play title //
            function playTitle()
                {
                document.title = "Chat voi nguoi la";
                window.setTimeout('document.title="Chat voi nguoi la";', 1000);
                window.setTimeout('document.title="Ban co tin nhan moi";', 2000);
                // window.setTimeout('document.title="Hay xem ho noi gi";', 3000);

                if (playTitleFlag == true)
                    {
                    window.setTimeout('playTitle();', 4000);
                    }
                }

            // function to detect if browser has focus
            window.onfocus = function()
                {
                playTitleFlag = false;
                }


            // Ajax part to save log //
            function saveLog()
                {
                xmlHttp10 = GetXmlHttpObject();

                if (xmlHttp10 == null)
                    {
                    alert("Browser does not support HTTP Request");
                    return;
                    }

                var url = "saveLog.php?userId=" + userId + "&strangerId=" + strangerId;
                xmlHttp10.open("POST", url, true);
                xmlHttp10.onreadystatechange = stateChanged10;
                xmlHttp10.send(null);
                }

            function stateChanged10()
                {
                if (xmlHttp10.readyState == 4 || xmlHttp10.readyState == "complete")
                    {
                    var log = xmlHttp10.responseText;
                    var generator = window.open('', '', 'height=400,width=500,top=100,left=100');
                    generator.document.write('<html><head><title>Log File</title>');
                    generator.document.write('<link type="text/css" rel="stylesheet" href="Omegle_files/style.css">');
                    generator.document.write('</head><body>');
                    generator.document.write(log);
                    generator.document.write('</body></html>');
                    generator.document.close();
                    }
                }
            // End of save log//
            
            
            // Cookie
            // Get Cookie
            function setCookie(name, value, expires, path, domain, secure) {
                document.cookie = name + "=" + escape(value) +
                ((expires == null) ? "" : "; expires=" + expires.toGMTString()) +
                ((path == null) ? "" : "; path=" + path) +
                ((domain == null) ? "" : "; domain=" + domain) +
                ((secure == null) ? "" : "; secure");
            }
             
            // Read cookie
            function getCookie(name){
                var cname = name + "=";
                var dc = document.cookie;
                if (dc.length > 0) {
                    begin = dc.indexOf(cname);
                    if (begin != -1) {
                        begin += cname.length;
                        end = dc.indexOf(";", begin);
                        if (end == -1) end = dc.length;
                        return unescape(dc.substring(begin, end));
                    }
                }
                return null;
            }
             
            //delete cookie
            function eraseCookie (name,path,domain) {
                if (getCookie(name)) {
                    document.cookie = name + "=" +
                    ((path == null) ? "" : "; path=" + path) +
                    ((domain == null) ? "" : "; domain=" + domain) +"; expires=Thu, 01-Jan-70 00:00:01 GMT";
                }
            }
            // IT-team
             function youName()
             {
                xmlHttp12 = GetXmlHttpObject();
            
                if (xmlHttp12 == null)
                {
                    alert("Browser does not support HTTP Request");
                    return;
                }
            
                var url = "Youname.php?id=" + strangerId;
                xmlHttp12.open("POST", url, true);
                xmlHttp12.onreadystatechange = name;
                xmlHttp12.send(null);
            }
            
            function name()
            {
                if (xmlHttp12.readyState == 4 || xmlHttp12.readyState == "complete"){
                    no = xmlHttp12.responseText;
                    if (no!="n"){
                        youname=no;
                    }
                }
            }
  
