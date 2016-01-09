<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15/11/2015
 * Time: 17:17
 */
$arr = array
(
    array("Tinh",20,173),
    array("Hanh",19,160),
    array("Linh",24,185)
);

for($row = 0; $row < 3; $row++)
{
    echo "<p>Number row: $row</p>";

    echo "<ul>";
    for($col = 0; $col < 3; $col++)
    {
        echo "<li>".$arr[$row][$col]."</li>";
    }
    echo "</ul>";
}

?>