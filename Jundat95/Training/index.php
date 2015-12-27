<?php
/**
 * Created by PhpStorm.
 * User: Jundat95
 * Date: 12/24/2015
 * Time: 3:57 PM
 */
require 'vendor/autoload.php';
//$test = new Acme\Classes\Models\Foo();
//$person = new Message\Person('Doan Tinh');
//$staff = new Message\Staff([$person]);
//$business = new Message\Business($staff);


//var_dump(Sta\Math::add(1,2,3,4,5,6));
//$sta = new Sta\Math();
//$sta->addIndex();
//var_dump($sta::$index);
//var_dump($sta::id);

//$user = new \Inte\UserController(new \Inte\LogToDB());
//$user->show();

$registerUser = new Review\RegisterUser();
$registerUserController = new Review\RegisterUserController($registerUser);
$registerUserController->register();

print("Sussec!!");
