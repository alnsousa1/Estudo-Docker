<?php

namespace Unialfa;

use Predis\Client;

class RedisQueue{
    private $redis;

    //fazendo a conexão com o redis
    public function __construct(){
        $this->redis = new Client(
            [
                'scheme' => 'tcp',
                'host' => 'redis',
                'port' => 6379
            ]
        );

    }

    //Adiciona um item na fila
    public function enqueue($queueName, $item){
        $this->redis->rpush($queueName, $item);
    }
}