<?php 
require_once "PaybrasBiblioteca.php";?>

<?php
class PaybrasEnviaRastreio {

    public static function main($lista_rastreios) {
        try {

            /*
            * #### Lojista ##### 
            * Você deve adicionar seus dados ao arquivo de configuração (config/PaybrasConfig.php)
            */
            $dados['lojista'] = PaybrasConfig::getDadosLojista();
            $dados['conexao'] = new PaybrasDadosConexao(PaybrasConfig::getURL('rastreio'));

            // Passa para array de dados os dados do produto, recuperados do POST, apartir do método dadosRastreio
            // Não obrigatório
            $dados['rastreios'] = self::dadosRastreio($lista_rastreios);



            $envioRastreios = new PaybrasEnvioRastreios($dados);

            return self::retornoEnvioRastreio($envioRastreios->getArrayEnvioRastreios());
            
        } catch (PaybrasExcecao $e) {
            die($e->getMessage());
        }
        
    }

    public static function retornoEnvioRastreio(Array $retornoRastreio) {
        if(isset($retornoRastreio) && !empty($retornoRastreio)) {
            return $retornoRastreio;
        } else {
            //Caso a transação não tenha sido enviada a API do Paybras
            echo "Erro no envio da transação";
        }
    }

    private function dadosRastreio($lista_rastreios) {
        if(isset($lista_rastreios) && !empty($lista_rastreios)) {
            $dados = array();

            foreach ($lista_rastreios as $value) {
                $dados['transaction_id'] = $value['transaction_id'];
                $dados['pedido_id'] = $value['pedido_id'];
                $dados['codigo_rastreio'] = $value['codigo_rastreio'];

                $rastreios[] = new PaybrasDadosRastreio($dados);
                $dados = null;
            }
            return $rastreios;
        } else {
            return null;
        }
    }
}
?>