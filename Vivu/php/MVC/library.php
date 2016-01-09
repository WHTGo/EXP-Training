<?php
function getpost($var)
{
    return isset($_POST[$var])? $_POST[$var] : null;
}

function getcookie($var)
{
    return isset($_COOKIE[$var])? $_COOKIE[$var] : null;
}

function getget($var)
{
    return isset($_GET[$var])? $_GET[$var] : null;
}

?>