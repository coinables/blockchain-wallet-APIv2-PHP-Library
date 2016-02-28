# Blockchain.info PHP Library for NodeJS Wallet Service

Simple PHP library that allows simple communication to the localhost nodeJS wallet service. 

<<<<<<< HEAD
=======
BTC:  1NPrfWgJfkANmd1jt88A141PjhiarT8d9U

>>>>>>> origin/features
# Usage
0. Requirements

 * Blockchain.info account with nodeJS wallet service running
    Guide to setting up the nodeJS wallet service http://btcthreads.com/how-to-setup-blockchain-wallet-service/
 
1. Download or clone the main project and extract files.

2. Include or require the `wallet-lib.php` file

        require_once("wallet-lib.php");

3. Initiate the login to your nodeJS wallet service

        $bci = new blockchain("your_api_key", "your_wallet_id_guid", "your_password", "your_nodejs_wallet_service_port");
		$login = $bci->login();
		print_r($login);

 * If your receive an error at this point, check your email. You may need to whitelist your nodeJS service with blockchain.info
		
3. Start making calls

 * check wallet balance

        $balance = $bci->balance();
		print_r($balance);

 * create a new receiving address (label is optional)
 
		$new = $bci->new_address("my_label");
		print_r($new);
		
 * basic send payment
 
		$pmt = $bci->send("1J9ikqFuwrzPbczsDkquA9uVYeq6dEehsj", 100000);
		print_r($send);
		
 * advanced send payment with From, Fee and Note options
 
		$pmt = $bci->send("1J9ikqFuwrzPbczsDkquA9uVYeq6dEehsj", 100000, "1FromThisSpecifAddressab324", 10000, "Thanks for using mysite.com");
		print_r($send);
		
 * send_many
 
		$array = array(
			"1someAddress" => 20000,
			"1someAddress2" => 150000,
			"1someAddress3" => 314159
		); 
		$send = $bci->send_many($array);
		print_r($send);
	
		
<<<<<<< HEAD
		
=======
		
>>>>>>> origin/features
