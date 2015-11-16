<?php
/**
 * Created by PhpStorm.
 * User: ngodo
 * Date: 16/11/2015
 * Time: 3:53 PM
 */
class DongVat
{
    // thuoc tinh
    var $ten;
    var $loai;
    var $thucan;
    // phuong thuc

    function setName($_ten)
    {
        $this->ten  = $_ten;
    }
    function getName()
    {
        echo "Ten: ".$this->ten;
    }
}

$dog = new DongVat();
$dog->setName("Dog");
$dog->loai = "Dog Family";
$dog->thucan = "Xuong";
echo $dog->getName();
echo "<br>".$dog->loai;
echo "<br>".$dog->thucan;

?>