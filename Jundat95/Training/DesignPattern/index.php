<?php
/**
 * Created by PhpStorm.
 * User: Jundat95
 * Date: 12/29/2015
 * Time: 10:03 AM
 */
require 'vendor/autoload.php';

//AdapterPattern
$adapterPayPal = new AdapterPattern\PayPalAdapter(new \AdapterPattern\PayPal());
$adapterPayPal->pay(10);
$adapterMoney = new \AdapterPattern\MoneyAdapter(new \AdapterPattern\MoneyBooker());
$adapterMoney->pay(20);

//TemplatePattern
//$book = new \TemplatePattern\Book('Code Complete part 1','Ngo Doan Tinh');
//$ex1Template = new \TemplatePattern\TemplateEx1();
//$ex2Template = new \TemplatePattern\TemplateEx2();
//print_r($ex1Template->showBookTileInfo($book));
//print_r($ex2Template->showBookTileInfo($book));

//StrategyPattern
//$app = new \StrategyPattern\App();
//$app->log(11,new \StrategyPattern\LogDatabase());