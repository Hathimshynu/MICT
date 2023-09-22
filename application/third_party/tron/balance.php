<?php
	include_once 'tron-api-master/vendor/autoload.php';

	$fullNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
	$solidityNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
	$eventServer = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');

	try {
		$tron = new \IEXBase\TronAPI\Tron($fullNode, $solidityNode, $eventServer);
	} catch (\IEXBase\TronAPI\Exception\TronException $e) {
		exit($e->getMessage());
	}


	$tron->setAddress('THDBok5PYZazjRYqkFFVcgZNQMKE4NXNEF');
	$balance = $tron->getBalance(null, true);
	
	echo "Balance: ".$balance;