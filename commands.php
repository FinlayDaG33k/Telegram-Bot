<?php
	class Commands{
		function Help($TelegramBot,$config,$data){
			$message = file_get_contents("texts/help.txt");
			$TelegramBot->sendMessage($config,$data["ChatID"],$message); // Send the message
		}
		function Unknown($TelegramBot,$config,$data){
			$message = "Command `".$data["cmd"]."` not found.";
			$TelegramBot->sendMessage($config,$data["ChatID"],$message); // Send the message
		}
		function Ping($TelegramBot,$config,$data){
			$message = "Pong";
			$TelegramBot->sendMessage($config,$data["ChatID"],$message); // Send the message
		}
		function Start($TelegramBot,$config,$data){
			$message = file_get_contents("texts/start.txt");
			$TelegramBot->sendMessage($config,$data["ChatID"],$message); // Send the message
		}
