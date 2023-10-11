<?php

namespace Unialfa;

use Predis\Client;

class RedisQueue{
    private $redis;

    //fazendo a conexão com o redis / instanciando a classe
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

    // o "lpop" entra na fila e faz a leitura, pega o item e remove da fila
    public function dequeue($queueName){
        return $this->redis->lpop($queueName);
    }

    //traz o tamanho da fila, independente do que seja
    public function getQueueLength($queueName){
        return $this->redis->llen($queueName);
    }

    //retornando ela mesma, ou seja, a propria instancia
    public function getRedisInstance(){
        return $this->redis;
    }

}