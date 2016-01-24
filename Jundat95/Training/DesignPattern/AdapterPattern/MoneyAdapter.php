<?php

namespace AdapterPattern;

class MoneyAdapter implements paymentAdapter
{
    protected  $moneyBooker;
    public function __construct(MoneyBooker $moneyBooker)
    {
          $this->moneyBooker = $moneyBooker;
    }

    public function pay($amount)
    {
        $this->moneyBooker->doPay($amount);
    }

}