<?php
/*
Plugin Name: Register by Jundat95
Author: Jundat95
Description: Plugin dang nhap Wordpress
*/

//Hien thi form nhap de dang ky
add_shortcode('register','register_custom_shortcode');
add_action('user_register','register_custom_shortcode');
//add_action('init','handleWP');

function register_custom_shortcode()
{
    ob_start();
    custom_register();
    return ob_get_clean();
}

function register_form($username,$password,$email)
{
    echo '
        <style>
        div {
            margin-bottom:2px;
        }

        input{
            margin-bottom:4px;
        }
        </style>
    ';

    echo '
        <form action="' .$_SERVER['REQUEST_URI']. '" method="post" >
            <div>
                <label for="username">Username </label>
                <input type="text" name="username" value="'.( isset($_POST['username'])? $username : null ).'">
            </div>
            <div>
                <label for="password">Password </label>
                <input type="text" name="password" value="'.(isset($_POST['password'])? $password : null ).'" >
            </div>
            <div>
                <label for="email">Email </label>
                <input type="text" name="email" value="'.(isset($_POST['email'])? $email : null ).'" >
            </div>
            <input type="submit" name="submit" value="Register" />
        </form>
    ';
}

function register_validate($username,$email,$password)
{
    global $reg_err;
    $reg_err = new WP_Error;
    if(empty($username) || empty($email) || empty($password))
    {
        $reg_err->add('field','Required from field is missing.');
    }
    if(is_wp_error($reg_err))
    {
        foreach($reg_err->get_error_messages() as $err)
        {
            echo '<div style="color: #dc3232">';
            echo '<STRONG>ERRO</STRONG>';
            echo '<span><br/>'.$err.'<br/></span>';
            echo '</div>';
        }
    }
}

function register_complete()
{
    global $username,$email,$password;

        $userdata = array(
            'user_login'=>$username,
            'user_pass'=>$password,
            'user_email'=>$email,

        );
        $user = wp_create_user($username,$password,$email);
        //echo ' Register Complete. Goto: <a href=" '.get_site_url().'/wp-login.php">Login Page</a> ';


}

function custom_register()
{
    // Validate du lieu nhap vao
    if(isset($_POST['submit']))
    {
        register_validate(
            $_POST['username'],
            $_POST['password'],
            $_POST['email']
        );
    }

    // Xu ly du lieu truoc khi nhap vao
    global $username,$password,$email;
    $username = sanitize_user($_POST['username']);
    $password = esc_attr($_POST['password']);
    $email = sanitize_email($_POST['email']);

    // Xu ly dang ky
    register_complete(
        $username,
        $password,
        $email
    );

    // Hien thi form dang ky
    register_form(
        $username,
        $password,
        $email
    );

}