<?php
namespace AdapterPattern;

class PayPal
{
    public function  __construct()
    {

    }

    public function sendPayment($amount)
    {
        echo 'Paying vida PayPal: '.$amount;
    }

}