<?php
/*
Plugin Name: Test
Author: Jundat95
Description: Plugin dang nhap Wordpress
*/
add_action('init','function_test');
function function_test()
{
    wp_update_user(
        array(
            'ID'          =>    '2',
            'nickname'    =>    'gjundat'
        )
    );
    echo 'Them thanh cong.';
}
