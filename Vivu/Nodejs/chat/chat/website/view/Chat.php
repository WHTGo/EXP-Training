<?php ?>
<html>
    <head>
    <meta charset="utf-8">
    <link rel="icon" href="public/img/chat.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Chat với người lạ</title>

        <link type = "text/css" rel = "stylesheet" href = "public/style/style.css">
        <link rel="stylesheet" href="public/style/popup.css" />
        
        <script src="public/js/jquery-2.0.0.js"></script>
        <script src="public/js/jquery.cookie.js"></script>
        
        <script type="text/javascript" src="public/js/popup.js" ></script>
        
        <!-- chat ico -->
        <script src="public/js/ba-emotify.js"></script>
        <script src="public/js/chatico.js"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="public/bootstrap/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="public/bootstrap/bootstrap-theme.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="public/bootstrap/bootstrap.min.js"></script>
        
        <script src="public/js/chat.js"></script>
       <!-- <script src="public/js/function_Str.js"></script> -->
        <script src="public/js/javaScript.js"></script>
    </head>

    <body style="background: #DDF0D4;" >
       <header id = "header" style="display: -webkit-box; top: 0; position: fixed; width: 100%;">
            
                <div style="display: -webkit-box;"> 
                <h1 style="  font-size: 50px;   margin-top: 0px;"> chat</h1>
                <img src="public/img/chat.png">
                <aside title="Số người online" id="online" style=" min-width: 50px; height: 20px;">0 online</aside>
                </div>
                <h3><p id="intro" style="/* position: relative; */ bottom: -27px; left: -70px;">&#160;&#160;Nơi những người lạ gặp nhau</p></h3>
                
           
            
        </header>
        
        <div id="main" style="overflow: auto;background: #DDF0D4; margin:auto; min-width: 500px; max-width: 900px; height: 100%;">
            
            <div id="main_1" style=" background:  white; width: 100%; height: 100%;">
                <div id="login" style="margin: auto; width: 100%;">
                    <div class="main1in">
                    <p>Tìm vào kết bạn kết bạn bốn phương</p>
                    <p>Không cần đăng kí và là chat</p>
                    <button id="acc" style="width: auto; padding: 4px; border-radius: 3px;"> Đăng nhập chat</button>
                    </div>
                </div>
                
                <div id="chat">
                    
                </div>
            </div>
            
            <div id="chatstast" style="  text-align: -webkit-center; display: none">
                <div style=" width: 300px; height: 400px; background: aqua; top:100px; left: 100px;">
                    <button id='stat' style="width: auto; padding: 4px; border-radius: 3px;"> Đăng nhập chat</button>
                
                </div>
            
            
            </div>
            
            <div id="viewc" style="display: none;">
                 <div id="task" style="height: 33px; background: rgb(202, 226, 209); position: relative; top: 0px; display: -webkit-box;">
                     <aside id="rengar"><a>người lạ</a></aside>
                     <aside id="exitc" style=" position: absolute; right: 1px; top: 3px;"> <img title="Thoát" style="height: 27px; cursor: pointer;" src="img/exit.png" /></aside>
                     <div class="newmsgdv"><button id="newmsg" class="newmsg"><p style="margin: auto;">Bạn có tin nhắn mới</p></button></div>
                 </div>
                 
                <div id="viewdata" style=" background: white; vertical-align: bottom; ">
                    <div class="view_c" >
                        <div class="userc with_c">
                            <h6>For 50 years, WWF has been protecting the future of nature. The world's leading conservation organization, WWF works in 100 countries and is supported by 1.2 million members in the United States and close to 5 million globally.</h6>
                            <h6><small>thời gian</small></h6>
                        </div>
                    </div>
                    
                    <div class="view_c" >
                        <div class="regac with_c">
                            <h6>For 50 years, WWF has been protecting the future of nature. The world's leading conservation organization, WWF works in 100 countries and is supported by 1.2 million members in the United States and close to 5 million globally.</h6>
                            <h6><small>thời gian</small></h6>
                        </div>       
                    </div>
                    <div class="view_c" >
                        <div class="regac with_c">
                            <h6>For 50 years, WWF has been</h6>
                            <h6><small>thời gian</small></h6>
                        </div>       
                    </div>
                    <div class="view_c" >
                        <div class="userc with_c">
                            <h6>For 50 years, WWF has been protecting the future of nature. The world's leading conservation organization, WWF works in 100 countries and is supported by 1.2 million members in the United States and close to 5 million globally.</h6>
                            <h6><small>thời gian</small></h6>
                        </div>
                    </div>
                    <div class="view_c" >
                        <div class="userc with_c">
                            <h6>For 50 years, WWF has been protecting the future of nature. The world's leading conservation organization, WWF works in 100 countries and is supported by 1.2 million members in the United States and close to 5 million globally.</h6>
                            <h6><small>thời gian</small></h6>
                        </div>
                    </div>
                    <div class="view_c" >
                        <div class="regac with_c">
                            <h6>For 50 years, WWF has been</h6>
                            <h6><small>thời gian</small></h6>
                        </div>       
                    </div>
                    <div class="view_c" >
                        <div class="userc with_c">
                            <h6>For 50 years, WWF has been protecting the future of nature. The world's leading conservation organization, WWF works in 100 countries and is supported by 1.2 million members in the United States and close to 5 million globally.</h6>
                            <h6><small>thời gian</small></h6>
                        </div>
                    </div>
                    
                    <div class="view_c" >
                        <div class="regac with_c">
                            <h6>For 50 years, WWF has been protecting the future of nature. The world's leading conservation organization, WWF works in 100 countries and is supported by 1.2 million members in the United States and close to 5 million globally.</h6>
                            <h6><small>thời gian</small></h6>
                        </div>       
                    </div>
                    <div class="view_c" >
                        <div class="regac with_c">
                            <h6>For 50 years, WWF has been</h6>
                            <h6><small>thời gian</small></h6>
                        </div>       
                    </div>
                    <div class="view_c" >
                        <div class="userc with_c">
                            <h6>For 50 years, WWF has been protecting the future of nature. The world's leading conservation organization, WWF works in 100 countries and is supported by 1.2 million members in the United States and close to 5 million globally.</h6>
                            <h6><small>thời gian</small></h6>
                        </div>
                    </div>
                    <div class="view_c" >
                        <div class="userc with_c">
                            <h6>For 50 years, WWF has been protecting the future of nature. The world's leading conservation organization, WWF works in 100 countries and is supported by 1.2 million members in the United States and close to 5 million globally.</h6>
                            <h6><small><b>thời gian</b><b style="font-size: 12px;"> | </b> <b class="state">đã nhận</b></small></h6>
                        </div>
                    </div>
                    <div class="view_c" >
                        <div class="regac with_c">
                            <h6>For 50 years, WWF has been</h6>
                            <h6><small><b class="time"> thời gian</b></small></h6>
                        </div>       
                    </div>
                </div> 
            </div>  
        </div>
      
        <div id="menu">
        <label id="menu1"><img title="Cài đặt" style="height: 25px; opacity: 0.8;" src="public/img/engin.png"></label>
        
        </div>
        <footer style=" left: 0; right: 0; display: none; " >
            <div  style="margin:auto;  width: 100%;  min-width: 500px; max-width: 900px;   left: 0; right: 0;  position: relative; border-collapse: separate;">
             
             <textarea id="mesg" class="txttera" rows="2" style=" font-size: 12px;" ></textarea>
             <label id="send" style="width: 26px;" title="Gửi tin nhắn" >Gửi</label>
             <label id="sumbit1" style="width: 40px;"><i id="icochat"></i>
             <img title="Biểu tượng chat" style="width: 33px;   padding-top: 10px;" src="public/img/smile.png">
             </label>
            </div>
        </footer>
    
    <div id="setup" class="modal-box box" style="display: none;">
      <div id="set" class="modal-body">
        </div>
      <div><button class="btn btn-small js-modal-close" style="margin-bottom: 20px;">Close</button>
      </div>
    </div>
    <div id="inforanger" class="modal-box box" style="display: none;">
      <div id="datainfo" class="modal-body">
        </div>
      <div><button class="btn btn-small js-modal-close" style="margin-bottom: 20px;">Close</button>
      </div>
    </div>

        
        
        
    </body>
</html>