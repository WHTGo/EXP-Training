<?php
/**
 * Created by PhpStorm.
 * User: Jundat95
 * Date: 12/24/2015
 * Time: 11:02 AM
 */
namespace Message;
class Business
{
    public $staff;
    public function __construct(Staff $staff)
    {
        $this->staff = $staff;
    }
    public function hire(Person $person)
    {
        $this->staff->add($person);
    }
    public function getStaffMember()
    {
        return $this->staff->menbers;
    }

}