<?php

class Helper{
	public static function validateSoapData(array $soapData)
	{
		if(empty($soapData['ListByName']) || empty($soapData['ListByName']['SQL']))
			return false;
		return true;
	}

	public static function checkIfStartsWith_A(string $string) {
		if (strtolower(substr($string, 0, 1)) === 'a')
			return true;
		return false;
	}
}