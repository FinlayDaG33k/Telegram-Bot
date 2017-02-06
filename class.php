<?php
	class TelegramBot{
		// Send a message
		function sendMessage($config,$recipient,$message){
			$ch = curl_init(); // create a new cURL resource
			// set URL and other appropriate options
			$url = $config["Telegram"]["HTTP_BASE_URL"] . $config["Telegram"]["TOKEN"] . "/sendMessage?chat_id=".$recipient."&parse_mode=HTML&text=".urlencode($message); // Set the URL to send the request to
			curl_setopt($ch, CURLOPT_URL, $url); // the the URL to cURL to send the request to
			curl_setopt($ch, CURLOPT_HEADER, 0); // I have no clue what this does
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // Prevent cURL from echoing the results to the main script
			curl_exec($ch); // Execute the cURL thingy!
			curl_close($ch); // close cURL resource, and free up system resources
		}
