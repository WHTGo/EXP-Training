<?php
/**
 * Created by PhpStorm.
 * User: ngodo
 * Date: 15/11/2015
 * Time: 11:40 PM
 */
    $a =5;
    $b=6;
     date_default_timezone_set("America/New_York");
     echo date("d.m.y")."<br>";
     echo "The time is " . date("h:i:sa")."<br>";
     $d=strtotime("10:30pm April 15 2014");
     echo "Created date is " . date("Y-m-d h:i:sa", $d);


?>