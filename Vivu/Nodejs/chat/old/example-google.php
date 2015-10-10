<?php
# Logging in with Google accounts requires setting special identity, so this example shows how to do it.
require 'openid.php';
try {
    # Change 'localhost' to your domain name.
    $openid = new LightOpenID('localhost');
    $openid->required = array(
        'namePerson/first',
        'namePerson/last',
        'contact/email');
    
       
    //$openid->returnUrl = HOME_PATH;
    $openid->identity = 'https://www.google.com/accounts/o8/id';
    header('Location: ' . $openid->authUrl());
    if($openid->mode == 'cancel') {
        echo 'User has canceled authentication!';
    } else {
        $data =$openid->getAttributes();
        $email =$data['contact/email'];
        $first =$data['namePerson/first'];
        $last =$data['namePerson/last'];
    }
} catch(ErrorException $e) {
    echo $e->getMessage();
}

include ('config.inc.php');
include ('ConDatabase.php');
echo $openid->identity;


?>
