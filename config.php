<?php
require 'environment.php';


global $config;
$config = array();
if(ENVIRONMENT == "development"){
	$config['dbname'] = 'quantumsystem';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
}else{
	$config['dbname'] = 'quantumsystem';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
}
?>