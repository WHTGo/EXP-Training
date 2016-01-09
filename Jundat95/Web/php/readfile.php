<?php
/**
 * Created by PhpStorm.
 * User: ngodo
 * Date: 16/11/2015
 * Time: 12:10 AM
 */
    // ??c t?p tin
    //echo readfile("../text/test.txt");
    // m? ??c s?a t?p tin trên máy ch?

    $file = fopen("../text/test.txt","r")or die("Không t?n t?i ???ng d?n.");
//     ??c c? m?ng text
//    echo fread($file,filesize("../text/test.txt"));
//  ??c t?ng dòng
    while(!feof($file))
    {
        echo fgets($file)."<br>";
    }

    fclose($file);

?>