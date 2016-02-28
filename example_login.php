<?php

require_once("wallet-lib.php");

$bci = new blockchain("your_api_key", "your_wallet_id_guid", "your_password", "your_nodejs_wallet_service_port");
$login = $bci->login();
print_r($login);

?>