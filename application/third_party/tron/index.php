<?php 
$sent_success = '';
$sent_faild   = '';
$bal_success  = '';
$bal_faild = '';
$wallet    = false;
$hex    ='';
$base58 = '';
$private_key = '';
$public_key  = '';

if(isset($_POST['amount']))
{
// 	$tron_wallet_from_address = (string)$_POST['send_from'];
// 	$tron_wallet_to_address   = (string)$_POST['send_to'];
// 	$tron_private_key	 = (string)$_POST['key'];
// 	$amt 				 = floatval(number_format((float)$_POST['amount'], 6, '.', ''));
	
	$tron_wallet_from_address = $_POST['send_from'];
	$tron_wallet_to_address   = $_POST['send_to'];
	$tron_private_key	 = $_POST['key'];
	$amt 				 = floatval($_POST['amount']);
	
	//echo $amt; exit;
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
				$transfer = $tron->send($tron_wallet_to_address, $amt);
				//$tron->getTransactionBuilder()->sendTrx($tron_wallet_to_address, $amt,$tron_wallet_from_address);
			} catch (\IEXBase\TronAPI\Exception\TronException $e) {
				die($e->getMessage());
			}
						
		$sent_success = 'Done Payment Successfully'; 
	}else{
		$sent_faild = 'Insufficient Balance'; 
	}
}

if(isset($_POST['address']))
{
	include_once 'tron-api-master/vendor/autoload.php';
	$wallet_address = $_POST['address'];

	$fullNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
	$solidityNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
	$eventServer = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');

	try {
		$tron = new \IEXBase\TronAPI\Tron($fullNode, $solidityNode, $eventServer);
	} catch (\IEXBase\TronAPI\Exception\TronException $e) {
		exit($e->getMessage());
	}


	$tron->setAddress($wallet_address);
	$balance = $tron->getBalance(null, true);
	
	$bal_success = $balance;
}

if(isset($_POST['create']))
{
	include_once 'tron-api-master/vendor/autoload.php';

	try {
		$tron = new \IEXBase\TronAPI\Tron();

		$generateAddress = $tron->generateAddress(); // or createAddress()
		$isValid = $tron->isAddress($generateAddress->getAddress());
		
		$wallet      = true;
		$hex         = $generateAddress->getAddress();
		$base58      = $generateAddress->getAddress(true);
		$private_key = $generateAddress->getPrivateKey();
		$public_key  = $generateAddress->getPublicKey();

	} catch (\IEXBase\TronAPI\Exception\TronException $e) {
		echo $e->getMessage();
	}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tron</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container" style="padding: 26px;">
    <div class="row">
        <div class="col-md-6">
		  <h2>Send Tron</h2>
		  <form method="POST">
		  <?php if($sent_success): ?>
			  <div class="alert alert-success">
				<?php echo $sent_success; ?>.
			  </div>
		  <?php endif; ?>
		  <?php if($sent_faild): ?>
			  <div class="alert alert-danger">
				<?php echo $sent_faild; ?>.
			  </div>
		  <?php endif; ?>
			<div class="form-group">
			  <label for="from">Send From:</label>
			  <input type="text" class="form-control" id="from" placeholder="Enter From Address" name="send_from" required>
			</div>
			<div class="form-group">
			  <label for="key">From Address Private Key:</label>
			  <input type="text" class="form-control" id="key" placeholder="Enter Private Key" name="key" required>
			</div>
			<div class="form-group">
			  <label for="to">Send To:</label>
			  <input type="text" class="form-control" id="to" placeholder="Enter To Address" name="send_to" required>
			</div>
			<div class="form-group">
			  <label for="amount">Amount:</label>
			  <input type="text" class="form-control" id="amount" placeholder="Enter Amount" name="amount" required>
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
		  </form>
		</div>
		<div class="col-md-6">
			
		  <h2>Create Wallet</h2>
		  <form method="POST">
		  <input type="hidden" name="create" value="1" />
		  <button type="submit" class="btn btn-primary">Create</button>
		  <?php if($wallet): ?>
				<div class="well" style="word-wrap: break-word;margin-top:10px;">Address hex: <strong><?php echo $hex; ?></strong></div>
				<div class="well" style="word-wrap: break-word;">Address base58: <strong><?php echo $base58; ?></strong></div>
				<div class="well" style="word-wrap: break-word;">Private key: <strong><?php echo $private_key ?></strong></div>
				<div class="well" style="word-wrap: break-word;">Public key: <strong><?php echo $public_key ?></strong></div>
		  <?php endif; ?>
		  </form>
		  <h2>Check Balance</h2>
		  <form method="POST">
			<div class="form-group">
			  <label for="address">Wallet Address:</label>
			  <input type="text" class="form-control" id="address" placeholder="Enter Wallet Address" name="address" required>
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
		  <?php if($bal_success): ?>
			  <div class="alert alert-success" style="margin-top: 10px;">
				Balance: <strong><?php echo $bal_success; ?></strong>
			  </div>
		  <?php endif; ?>
		  <?php if($bal_faild): ?>
			  <div class="alert alert-danger" style="margin-top: 10px;">
				<?php echo $bal_faild; ?>.
			  </div>
		  <?php endif; ?>
		  </form>
		</div>
	</div>
</div>

</body>
</html>
