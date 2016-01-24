<?php
/*
Plugin Name: WpRegister Demo
Plugin URI: http://jundat95.blogspot.com
Author: Jundat95
Description: Phan mem WpRegister
Version: 1.0
*/

// Processing GetUserData and Add JS
function add_ajax_file(){
    wp_enqueue_script('my-ajax',plugins_url('/js/ajax.js',__FILE__),array('jquery'),true);
    wp_localize_script( 'my-ajax', 'my_ajax_url', array(
        'ajax_url' => admin_url( 'admin-ajax.php' )
    ));
}
add_action('wp_enqueue_scripts','add_ajax_file');
add_action('wp_ajax_my_ajax_function','my_ajax_function');
add_action('wp_ajax_nopriv_my_ajax_function','my_ajax_function');

function my_ajax_function(){
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    wpregister($fullname,$id,$email);

    //echo $email.'--'.$fullname.'--'.$id;
    wp_die();
}

// Processing form Login Facebook
function wpregister($fullname,$id,$email){

    if(username_exists($fullname) && email_exists($email)) {

        echo ' Register Complete.: <a href="'.get_site_url().'">Goto Home</a> ';
        // Get id user
        $user = get_user_by('login',$fullname);
        $user_id = $user->ID;
        // Auto Login
        wp_set_current_user($user_id, $fullname);
        wp_set_auth_cookie($user_id);
        do_action('wp_login', $fullname);

    }else{

        $user = wp_create_user($fullname,$id,$email);
    }

}

