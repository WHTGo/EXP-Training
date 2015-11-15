<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 14/11/2015
 * Time: 15:49
 */

function familyname($fname)
{
    echo "$fname Hello!!<br>";
};

function conghaiso($a,$b)
{
    echo "Ket qua:".($a+$b)."<br>";
};

$arr = array("Tinh","Tu","Linh");
$arr1 = array("Tinh"=>"35","Tu"=>"20","Linh"=>"40");
echo "Tinh tuoi: ".$arr1['Tinh']."<br>";

familyname("Tinh");
familyname("Hanh");
familyname("Tu");

conghaiso(5,6);

for($i =0 ; $i < count($arr); $i++)
{
    echo "Ten: ".$arr[$i]."<br>";
}

foreach($arr1 as $x => $x_value)
{
    echo "Key = ".$x." Value = ".$x_value."<br>";
}

?>