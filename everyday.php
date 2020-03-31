<?php

require 'vendor/autoload.php';

$client = new Zelenin\Telegram\Bot\Api('TOKEN'); // Set your access token
$url = ''; // URL RSS feed
$update = json_decode(file_get_contents('php://input'));

date_default_timezone_set('America/Sao_Paulo');

//your app
try {
    $response = $client->sendMessage([
        'chat_id' => 316416381,
        'text' => shell_exec("./ru.sh"),
		'parse_mode' => 'markdown'
    ]);
} catch (\Zelenin\Telegram\Bot\NotOkException $e) {

    //echo error message ot log it
    //echo $e->getMessage();

}
