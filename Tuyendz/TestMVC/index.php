<?php
// autoload


define('system', __DIR__.'/system');
require 'config/paths.php';
require 'config/config.php';

require 'db/database.php';

function __autoload($name)
{
	if(file_exists('librarys/'.$name.'.php'))
	{
		require 'librarys/'.$name.'.php';
	}
	if(file_exists('system/'.$name.'.php'))
	{
		require 'system/'.$name.'.php';
	}
}

$app = new Bootstrap();