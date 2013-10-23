<?php

class PaybrasDadosRastreio {
    private $transaction_id;
    private $pedido_id;
    private $codigo_rastreio;

    // Inicializa nova instância da classe PaybrasDadosProduto
    public function __construct (Array $dados = null) {
        if ($dados) {
            if (isset($dados['transaction_id'])) {
                $this->transaction_id = $dados['transaction_id'];
            }
            if (isset($dados['pedido_id'])) {
                $this->pedido_id = $dados['pedido_id'];
            }
            if (isset($dados['codigo_rastreio'])) {
                $this->codigo_rastreio = $dados['codigo_rastreio'];
            }
        } else {
            throw new Exception("Dados do produto não setados.");
        }
    }

    // Retorna transaction_id
    public function getTransaction() {
        return !empty($this->transaction_id) ? $this->transaction_id : null;
    }

    // Seta transaction_id
    public function setTransaction($transaction_id) {
        $this->transaction_id = $transaction_id;
    }

    // Retorna pedido_id
    public function getPedido() {
        return !empty($this->pedido_id) ? $this->pedido_id : null;
    }

    // Seta pedido_id
    public function setPedido($pedido_id) {
        $this->pedido_id = $pedido_id;
    }

    // Retorna codigo_rastreio
    public function getRastreio() {
        return !empty($this->codigo_rastreio) ? $this->codigo_rastreio : null;
    }

    // Seta codigo_rastreio
    public function setRastreio($codigo_rastreio) {
        $this->codigo_rastreio = $codigo_rastreio;
    }
}

?>