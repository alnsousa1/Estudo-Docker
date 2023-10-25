<?php
//declarando um namespace Unialfa, usado para organizar as classes em grupos lógicos. As classes que forem definidas dentro desse namespace devem ser acessadas utilizando Unialfa\
namespace Unialfa;

//Criando a classe OrderProcessor, responsável pelo processamento de pedidos
class OrderProcessor {
    //criando uma propriedade privada que será usada para armazenar uma instância da classe RedisQueue.
    private $queue;

    public function __construct(RedisQueue $queue)
    {
        $this->queue = $queue;
    }

    public function processOrder(array $order){
        $this->queue->enqueue('email_queue', json_encode($order));
    }
}