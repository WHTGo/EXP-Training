<?php
// IT-Team:vivu
//$id=$_REQUEST['id'];
$db=mysqli_connect("localhost","root","","DB_thaoluan");
/*$view=mysqli_query($db,"slect view_q from id where id=$id and ok like 'n'");
if ($view){
    while ($row=mysqli_fetch_array($view)){
        $datav=$row['view_q'];
    }
    echo 'y '+$datav;
}else{
    
    
}
*/
$query="SELECT stt FROM awso";
$con=mysqli_query($db,$query);
$data=array();
if(mysqli_num_rows($con)){
    while ($row=mysqli_fetch_array($con,MYSQLI_NUM)){
          $data[]=$row;
    }
    echo json_encode($data);
}else{
    echo "n";
}
mysqli_free_result($con);
mysqli_close($db);
?>
