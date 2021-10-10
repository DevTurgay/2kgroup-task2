<?php

// Static view blocks
// Names of static block files can be overwritten by editin this config
defined('STATIC_VIEW_BLOCKS') || define('STATIC_VIEW_BLOCKS',[
		'header'=>'blocks/header',
		'footer'=>'blocks/footer'
	]);

define('ENVIRONMENT','development');

define('WSDL_URL','https://www.crcind.com/csp/samples/SOAP.Demo.CLS?WSDL');
define('WSDL_FUNCTION_NAME','GetByName');