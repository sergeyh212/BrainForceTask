<?php

include('../Models/Clients.php');

$client = new Client();

$data = [
	'clientName' => $_POST['clientName'],
	'clientNumber' => $_POST['clientNumber'],
	'brandName' => $_POST['brandName'],
	'modelName' => $_POST['modelName'],
	'detailName' => $_POST['detailName']
];

$response = $client->createOrder($data);

// $to = 'sergeyh215@gmail.com';
// $subject = 'Оформлен заказ';
// $message = "Имя: {$_POST['clientName']}, номер: {$_POST['clientNumber']}, марка: {$_POST['brandName']}, 
// модель: {$_POST['modelName']}, {$_POST['detailName']}";
// mail($to, $subject, $message);

exit(json_encode($response));