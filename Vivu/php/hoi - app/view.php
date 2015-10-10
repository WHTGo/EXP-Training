<?php
// IT-Team
$stt=$_REQUEST["stt"];
$db=mysqli_connect("localhost","root","","DB_thaoluan");
$ole=mysqli_query($db,"SELECT * FROM view WHERE stt_old=$stt");
if(!mysqli_num_rows($ole)){
    $conn=mysqli_query($db,"SELECT * FROM quest WHERE stt=$stt");
    $data=array();
    if(mysqli_num_rows($conn)){
        while ($row=mysqli_fetch_array($conn,MYSQLI_NUM)){
              $data=$row;
        }
        $con=mysqli_query($db,"INSERT INTO view(stt_old,name,question,ch) VALUES($data[0],'$data[1]','$data[2]','n')");
        if ($con){ echo "o"; } else { echo "Lỗi insert"; }
    }else{ echo "Lỗi kết truy vấn!"; }
    mysqli_free_result($conn);
}else{ echo 'Câu hỏi đã view!';}

mysqli_free_result($ole);
mysqli_close($db);

?>