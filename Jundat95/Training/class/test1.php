<?php
/**
 * Created by PhpStorm.
 * User: Jundat95
 * Date: 12/24/2015
 * Time: 8:18 AM
 */
class Task
{
    public $des ;
    public $com = false;

    public function __construct($des)
    {
        $this->des = $des;
    }

    public function com()
    {
        $this->com = true;
    }
}

$task1 = new Task('Ngo Doan Tinh');
$task1->com();
var_dump($task1->com);