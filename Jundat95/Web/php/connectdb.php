<?php
/**
 * Created by PhpStorm.
 * User: ngodo
 * Date: 16/11/2015
 * Time: 5:01 PM
 */
    mysql_connect("localhost","root","");
    mysql_select_db("services");
    $query = "select *from users";
    $result = mysql_query($query);

    echo "<ul>";
    while($rows = mysql_fetch_array($result))
    {
        echo "<li><strong>$rows[0]-$rows[1]-$rows[2]</strong></li>"."<br>";
    }
    echo "</ul>";

?>