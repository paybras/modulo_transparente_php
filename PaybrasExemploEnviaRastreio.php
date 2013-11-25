<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<?php

    $string_rastreios = "658370;;RB847203122BR.";
    $string_rastreios = explode('.', $string_rastreios);

    $i = 0;
    foreach ($string_rastreios as $key => $value) {
        if($value){
            $linha = explode(';', $value);

            $lista_rastreio[$i]['transaction_id'] = trim($linha['0']);
            $lista_rastreio[$i]['pedido_id'] = $linha['1'];
            $lista_rastreio[$i]['codigo_rastreio'] = $linha['2'];

            $i++;
        }
    }

    require_once "servicos/PaybrasEnviaRastreio.php";
    $retorno = PaybrasEnviaRastreio::main($lista_rastreio);

    echo "<pre>";
    print_r(json_encode($retorno));
    die;
?>