<?php

namespace AdapterPattern;

class MoneyBooker
{
    public function __construct(){}

    public function doPay($amout)
    {
        echo 'Paying vida Money Booker: '.$amout;
    }

}