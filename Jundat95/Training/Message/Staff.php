<?php
/**
 * Created by PhpStorm.
 * User: Jundat95
 * Date: 12/24/2015
 * Time: 11:02 AM
 */
namespace Message;
class Staff
{
    public $menbers = [];
    public function __construct($members = [])
    {
        $this->menbers = $members;
    }

    public function add(Person $person)
    {
        $this->menbers[] = $person;
    }
    public function getMember()
    {
        return $this->menbers;
    }
}