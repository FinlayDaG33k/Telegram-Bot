<?php
    require("SensitiveData/config.php");
    require("class.php");
		require("commands.php");

		// Load the classes needed
		$TelegramBot = new TelegramBot; // Main Class.
		$Commands = new Commands; // Commands class. (useful to do it like this)

		$raw_input = file_get_contents('php://input'); // takes the raw input.
		$input = json_decode($raw_input,1); // Takes the raw input and put it in a usable little array.




		// put the commands, parameters etc. in a neat little array
		$data = array(
										"ChatID" => $input["message"]["chat"]["id"], // Chat ID
										"Username" => $input["message"]["chat"]["username"], // Username if set
										"cmd" => strtok($input["message"]["text"], " "), // The first word. Stipping down the first character (often a "/")
										"Parameters" => explode(" ", substr(strstr($input["message"]["text"]," "), 1)), // All the other words.
										"Input" => $input["message"]["text"] // The complete input
									);


		// Check which command to run, then run it
		switch (strtolower($data["cmd"])) {
			case "/start":
				$Commands->Start(TelegramBot,$config,$data,$conn);
				break;
			case "/help":
				$Commands->Help(TelegramBot,$config,$data);
				break;
			case "/ping":
				$Commands->Ping($NSStoringenBot,$config,$data);
				break;
			default:
				$Commands->Unknown($NSStoringenBot,$config,$data);
				break;
		}
