<?php
/**
 * Created by PhpStorm.
 * User: Jundat95
 * Date: 12/25/2015
 * Time: 4:45 PM
 */
namespace Inte;
class LogToDB implements Logger
{
    public function excute($message)
    {
       var_dump("THIS IS DB :".$message);
    }
}