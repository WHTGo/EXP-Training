<?php

/**
 * Created by PhpStorm.
 * User: TuyenGa
 * Date: 11/17/2015
 * Time: 9:11 AM
 */
class Category extends VanillaModel
{
    var $hasMany = array('Product'=>'Product');
    var $hasOne = array('Parent'=>'Catagory');
}