<?php

require_once("wallet-lib.php");

$bci = new blockchain("your_api_key", "your_wallet_id_guid", "your_password", "your_nodejs_wallet_service_port");
$send = $bci->send("1J9ikqFuwrzPbczsDkquA9uVYeq6dEehsj", 100000);
print_r($send);

?>