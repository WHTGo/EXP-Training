<?php
/*
Plugin Name: Demo Register
Author: Jundat95
Description: Plugin Demo Register by Jundat95
*/


function scripts_login_fb()
{
   // Deregister the included library
   wp_deregister_script( 'jquery' );

    // Register the library again from Google's CDN
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js', array(), null, false );

    // Register the script like this for a plugin:
    wp_register_script( 'custom-script', plugins_url( '/js/fb-login.js', __FILE__ ), array( 'jquery' ) );
    // or
    // Register the script like this for a theme:
    wp_register_script( 'custom-script', get_template_directory_uri() . '/js/fb-login.js', array( 'jquery' ) );

    // For either a plugin or a theme, you can then enqueue the script:
    wp_enqueue_script( 'custom-script' );

    // Localhost admin-ajax
    wp_localize_script( 'frontend-ajax', 'frontendajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));


}
add_action( 'wp_enqueue_scripts', 'scripts_login_fb' );

// Add shortcode vao wp
add_shortcode('demoregister','demoregister');

function demoregister()
{
    echo'
            <button id="loginBtn" onclick="FBlogin()">Facebook Login</button>
            <div id="response"></div>
    ';
}

add_action('wp_ajax_fblogin','getUser');
add_action('wp_ajax_nopriv_fblogin','getUser');
function getUser(){

    $email = isset($_POST['email']) ? $_POST['email'] : null;
    var_dump($email);
}

?>