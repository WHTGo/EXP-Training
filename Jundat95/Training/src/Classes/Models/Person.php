<?php
/**
 * Created by PhpStorm.
 * User: Jundat95
 * Date: 12/24/2015
 * Time: 11:00 AM
 */
namespace Acme\Classes\Models;
class Person
{
    public $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
}
