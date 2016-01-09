<?php
// IT-Team:vivu
 $name=$_REQUEST["name"];
 $msg=$_REQUEST["msg"];
 $id=$_REQUEST['id'];
 
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'db_thaoluan';
$con=mysqli_connect($host, $user, $pass,$db)or die ('Không the ket noi toi database');

$result=mysqli_query($con,"INSERT INTO quest(name,question,id) VALUE ('$name','$msg',$id)");

if(!$result){
    echo("Lỗi kết nối tới cõ sở dữ liệu!");
}else{
    echo(" Gửi thành công.");
}

//mysqli_free_result($result);
mysqli_close($con);
?>