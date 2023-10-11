<?php

//para trabalhar com namespace

use Unialfa\RedisQueue;

require 'vendor/autoload.php';

//criando um objeto para acessar o redis
$redisQueue = new RedisQueue();
$queueName = 'email_queue';

//pegando o tamanho da fila
$queueLength = $redisQueue->getQueueLength($queueName);

if ($queueLength > 0){
    echo "Itens na fila: $queueName <br>";

    $allItems = $redisQueue->getRedisInstance()->lrange($queueName, 0, -1);

    foreach($allItems as $i => $item){
        echo "$i: $item <br>";
    }
}else{
    echo "A fila $queueName está vazia <br>";
}