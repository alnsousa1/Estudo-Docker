<?php

use Unialfa\RedisQueue;

require "vendor/autoload.php";

//criando um objeto para se conectar com o redis
$redisQueue = new RedisQueue();

$emailQueue = "email_queue";

while(true){
    if($redisQueue->getQueueLength($emailQueue) > 0){
        $orderData = $redisQueue->dequeue($emailQueue);
    }
}