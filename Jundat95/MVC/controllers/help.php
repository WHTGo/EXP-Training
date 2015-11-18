<?php
/**
 * Created by PhpStorm.
 * User: ngodo
 * Date: 16/11/2015
 * Time: 11:51 PM
 */
class Help extends  Controller
{
    public function __construct()
    {
        parent::__construct();
        echo "<br> I can help you! ";
    }
    public function Other($arg = false)
    {
        echo "<br> Controller Other.";
        echo "<br> Option choose: $arg";

        require 'models/help_model.php';
        $model = new Help_Model();
    }
}