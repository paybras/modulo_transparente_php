<?php

    require_once "PaybrasBiblioteca.php";

    class PaybrasStatusTransacao {

        public static function main($transacao_id = null, $pedido_id = null) {
            try {
                
                /*
                * #### Lojista ##### 
                * Você deve adicionar seus dados ao arquivo de configuração (config/PaybrasConfig.php)
                */
                $dados['lojista'] = PaybrasConfig::getDadosLojista();
                $dados['conexao'] = new PaybrasDadosConexao(PaybrasConfig::getURL('status'));
                $dados['transacao_id'] = $transacao_id ? $transacao_id : null;
                $dados['pedido_id'] = $pedido_id ? $pedido_id : null;

                $statusTransacao = new PaybrasConsultaStatusTransacao($dados);
                
                return self::retornoStatusTransacao($statusTransacao->getArrayStatusTransacao());
                
            } catch (PaybrasExcecao $e) {
                die($e->getMessage());
            }
            
        }

        public static function retornoStatusTransacao(Array $statusTransacao) {
            if(isset($statusTransacao) && !empty($statusTransacao)) {
                return $statusTransacao;
            } else {
                //Caso a requisição não tenha sido enviada a API do Paybras
                echo "Erro no envio da transação";
            }
        }
    }

    PaybrasStatusTransacao::main();

?>