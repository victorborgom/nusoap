<?php
	require_once './lib/nusoap.php';

	$soap = new soap_server;
	$soap->configureWSDL('AddService', 'http://2daw01.cesnuria.com/nusoap/ex1/');
	$soap->wsdl->schemaTargetNamespace = 'http://2daw01.cesnuria.com/nusoap/ex1/';
	$soap->register('Sum', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), 'http://2daw01.cesnuria.com/nusoap/ex1/');
	$soap->register('Res', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), 'http://2daw01.cesnuria.com/nusoap/ex1/');
        $soap->register('Mul', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), 'http://2daw01.cesnuria.com/nusoap/ex1/');
	$soap->register('Div', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), 'http://2daw01.cesnuria.com/nusoap/ex1/');
        $soap->service(isset($HTTP_RAW_POST_DATA) ?$HTTP_RAW_POST_DATA : '');

function Sum($a, $b){
	return $a + $b;
}

function Res($a, $b){
	return $a - $b;
}

function Mul($a, $b){
	return $a * $b;
}

function Div($a, $b){
	return $a / $b;
}


?>

