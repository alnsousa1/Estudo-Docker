<?php

use Unialfa\OrderProcessor;
use Unialfa\RedisQueue;

    require_once 'vendor/autoload.php';

    $queue = new RedisQueue();
    $orderProcessor = new OrderProcessor($queue);

    $order = [
        'order_id' => 123,
        'customer' => 'Joao Gabriel',
        'email' => 'qualquercoisa@gmail.com',
        'total_amount' => 100.00
    ];

    $orderProcessor->processOrder($order);

?>