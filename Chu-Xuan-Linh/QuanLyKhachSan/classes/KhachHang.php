<?php

/**
 * Created by PhpStorm.
 * User: chuli
 * Date: 19/10/2015
 * Time: 1:17 CH
 */
class KhachHang
{
    var $hoTen = "";
    var $tuoi;

    public function nhapKhachHang($ten, $tuoi){
        $this->hoTen = $ten;
        $this->tuoi = $tuoi;
    }
    public function save()
    {
        $servername = "localhost";
        $username = "root";
        $password ="";
        try {
            $conn = new PDO("mysql:host = $servername;dbname=quanlykhachhang", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch (PDOException $e)
        {
            echo "K?t n?i th?t b?i : " . $e->getMessage();
        }

        $conn->query("INSERT INTO `QuanLyKhachHang`.`khachhang` (`id`, `ten`, `tuoi`) VALUES (NULL, '".$this->hoTen."', '".$this->tuoi."')");
        return $conn;
    }

    public function xuatTT()
    {
        $servername = "localhost";
        $username = "root";
        $password ="";
        try {
            $conn = new PDO("mysql:host = $servername;dbname=quanlykhachhang", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch (PDOException $e)
        {
            echo "K?t n?i th?t b?i : " . $e->getMessage();
        }
        $re = $conn->query("SELECT * FROM `khachhang`");

        return $re->fetchAll();
    }
}