<?php 

	if(isset($_POST['amount']))
	{
		$tron_wallet_from_address = (string)$_POST['send_from'];
		$tron_wallet_to_address   = (string)$_POST['send_to'];
		$tron_private_key	 = (string)$_POST['key'];
		$amt 				 = number_format((float)$_POST['amount'], 6, '.', '');
		$amt				 = $amt;
		//print_r($_POST); exit();
		//echo $amt ;exit;
		include_once 'tron-api-master/vendor/autoload.php';

		$fullNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
		$solidityNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
		$eventServer = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
		
		try {
			$tron = new \IEXBase\TronAPI\Tron($fullNode, $solidityNode, $eventServer);
		} catch (\IEXBase\TronAPI\Exception\TronException $e) {
			exit($e->getMessage());
		}
		
		$tron->setAddress($tron_wallet_from_address);
		$balance = $tron->getBalance(null, true);
		if($balance >= $amt)
		{
			$tron->setPrivateKey($tron_private_key);
		
			try {
					//$transfer = $tron->send('TTtsXb8bRctXczogpvqNxKfJ5REgPzTwx2', $amt);
					//$transfer = $tron->send($tron_wallet_to_address, $amt);
					$tron->getTransactionBuilder()->sendTrx($tron_wallet_to_address, $amt,$tron_wallet_from_address);
				} catch (\IEXBase\TronAPI\Exception\TronException $e) {
					die($e->getMessage());
				}
							
			echo 'done'; 
		}else{
			echo 'done'; 
		}			
	
/*
// Tron API URL
$api_url = 'https://api.trongrid.io';

// Tron private key
$private_key = $tron_private_key;

// Recipient address
$to_address = $tron_wallet_to_address;

$from_address = $tron_wallet_from_address;

// Amount to send in TRX (1 TRX = 10^6 SUN)
$amount = 1000000;

// Create the raw transaction data
$raw_data = array(
  'to_address' => array('type' => 'address', 'value' => $to_address),
  'owner_address' => array('type' => 'address', 'value' => $from_address),
  'amount' => array('type' => 'int', 'value' => $amount),
);

// Create the transaction object
$transaction = array(
  'raw_data' => $raw_data,
  'txID' => bin2hex(openssl_random_pseudo_bytes(32)),
);

// Sign the transaction
$signature = sodium_crypto_sign_detached(json_encode($transaction), hex2bin($private_key));
$signed_transaction = array(
  'signature' => array('type' => 'signature', 'value' => bin2hex($signature)),
  'txID' => $transaction['txID'],
  'raw_data' => $transaction['raw_data'],
);

// Send the transaction to the Tron network
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => $api_url . '/wallet/broadcasttransaction',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_POST => true,
  CURLOPT_POSTFIELDS => json_encode($signed_transaction),
));
$response = curl_exec($curl);
curl_close($curl);

// Check the response
$response_data = json_decode($response, true);
if (isset($response_data['result']) && $response_data['result'] == true) {
  echo 'Transaction successful!';
} else {
  echo 'Transaction failed: ' . $response_data['message'];
}
*/
}else{
		echo "Something Went Wrong";
	}

?>
