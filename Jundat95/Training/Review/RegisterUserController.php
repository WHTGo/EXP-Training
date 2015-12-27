<?php
/**
 * Created by PhpStorm.
 * User: Jundat95
 * Date: 12/27/2015
 * Time: 8:57 PM
 */

namespace Review;
class RegisterUserController implements Register
{
    public $registerUser;
    public function __construct(RegisterUser $registerUser)
    {
        $this->registerUser = $registerUser;
    }

    public function register()
    {
        $this->registerUser->excute([] , $this);
    }

    public function userRegisterFiled()
    {
        var_dump("Register Filed !!");
    }

    public function userRegisterSucess()
    {
        var_dump("Register Sucess !!");
    }


}