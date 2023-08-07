<?php
// create_order.php

require_once 'vendor/autoload.php';
$config = require_once 'retailcrm_config.php';

use \RetailCrm\ApiClient;
use \RetailCrm\Http\Client\CurlHttpClient;

$client = new ApiClient($config['api_url'], $config['api_key'], CurlHttpClient::class);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные из формы
    $product = $_POST['product'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // Создаем заказ
    $orderData = [
        'firstName' => $name,
        'phone' => $phone,
        'email' => $email,
        'items' => [
            [
                'offer' => [
                    'externalId' => $product,
                ],
                'quantity' => 1,
            ],
        ],
    ];

    try {
        $response = $client->request->ordersCreate($orderData);
        $order = $response->order;
    } catch (\RetailCrm\Exception\CurlException $e) {
        die('Ошибка CURL: ' . $e->getMessage());
    } catch (\RetailCrm\Exception\InvalidJsonException $e) {
        die('Неверный JSON в ответе: ' . $e->getMessage());
    }

    // Обработка $order, если необходимо

    // Перенаправляем пользователя обратно на страницу после создания заказа
    header('Location: index.php');
    exit;
}
