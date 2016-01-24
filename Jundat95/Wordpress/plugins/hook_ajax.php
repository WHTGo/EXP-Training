<?php
/*
 * Plugin Name: Test hook ajax
 * Author: Jundat
 * Description: Free
 */
add_action('wp_ajax_my_ajax','my_ajax');

function my_ajax()
{
    comment_footer_die("chao the gioi");
}