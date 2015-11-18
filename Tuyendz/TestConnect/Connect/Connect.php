<?php


 $mysqli = new mysqli("localhost","root","","quanlybanhanggg");
 if($mysqli->connect_error)
 {
     echo "Khong the ket noi toi MYSQL: (".$mysqli->connect_error.")".$mysqli->connect_error;
 }
//echo $mysqli->host_info ."\n";

$res = $mysqli->query("SELECT * FROM quanlybanhanggg.categories;");

echo "<table>";

while($data = $res->fetch_array())
{
    echo '<tr><th>';
    echo $data['id'].'</th><th>'.$data['TenK'].'</th><th>'.$data['DiaChi'];
    echo '</th></tr>';

}
var_dump($mysqli);
echo '</table>';
$mysqli->close();
?>