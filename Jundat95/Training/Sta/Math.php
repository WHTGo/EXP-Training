<?php
/**
 * Created by PhpStorm.
 * User: Jundat95
 * Date: 12/25/2015
 * Time: 3:53 PM
 */
namespace Sta;
class Math
{
    public static $index = 0;

    const id  = 0;// khong su dung private static vi tuong tu voi gia tri khong thay doi duoc.

    public function addIndex()
    {
        static::$index++;
    }

    public static function add(...$number)
    {
        return array_sum($number);
    }

}