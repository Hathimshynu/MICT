<?php 
	
	include_once 'tron-api-master/vendor/autoload.php';

	try {
		$tron = new \IEXBase\TronAPI\Tron();

		$generateAddress = $tron->generateAddress(); // or createAddress()
		$isValid = $tron->isAddress($generateAddress->getAddress());


		echo 'Address hex: '. $generateAddress->getAddress()."<br>";
		echo 'Address base58: '. $generateAddress->getAddress(true)."<br>";
		echo 'Private key: '. $generateAddress->getPrivateKey()."<br>";
		echo 'Public key: '. $generateAddress->getPublicKey()."<br>";
		echo 'Is Validate: '. $isValid;

		echo 'Raw data: '.json_encode($generateAddress->getRawData());

	} catch (\IEXBase\TronAPI\Exception\TronException $e) {
		echo $e->getMessage();
	}
