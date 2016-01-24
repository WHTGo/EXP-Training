<?php

function register_custom_shortcode()
{
    // Var global
    global $reg_err;
    $reg_err = new WP_Error;

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
            border: 2px;
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
            <button id="loginBtn" onclick="FBlogin()">Facebook Login</button>
        </form>
    ';
}

function register_validate($username,$password,$email)
{
    global $reg_err;

    if(empty($username) || empty($email) || empty($password))
    {
        $reg_err->add('field','Required from field is missing');
    }
    // Kiem tra username
    if(strlen($username) < 4)
    {
        $reg_err->add('username_lenght','Username too short. At least 4 characters is required');
    }
    if(username_exists($username))
    {
        $reg_err->add('username_exists','Sorry, that username already exists');
    }
    // Kiem tra mat khau
    if(strlen($password) < 5 )
    {
        $reg_err->add('pass_lenght','Username too short. At least 5 characters is required');
    }
    // Kiem tra email
    if(email_exists($email))
    {
        $reg_err->add('email_exists','Sorry, That mail already exists');
    }
    if(!is_email($email))
    {
        $reg_err->add('email_invalid','Email not invalid');
    }
    // Hien thi loi ra man hinh
    if(is_wp_error($reg_err))
    {
        echo '<div style="color: #dc2618">';
        echo '<STRONG>ERRO</STRONG>';
        echo '</div>';
        foreach($reg_err->get_error_messages() as $err)
        {
            echo '<div style="color: #dc2618">';
            echo '<italic>'.$err.'</italic>';
            echo '</div>';
        }
    }
}

function register_complete()
{
    global $username,$email,$password,$reg_err;
    if(count($reg_err -> get_error_messages()) < 1)
    {
        $userdata = array(
            'user_login'=>$username,
            'user_pass'=>$password,
            'user_email'=>$email,

        );
        $user = wp_create_user($username,$password,$email);
        echo ' Register Complete. Goto: <a href=" '.get_site_url().'/wp-login.php">Login Page</a> ';
    }



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
    global $username,$password,$email,$reg_err;
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