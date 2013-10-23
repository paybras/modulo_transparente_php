<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<?php

    $string_rastreios = "   
        655675;;RB84750951BR.
        655623;;RB847509622BR.
        655621;;RB847509633BR.
        655582;;RB847509644BR.
        655580;;RB847509655BR.
        655565;;RB847509666BR";

    $string_rastreios = explode('.', $string_rastreios);

    $i = 0;
    foreach ($string_rastreios as $key => $value) {
        $linha = explode(';', $value);

        $lista_rastreio[$i]['transaction_id'] = trim($linha['0']);
        $lista_rastreio[$i]['pedido_id'] = $linha['1'];
        $lista_rastreio[$i]['codigo_rastreio'] = $linha['2'];

        $i++;
    }

    require_once "servicos/PaybrasEnviaRastreio.php";
    $retorno = PaybrasEnviaRastreio::main($lista_rastreio);

    echo "<pre>";
    print_r(json_encode($retorno));
    die;
?>