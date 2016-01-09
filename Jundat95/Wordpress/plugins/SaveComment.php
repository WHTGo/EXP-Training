<?php
/*
Plugin Name: Save Comment
Plugin URI: http://jundat95.blogspot.com
Author: Jundat95
Author URI: http://jundat95.blogspot.com
Description: Phan mem luu tru comment vao file text
Version:1.0
 */
global $wp_version;
if(version_compare($wp_version,'4.4','<'))
{
    exit('Version not require, Youd must update version Wp >=4.4.');
}

function saveFile()
{
    $name = $_POST['author'];
    $email = $_POST['email'];
    $message = 'User '.$name.' send by email '.$email;
    $fp = fopen('wp-content/plugins/log.text',"w+");
    if(!$fp)
    {
        exit('Not Acsset file, create new file!!');
    }
    else
    {
        fwrite($fp,$message);
        fclose();
    }
}

add_action('comment_post','saveFile');

?>