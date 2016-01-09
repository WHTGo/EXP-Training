<?php
/*
Plugin Name: Metabox plugin
Author: Ngo Doan Tinh
Description: Meta box plugin
*/
add_action('add_meta_boxes','create_meta_box');
function create_meta_box()
{
    add_meta_box('book-info','Wordpress MetaBox Jundat95','book_out_put','post');
}

function book_out_put($post)
{
    $linkDowload = get_post_meta($post->ID,'-link-dowload',true);
    // T?o bi?n nonce b?o m?t
    wp_nonce_field('save_book','book_nonce');
    echo '<label for="link-dowload">Link Dowload: </label>';
    echo '<input type="text" id="link-dowload" name="link-dowload" value="'.$linkDowload.'">';
}

function book_post_save($post_id)
{
    $book_nonce = $_POST['book_nonce'];
    if(!isset($book_nonce))
    {
        return;
    }

    if(!wp_verify_nonce($book_nonce,'save_book'))
    {
        return;
    }

    $link_dowload = sanitize_text_field($_POST['link-dowload']);
    update_post_meta($post_id,'-link-dowload',$link_dowload);
}

add_action('save_post','book_post_save');