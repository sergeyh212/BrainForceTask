<?php

include('Product.php');

$data = file_get_contents("https://bfdev.ru/test/json.txt");

$json = json_decode($data, true);

$goods = new Product();

// Product::createGoods($json);

// Product::showLeftovers();

// Product::showInformation($json);

// Product::getJSON($json);

// Product::deleteDataFromTable();