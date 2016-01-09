<?php
/**
 * Created by PhpStorm.
 * User: Jundat95
 * Date: 12/27/2015
 * Time: 8:51 PM
 */
namespace Review;
class RegisterUser
{
    public function excute(array $data, $listener)
    {
        var_dump("Excute Register User.");
        $listener->userRegisterFiled();
    }
}