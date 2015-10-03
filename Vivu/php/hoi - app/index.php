<?php
    $db=mysqli_connect("localhost","root","","DB_thaoluan");
    if (isset($_COOKIE['id'])){
        $id_old=$_COOKIE['id'];
        $ip=$_SERVER['REMOTE_ADDR'];
        mysqli_query($db,"update id set ip='$ip' WHERE id=$id_old;");
        echo $id_old;
    }else{
        $id=$_COOKIE['id'];
        echo $id;
        function rd(){
            $t0=rand(0,9);
            $t1=rand(1,9);
            $t2=rand(0,9);
            $t3=rand(0,9);
            $t4=rand(0,9);
            $t5=rand(0,9);
            $t6=rand(0,9);
            $t7=rand(0,9);
        
            $id=($t0+(10000000*$t1)+(1000000*$t2)+(100000*$t3)+(10000*$t4)+(1000*$t5)+(100*$t6)+(10*$t7));
            return $id;
        }
         $id=rd();
         $result=mysqli_query($db,"SELECT * FROM id WHERE id=$id;");
         while(mysqli_num_rows($result)!=0){
            $id=rd();
            $result=mysqli_query($db,"SELECT * FROM id WHERE id=$id;");
         }
        $ip=$_SERVER['REMOTE_ADDR'];
        mysqli_query($db,"insert into id(id,ip) values ($id,'$ip');");
        setcookie('id',$id);
    }
    /*$query="SELECT stt,name,question FROM view ";
    $con=mysqli_query($db,$query);
    if(mysqli_num_rows($con)){
        $show='';
        while($rows=mysqli_fetch_assoc($con)){
            $show.= "
                <div>
                    <tr>
                        <td>".$rows['stt']."</td>
                        <td>".$rows['name']."</td>
                        <td>".$rows['question']."</td>
                        <td><div id=id".$rows['stt']."><a href='javascript:;' class='an'> xem <p style='display:none'>".$rows['stt']."</p> </a> </div></td>
                    </tr>
                </div>
            ";
        }
        $show.='';
    }
*/
?>



<!DOCTYPE HTML>
<html>
<head><meta charset="UTF-8" />
<meta http-equiv="content-type" content="text/html" />
<link type = "text/css" rel = "stylesheet" href = "img/style.css" />
<link type = "text/css" rel = "stylesheet" href = "img/colorbox.css" />
<link rel="stylesheet" href="css/popup.css" />
<title>Hỏi?</title>

<script type="text/javascript" src="js/jquery-2.0.0.js" ></script>
<script type="text/javascript" src="js/jquery.cookie.js" ></script>
<script type="text/javascript" src="js/javas.js" ></script>
<script type="text/javascript" src="js/popup.js" ></script>

</head> 


<body>
<script>



 </script>

<section id="strat" style="position: fixed; top: 0px;">
    <aside class="it"> <img src="img/icon-truong.png" /></aside>
    <aside class="ma"><h1>IPv4</h1></aside>
    <aside class="in"><img src="img/icon-nhom.png"/></aside>
</section>
<section id="main" style="margin-top: 110px;   padding-bottom: 50px; ">
<div id="on">
  <div id="menu" style="top: 107px; left: -285px;">
    	<div id="menu_div"><a href="IPv4 & IT-TEAMPresentation.htm"><img src="img/taive.png" alt="" style=" /* border: 2px solid #3c95d9; */" />
        	<!-- Pages Fan -->
            <div id="download" style="height: 101px; background: rgb(14, 89, 72);" >
            <br />
            <p> <a href="IPv4 & IT-TEAMPresentation.htm">Tài liệu IP</a></p>
            <p style="text-align: left;">Phần mềm chia địa chỉ: <a href="/download/DivIP.rar"> DivIP.rar </a></p>
            
          </div>
      </div>
    </div>
 <div id="menu1" style="top: 220px; left: -585px;">
    	<div id="menu_div1"><img src="img/cauhoi.png" alt="" style=" /* border: 2px solid #3c95d9; */"/>
        	<!-- Pages Fan -->
            <div id="question">
            <section>
                <br />
                <label style=" color: black;">Chú ý : Bạn hãy nhập đầy đử thông tin</label>
                <br />
                <br />
                <p><input type="text" id="name" class="txt" tabindex="1" maxlength="50" placeholder="Tên bạn" required></p>
                <p><textarea id="msg" class="txtarea" tabindex="4" placeholder="Câu hỏi" required></textarea></p>
                <p style="text-align: center;"><button id="send" style="line-height: 20px;"> Gửi </button> </p>
            </section>
          </div>
      </div>
  </div>
</div>

<div id="tables" style="/* overflow: auto; */ padding-top: 1px;">
<table class="zebra-style" id="dtable">
    <thead>
        <tr>
        <th scope="col">STT</th>
        <th scope="col" style="width: 250px; text-align: center;">Họ tên</th>
        <th scope="col" style="width: 650px; text-align: center;">Câu hỏi</th>
        <th scope="col" style="width: 100px; text-align: center;">Trả lời</th>
        </tr>
    </thead>
<tbody id="viewdata" style="color: black;"  >

<?php //if(isset($show)) echo $show ?>

</tbody>
</table>
</div>

</section>
<div id="popup2" class="modal-box">
  <div id="print" class="modal-body">
    </div>
  <div><button class="btn btn-small js-modal-close" style="margin-bottom: 20px;">Close</button>
  </div>
</div>
<div id="popup1" class="modal-box">
  <div id="infos" class="modal-body">
    </div>
  <div><button class="btn btn-small js-modal-close" style="margin-bottom: 20px;">Close</button>
  </div>
</div>


<?php 

//mysqli_free_result($con);
//mysqli_close($db);
?>


</body>
</html>