<?php
/**
 * Created by PhpStorm.
 * User: Jundat95
 * Date: 12/30/2015
 * Time: 9:18 AM
 */

namespace StrategyPattern;


class LogDatabase implements Logger
{
    public function log($data)
    {
        print('You go to LogDatabase: '.$data);
    }

}