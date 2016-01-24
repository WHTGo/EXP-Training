<?php
/**
 * Created by PhpStorm.
 * User: Jundat95
 * Date: 12/28/2015
 * Time: 9:03 AM
 */
require_once 'Dog.php';
require_once 'Cat.php';
require_once 'Panda.php';

echo (new \DecoratorPattern\Dog(new \DecoratorPattern\Cat(new \DecoratorPattern\Panda())))->getCore();