<?php
/*
Plugin Name: SendMail Plugin
Plugin URI: http://jundat95.blogspot.com
Description: Developer by Jundat95
Author: Jundat95
Author URI: http://jundat95.blogspot.com
Version: 1.0
 */
global $wp_version;
if(version_compare($wp_version,'4.4','<'))
{
    exit('Version not require,you must update version >= 4.4');
}

function sendMail()
{
    $email = $_POST['email'];
    $name  =$_POST['author'];
    $message = "Hello :$name";
    wp_mail($email,'The message',$message);

}

add_action('comment_post','sendMail');

?>