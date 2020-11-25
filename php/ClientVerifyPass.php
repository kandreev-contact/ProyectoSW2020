<?php
require_once('../lib/nusoap.php');
require_once('../lib/class.wsdlcache.php');

$soapclient = new nusoap_client('VerifyPassWS.php?wsdl',true);
$ticket='1010';
$result = $soapclient->call('ComprobarPass', array('x'=>$_GET["Pass"],'y'=>1010));
if ($result == 'VALIDA'){
	echo 'VALIDA';
} else if ($result == 'INVALIDA') {
	echo 'INVALIDA';
} else {
	echo 'SIN SERVICIO';
}

?>
