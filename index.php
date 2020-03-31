<?php

require 'vendor/autoload.php';

$client = new Zelenin\Telegram\Bot\Api($_ENV["TOKEN"]); // Set your access token
$url = ''; // URL RSS feed
$update = json_decode(file_get_contents('php://input'));


date_default_timezone_set('America/Sao_Paulo');

//your app
try {
    if($update->message->text == '/start')
    {
    	$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
    	$response = $client->sendMessage([
        	'chat_id' => $update->message->chat->id,
        	'text' => "Tá com fome?\nDigite /ru para saber o cardápio de hoje.",
		'parse_mode' => 'markdown'
     	]);
    }
    else if($update->message->text == '/ru' || $update->message->text == '/ru@rufomebot')
    {
    	$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
    	$response = $client->sendMessage([
        	'chat_id' => $update->message->chat->id,
        	'text' => shell_exec("./ru.sh"),
		'parse_mode' => 'markdown'
     	]);
    }
    else if($update->message->text == '/amanha' || $update->message->text == '/amanha@rufomebot')
    {
    	$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
    	$response = $client->sendMessage([
        	'chat_id' => $update->message->chat->id,
        	'text' => shell_exec("./amanha.sh"),
		'parse_mode' => 'markdown'
     	]);
    }
    else if($update->message->text == '/subscribe' || $update->message->text == '/subscribe@rufomebot')
    {
    	$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
    	$response = $client->sendMessage([
        	'chat_id' => $update->message->chat->id,
        	'text' => shell_exec("./subscribe.sh " . $update->message->chat->id),
		'parse_mode' => 'markdown'
     	]);
    }
    else if($update->message->text == '/unsubscribe' || $update->message->text == '/unsubscribe@rufomebot')
    {
    	$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
    	$response = $client->sendMessage([
        	'chat_id' => $update->message->chat->id,
        	'text' => shell_exec("./unsubscribe.sh " . $update->message->chat->id),
		'parse_mode' => 'markdown'
     	]);
    }
    else if($update->message->text == '/oi' || $update->message->text == '/oi@rufomebot')
    {
    	$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
    	$response = $client->sendMessage([
        	'chat_id' => $update->message->chat->id,
        	'text' => $update->message->chat->id,
		'parse_mode' => 'markdown'
     	]);
    }
    else if($update->message->text == '/time')
    {
    	$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
    	$response = $client->sendMessage([
        	'chat_id' => $update->message->chat->id,
        	'text' => date("H:i:s"),
		'parse_mode' => 'markdown'
     	]);
    }
    else if($update->message->text == '/help' || $update->message->text == '/help@rufomebot')
    {
    	$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
    	$response = $client->sendMessage([
    		'chat_id' => $update->message->chat->id,
    		'text' => "Lista de comandos:\n /ru -> Cardápio de hoje\n /amanha -> Cardápio de amanha\n /help -> Ajuda"
    		]);
    }
    else
    {
    	$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
    	$response = $client->sendMessage([
    		'chat_id' => $update->message->chat->id,
    		'text' => "Comando não encontrado, use /help."
    		]);
    }

} catch (\Zelenin\Telegram\Bot\NotOkException $e) {

    //echo error message ot log it
    //echo $e->getMessage();

}
