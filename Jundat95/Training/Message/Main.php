<?php
/**
 * Created by PhpStorm.
 * User: Jundat95
 * Date: 12/24/2015
 * Time: 10:05 AM
 */

require 'Person.php';
require 'Business.php';
require 'Staff.php';

$person = new Person('Doan Tinh');
$staff = new Staff([$person]);
$business = new Business($staff);
$business->hire(new Person('Ngo Tinh'));
print_r($business->getStaffMember());