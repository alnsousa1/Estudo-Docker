<?php

use Unialfa\RedisQueue;

require "vendor/autoload.php";

//criando um objeto para se conectar com o redis
$redisQueue = new RedisQueue();

$emailQueue = "email_queue";

while(true){
    if($redisQueue->getQueueLength($emailQueue) > 0){
        $orderData = $redisQueue->dequeue($emailQueue);

        //o parametro TRUE formata o conteudo do arquivo emails.log
        $order = json_decode($orderData, true);
        $email = $order["email"];

        //FILE_APPEND insere um arquivo, porem, sempre na proxima linha, ou seja, nao substitui
        file_put_contents('emails.log', print_r($order, true), FILE_APPEND);

        echo "Email enviado: $email <br>";
    }else{
        echo "a fila de emails está vazia. Aguardando novos pedidos... <br>";
        sleep(5);
    }
}