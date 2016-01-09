<?php
/*
Plugin Name: Plugin BadWord
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

function bad_word($content)
{
    $bad_word = array('cho','me','fuka');
    return str_ireplace($bad_word,'***',$content);
}
add_filter('the_content','bad_word');
?>
