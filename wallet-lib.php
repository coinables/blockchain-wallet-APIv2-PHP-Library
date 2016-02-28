<?php

class blockchain{
   protected $api_code;
   protected $guid;
   protected $password;
   protected $port;
   
   public function __construct($api_code, $guid, $password, $port)
   {
		$this->api_code = $api_code;
		$this->guid = $guid;
		$this->password = $password;
		$this->port = $port;
   }
   
   public function login()
   {
		$request = "http://127.0.0.1:".$this->port."/merchant/".$this->guid."/login?password=".$this->password."&api_code=".$this->api_code;
		return $this->cURL($request);
   }
   
   public function new_address($label)
   {
		$label ? $options = "&label=$label" : $options = "";
		$request = "http://127.0.0.1:".$this->port."/merchant/".$this->guid."/new_address?password=".$this->password.$options;
		return $this->cURL($request);
   }
   
   public function send($to, $amount, $from, $fee, $note)
   {
   //from, fee and note are optional fields
		$from ? $fromOp = "&from=$from" : $fromOp = "";
		$fee ? $feeOp = "&fee=$fee" : $feeOp = "";
		$note ? $noteOp = "&note=$note" : $noteOp = "";
		$request = "http://127.0.0.1:".$this->port."/merchant/".$this->guid."/payment?password=".$this->password."&to=".$to."&amount=".$amount.$fromOp.$feeOp.$noteOp;
		return $this->cURL($request);
   }
   
   public function send_many($addresses, $fee)
   {
   //fee parameter is optional
		$addresses = json_encode($addresses);
		$fee ? $options = "&fee=$fee" : $options = "";
		$request = "http://127.0.0.1:".$this->port."/merchant/".$this->guid."/sendmany?password=".$this->password."&recipients=".$addresses.$options;
		return $this->cURL($request);
   }
   
   public function balance()
   {
		$request = "http://127.0.0.1:".$this->port."/merchant/".$this->guid."/balance?password=".$this->password;
		return $this->cURL($request);
   }
   
   public function addresses()
   {
		$request = "http://127.0.0.1:".$this->port."/merchant/".$this->guid."/list?password=".$this->password;
		return $this->cURL($request);
   }
   
   public function get_balance($address, $confirmations)
   {
		$confirmations ? $options ="&confirmations=$confirmations" : $options = "";
		$request = "http://127.0.0.1:".$this->port."/merchant/".$this->guid."/address_balance?password=".$this->password."&address=".$address.$options;
		return $this->cURL($request);
   }
   
   private function cURL($url)
   {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, $url);
		$ccc = curl_exec($ch);
		return json_decode($ccc, true);
   }

}

//USAGE EXAMPLES
/*

//login, you must initiate the below login with your local nodesJS service prior to making any requests.
$bci = new blockchain("my_apicode", "wallet_id", "my_password", 3000);
$login = $bci->login();
print_r($login);

//generate a new address, entering a label is optional
$new = $bci->new_address("some_label");
print_r($new); 

//send payment  (to, amount, from, fee, note) from, fee and note are optional. 
If you specify a fee you must specify a from, if you specify a note you must specify a from and a fee.
$send = $bci->send("1J9ikqFuwrzPbczsDkquA9uVYeq6dEehsj", "1000000");
print_r($send);

//send many payments (recipients array, fee)
//create an associative array to list the multiple addresses and amounts. The fee parameter is optional.
$array = array(
		"1someAddress" => 20000,
		"1someAddress2" => 150000,
		"1someAddress3" => 314159
	); 
$send = $bci->send_many($array, 10000);
print_r($send);

//fetch wallet balance
$wallet = $bci->balance();
$print_r($wallet);

//list all wallet addresses
$wallet = $bci->addresses();
$print_r($wallet);

//fetch balance of a specific address
$balance = $bci->get_balance("1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa", 6);
$print_r($balance);

*/


?>