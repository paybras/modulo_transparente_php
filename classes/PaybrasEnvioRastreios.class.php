<?php

class PaybrasEnvioRastreios {
    private $conexao;
    private $lojista;
    private $rastreio = array();

    // Inicializa nova instância da classe PaybrasEnvioRastreios
    public function __construct(Array $dados = null) {
        if ($dados) {
            if (isset($dados['conexao']) && $dados['conexao'] instanceof PaybrasDadosConexao) {
                $this->conexao = $dados['conexao'];
            }
            if (isset($dados['lojista']) && $dados['lojista'] instanceof PaybrasDadosLojista) {
                $this->lojista = $dados['lojista'];
            }

            if (isset($dados['rastreios'])) {
                foreach ($dados['rastreios'] as $value) {
                    $this->rastreio[] = $value;
                }
            }
        } else {
            throw new Exception("Dados de envio de rastreio não setados.");
        }
    }

    // Retorna dados da conexão
    public function getConexao() {
        return !empty($this->conexao) ? $this->conexao : null;
    }

    // Seta dados da conexão
    public function setConexao(PaybrasDadosConexao $conexao) {
        $this->conexao = $conexao;
    }

    ///////////////////////////////////////////////////////////////

    // Retorna dados do lojista
    public function getLojista() {
        return !empty($this->recebedor_email) ? $this->recebedor_email : null;
    }

    // Seta dados do lojista
    public function setLojista(PaybrasDadosLojista $lojista) {
        $this->lojista = $lojista;
    }

    ///////////////////////////////////////////////////////////////

    // Retorna dados do rastreio
    public function getRastreio() {
        return !empty($this->rastreio) ? $this->rastreio : null;
    }

    // Seta dados do rastreio
    public function setRastreio(PaybrasDadosRastreio $rastreio) {
        $this->rastreio = $rastreio;
    }

    // Gera mensagem para ser enviada
    public function getArrayEnvioRastreios(){
        if(isset($this->lojista) && !empty($this->lojista)){
            $mensagem['recebedor_email'] = $this->lojista->getEmail();
            $mensagem['recebedor_api_token'] = $this->lojista->getToken();
        } else {
            throw new Exception("Dados do lojista não setados.");
        }

        if(isset($this->rastreio) && !empty($this->rastreio)){
            $i=0;
            foreach ($this->rastreio as $value) {
                $mensagem['rastreios'][$i]['transaction_id'] = $value->getTransaction();
                $mensagem['rastreios'][$i]['pedido_id'] = $value->getPedido();
                $mensagem['rastreios'][$i]['codigo_rastreio'] = $value->getRastreio();
                $i++;
            }

        } else {
            throw new Exception("Dados dos rastreios não setados.");
        }
        
        if(isset($this->conexao) && !empty($this->conexao)){
            $urlEnvio = $this->conexao->getURL();
        } else {
            throw new Exception("Dados da conexão não setados.");
        }

        PaybrasConfig::utf8_encode_deep($mensagem);
        $retorno = PaybrasConfig::curl($urlEnvio, $mensagem);

        return json_decode($retorno, true);
    }
}
?>
