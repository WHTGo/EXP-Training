<?php
namespace StrategyPattern;

class App
{
    public $logger;
    public function log($data,Logger $logger)
    {
        $this->logger = $logger;
        $this->logger->log($data);
    }
}