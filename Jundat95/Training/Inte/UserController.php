<?php
/**
 * Created by PhpStorm.
 * User: Jundat95
 * Date: 12/25/2015
 * Time: 4:56 PM
 */
namespace Inte;
class UserController
{
    public $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function show()
    {
        $log = 'Doan Tinh';
        $this->logger->excute($log);
    }
}