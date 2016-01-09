<?php

/*
Plugin Name:Custom post type book
Plugin URI: http://jundat95.blogspot.com
Author:Ngo Doan Tinh
Author URI: http://google.com
Description: Custom post book
Version:1.1
*/

add_action('init','create_custom_post_type_book');
function create_custom_post_type_book()
{
    register_post_type(
        'acme_book',
        array(
        'labels'=>array
        (
            'name'=> 'Book',
            'singular_name'=>'book'
        ),
        'public'=> true,
        'has_archive'=>false,
        ));
}