<?php
/**
 * Created by PhpStorm.
 * User: Jundat95
 * Date: 12/30/2015
 * Time: 9:20 AM
 */

namespace StrategyPattern;


class LogValidate implements Logger
{
    public function log($data)
    {
        print('You go to LogValidate: '.$data);
    }

}