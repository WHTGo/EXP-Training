<?php
/**
 * Created by PhpStorm.
 * User: Jundat95
 * Date: 12/28/2015
 * Time: 9:02 AM
 */
namespace DecoratorPattern;
require_once 'Animal.php';
class Panda implements Animal
{
    public function getCore()
    {
        return 10;
    }
}