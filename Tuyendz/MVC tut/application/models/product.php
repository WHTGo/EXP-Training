<?php
/**
 * Created by PhpStorm.
 * User: TuyenGa
 * Date: 11/17/2015
 * Time: 8:40 AM
 */
class Product extends VanillaModel
{
    var $hasOne = array('Category'=>'Category');
    var $hasManyAndBelongsToMany=array('Tags'=>'Tags');
}
