<?php


require 'config/config.php';

if (ENVIRONMENT == 'production'){
	error_reporting(0); ini_set('display_errors', 0);
}

spl_autoload_register(function ($class_name)
{
    include $class_name . '.php';
});


$myObj = new DataParserFromSoap(WSDL_URL);
if ($myObj->soapDemoStatus['status'] == 'success')
	$myObj->getDataByName(WSDL_FUNCTION_NAME)->parseDataToHTML();
else
	throw new Exception('Something went wrong: '.$myObj->soapDemoStatus['message']);
