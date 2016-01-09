<?php
/**
 * Created by PhpStorm.
 * User: Jundat95
 * Date: 12/24/2015
 * Time: 9:24 AM
 */

abstract class Animal
{
    protected $name;

    abstract public function setName($name);

    public function getName()
    {
        return $this->name;
    }
}

class Dog extends Animal
{
    public $age = 5;

    public function getAge()
    {
        return $this->age;
    }

    // Override lai function Abstract cua class Animal
    public function setName($name)
    {
        $this->name = $name;
    }
}

$dog = new Dog();
$dog ->setName('Dog Family');
echo $dog->getName();
var_dump($dog);