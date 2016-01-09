<?php
require_once "db_conect.php";
/**
 * Created by PhpStorm.
 * User: chuli
 * Date: 22/10/2015
 * Time: 7:13 SA
 */
$task = $_POST["task"];
$id = $_POST["id"];
$hoten = $_POST["hoTen"];
$diaChi = $_POST["diaChi"];
$SDT = $_POST["SDT"];
$CMTND = $_POST["CMTND"];
$ghiChu = $_POST["ghiChu"];
$connect = new db_connect();

if($task == "add")
{
    $sql = "INSERT INTO `quanlykhachsan`.`tblkhachhang` (`id`, `hoTen`, `diaChi`, `SDT`, `CMTND`, `ghiChu`) VALUES (NULL,' ".$hoten." ', ' ".$diaChi." ','".$SDT."','".$CMTND."','".$ghiChu."');";
}
if($task == "edit")
{
    $sql = "INSERT INTO `quanlykhachsan`.`tblkhachhang` (`id`, `hoTen`, `diaChi`, `SDT`, `CMTND`, `ghiChu`) VALUES (NULL,' ".$hoten." ', ' ".$diaChi." ','".$SDT."','".$CMTND."','".$ghiChu."');";
}
if($task == "trash")
{
    $sql = "DELETE FROM `quanlykhachsan`.`tblkhachhang` WHERE id =".$id;

}
$connect->query($sql);
header("location: http://localhost/Quanlykhachsan");