<?php
/**
 * Created by PhpStorm.
 * User: ngodo
 * Date: 16/11/2015
 * Time: 4:16 PM
 */
    class Animal
    {
        var $name; // public
        protected $kind; // protect
        private $weight; // private

        function getWeight()
        {
            return $this->weight;
        }
        function setWeight($_weight)
        {
            $this->weight = $_weight;
        }
    }

    class Dog extends Animal
    {
        var $height;

        function  Dog($name,$kind,$weight,$height)
        {
            $this->height = $height;
            $this->name = $name;
            $this->kind = $kind;
            $this->setWeight($weight);
        }

        function getKind()
        {
            return $this->kind;
        }

        function show()
        {
            echo $this->name."<br>";
            echo $this->kind."<br>";
            echo $this->getWeight()."<br>";
            echo $this->height."<br>";
        }
    }

    $dog = new Dog("Dog","Dog Family",20,1);
    echo $dog->name."<br>";
    echo $dog->getKind()."<br>";
    echo $dog->getWeight()."<br>";
    echo $dog->height."<br>";
    echo $dog->show();

?>