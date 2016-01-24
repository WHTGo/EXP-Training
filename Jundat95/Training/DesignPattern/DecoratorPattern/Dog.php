<?php
/**
 * Created by PhpStorm.
 * User: Jundat95
 * Date: 12/28/2015
 * Time: 8:49 AM
 */
namespace DecoratorPattern;
require_once 'Animal.php';
class Dog implements Animal
{
    protected $animal;

    public function __construct(Animal $animal)
    {
        $this->animal = $animal;
    }

    public function getCore()
    {
        return (30 + $this->animal->getCore());
    }

}