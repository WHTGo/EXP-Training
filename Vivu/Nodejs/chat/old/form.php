<?php
session_start();
include ('config.inc.php');
include ('ConDatabase.php');
function rd(){
    $t0=rand(0,9);
    $t1=rand(1,9);
    $t2=rand(0,9);
    $t3=rand(0,9);
    $t4=rand(0,9);
    $t5=rand(0,9);
    $t6=rand(0,9);
    $t7=rand(0,9);

    $userID=($t0+(10000000*$t1)+(1000000*$t2)+(100000*$t3)+(10000*$t4)+(1000*$t5)+(100*$t6)+(10*$t7));
    return $userID;
}
if(isset($_POST['ok']))
{
	if($_POST['txtCaptcha'] == NULL)
	{
		echo "hãy nh?p mã b?o m?t!";
	}
	else
	{
		if($_POST['txtCaptcha'] == $_SESSION['security_code'])
		{
            $captcha=rd();
            mysqli_query($con,"INSERT INTO security(captcha,date) VALUES($capcha,now());");
            setcookie("captcha",$captcha,time() + 3600);
            echo " Ðang kí dung th? thành công! </br>
            Hãy b?t d?u nào.";           
		}
		else
		{
			echo "Mã b?o m?t không dúng!";
		}
	}
}




?>
