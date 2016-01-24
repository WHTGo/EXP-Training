<?php
namespace StrategyPattern;

class LogFile implements Logger
{
    public function log($data)
    {
        print('You go to LogFile: '.$data);
    }

}