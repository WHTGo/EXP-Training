<?php
/**
 * Created by PhpStorm.
 * User: Jundat95
 * Date: 12/24/2015
 * Time: 8:41 AM
 */
class Task1
{
    private $age;
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        if($age <= 20)
        {
            throw new Exception('Tuoi nhap vao phai > 20.');
        }
        $this->age = $age;
    }
}


$task1 = new Task1('Doan Tinh');
$task1->setAge(30);
var_dump($task1->getAge());