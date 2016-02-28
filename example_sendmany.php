<?php

require_once("wallet-lib.php");

$bci = new blockchain("your_api_key", "your_wallet_id_guid", "your_password", "your_nodejs_wallet_service_port");
$array = array(
		"1someAddress" => 20000,
		"1someAddress2" => 150000,
		"1someAddress3" => 314159
	); 
$send = $bci->send_many($array);
print_r($send);

?>