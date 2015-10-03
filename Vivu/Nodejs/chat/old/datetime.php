<?php

/**
 * @author easyvn.net
 * @copyright 2015
 */

include('config.inc.php');
include('ConDatabase.php');
$result=mysqli_query($con, ' SELECT DATE_ADD(now(),INTERVAL 1 YEAR) AS date;');
while ($row=mysqli_fetch_array($result))
        {
            $date=$row["date"];
        }
echo $date;
mysqli_close($con);


?>