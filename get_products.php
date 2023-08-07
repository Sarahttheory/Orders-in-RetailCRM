<?php
// get_products.php

require_once 'vendor/autoload.php';
$config = require_once 'retailcrm_config.php';

use \RetailCrm\ApiClient;
use \RetailCrm\Http\Client\CurlHttpClient;

$client = new ApiClient($config['api_url'], $config['api_key'], CurlHttpClient::class);

try {
    $response = $client->request->productsList([], 1, 100); // Здесь можно уточнить параметры запроса
    $products = $response->getProducts();
} catch (\RetailCrm\Exception\CurlException $e) {
    die('Ошибка CURL: ' . $e->getMessage());
} catch (\RetailCrm\Exception\InvalidJsonException $e) {
    die('Неверный JSON в ответе: ' . $e->getMessage());
}

// Обработка $products, если необходимо

