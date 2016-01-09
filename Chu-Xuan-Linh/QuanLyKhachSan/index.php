<?php
    require_once "classes/db_conect.php";
    include "templates/Head.php"
?>

<?php
/*
$task = $_GET['task'];
if($task  == "them"){
    $hoten = $_GET['ten'];
    $tuoi = $_GET['tuoi'];
    $kh = new KhachHang();
    $kh->nhapKhachHang($hoten,$tuoi);
    $re = $kh->save();
    //var_dump($kh);
    if($re)
    {
        echo "Thêm thành công";
    }

}else if($task == "hiendanhsach"){
    echo "Danh sách khách hàng";
    $kh = new KhachHang();
    $ds = $kh->xuatTT();
    include "templates/danhsachkh.php";
}
*/
?>
<?php
    include "templates/khachhang.php";
?>

<?php
    include "templates/Footer.php";
?>