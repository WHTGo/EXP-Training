<?php

/**
 * User: nguyen
 * Date: 9/21/2015
 * Time: 2:03 PM
 */
class Queue
{
    var $queue;

    public function add($state)
    {
        $this->queue[] = $state;

    }

}