<?php

class PaybrasConfig{
	
	private static $config;
	private static $data;
	const varName = 'PaybrasConfig';
	
	private function __construct() {
		require_once "PaybrasConfig.php";
		$varName = self::varName;
		if (isset($$varName)) {
			self::$data = $$varName;
			unset($$varName);
		} else {
			throw new Exception("Configuração não definida.");
		}
	}

	public static function init() {
		if (self::$config == null) {
			self::$config = new PaybrasConfig();
		}
		return self::$config;
	}
	
	public static function getDadosLojista() {
		if (isset(self::$data['lojista']) && isset(self::$data['lojista']['email']) && isset(self::$data['lojista']['token'])) {
			return new PaybrasDadosLojista(self::$data['lojista']['email'], self::$data['lojista']['token']);
		} else {
			throw new Exception("Dados de Lojista não adicionados ao arquivo de configuração");
		}
	}
	
	public static function getURL($servico) {
        if(isset(self::$data['lojista']['ambiente'])){
            $ambiente = self::$data['lojista']['ambiente'];
    		if (isset(self::$data['ambiente']) && isset(self::$data['ambiente'][$servico][$ambiente])) {
    			return self::$data['ambiente'][$servico][$ambiente];
    		} else {
    			throw new Exception("Dados de conexão não adicionados ao arquivo de configuração");
    		}
        } else {
            throw new Exception("Ambiente não setado no arquivo de configuração");
        }
	}

	public static function curl($url,$data){
        $ch = curl_init();

        $data_string = json_encode($data);
        
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string))
        );
        return curl_exec($ch);
    }

    public static function utf8_encode_deep(&$input) {
        if (is_string($input)) {
            $input = utf8_encode($input);
        } elseif (is_array($input)) {
            foreach ($input as &$value) {
                self::utf8_encode_deep($value);
            }
            unset($value);

        } elseif (is_object($input)) {
            $vars = array_keys(get_object_vars($input));
            foreach ($vars as $var) {
                self::utf8_encode_deep($input->$var);
            }
        }
    }
}

?>
