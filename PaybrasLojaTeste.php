<html xmlns="http://www.w3.org/1999/xhtml"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<style>
    label{
        display: block;
        width: 300px;
    }

    #protected{
        display: none;
    }
</style>

<body>
<form method="post" target="_self" action="PaybrasExemploCheckout.php" style="width: 300px">

    <!--DADOS DO PEDIDO-->
    <label>ID do Pedido*</label><input type="text" name="pedido_id" value="checkoutweb_<?php echo rand(1111,9999)?>" />
    <label>Descrição do Pedido</label><input type="text" name="pedido_descricao"    />
    <label>Moeda*</label><input type="text" name="pedido_moeda"  value="BRL" />
    <label>Valor Total Original*</label>  <input type="text" name="pedido_valor_total_original" value="234.56"/>

    <!--DADOS DO PAGADOR-->
    <label>Nome do Cliente*</label> <input type="text" name="pagador_nome"  value="tiao da silva" />
    <label>E-mail do Cliente*</label><input type="text" name="pagador_email" value="tiao@mail.com" />
    <label>CPF do Cliente*</label>  <input type="text" name="pagador_cpf"   value="111.186.977-40" />
    <label>RG do Cliente</label>    <input type="text" name="pagador_rg" />
    <label>DDD do Telefone do Cliente*</label>   <input type="text" name="pagador_telefone_ddd" value="031"/>
    <label>Telefone do Cliente*</label>  <input type="text" name="pagador_telefone" value="939123123"/>
    <label>DDD do Celular do Cliente</label><input type="text" name="pagador_celular_ddd" />
    <label>Celular do Cliente</label>    <input type="text" name="pagador_celular"/>
    <label>Sexo do Cliente (M ou F)</label>  <input type="text" name="pagador_sexo"   />
    <label>Data de Nascimento do Cliente (dd/mm/yyyy)</label> <input type="text" name="pagador_data_nascimento"  />
    <label>IP do cliente</label>    <input type="text" name="<?php echo $_SERVER["REMOTE_ADDR"]; ?>"/>
    <label>Endereço do Cliente</label> <input type="text" name="pagador_logradouro"  />
    <label>Número</label><input type="text" name="pagador_numero" />
    <label>Complemento</label><input type="text" name="pagador_complemento" />
    <label>Bairro</label><input type="text" name="pagador_bairro" />
    <label>CEP (xxxxx-xxx)</label>   <input type="text" name="pagador_cep"    />
    <label>Cidade</label><input type="text" name="pagador_cidade" />
    <label>Estado (XX)</label><input type="text" name="pagador_estado" />
    <label>País (BRA)</label>  <input type="text" name="pagador_pais"   />
    <label>URL de Redirecionamento (BOL e TEF)</label><input type="text" name="pedido_url_redirecionamento"/>

    <!--DADOS DO ENDEREÇO DE ENTREGA-->
    <label>Nome para Entrega*</label><input type="text" name="entrega_nome" value="tiao da silva"  />
    <label>Endereço de Entrega*</label><input type="text" name="entrega_logradouro" value="R do Tião"  />
    <label>Múmero</label><input type="text" name="entrega_numero"  value="123"/>
    <label>Complemento</label><input type="text" name="entrega_complemento" />
    <label>Bairro*</label>    <input type="text" name="entrega_bairro"  value="bairro do tiao"/>
    <label>CEP (xxxxx-xxx)*</label>  <input type="text" name="entrega_cep" value="29060-040"/>
    <label>Cidade*</label>    <input type="text" name="entrega_cidade" value="itaunas"/>
    <label>Estado (XX)*</label>    <input type="text" name="entrega_estado" value="ES"/>
    <label>País (BRA)*</label> <input type="text" name="entrega_pais"   value="BRA"/>

    <!--DADOS DOS PRODUTOS-->
    <label>Cod. Produto 1</label>   <input type="text" name="produtos[0][produto_codigo]"  />
    <label>Produto 1</label><input type="text" name="produtos[0][produto_nome]"    />
    <label>Categoria 1</label><input type="text" name="produtos[0][produto_categoria]"    />
    <label>Quantidade 1</label> <input type="text" name="produtos[0][produto_qtd]"/>
    <label>Valor 1</label>    <input type="text" name="produtos[0][produto_valor]"   />
    <label>Peso 1</label><input type="text" name="produtos[0][produto_peso]"    />

    <label>Cod. Produto 2</label>   <input type="text" name="produtos[1][produto_codigo]"  />
    <label>Produto 2</label><input type="text" name="produtos[1][produto_nome]"    />
    <label>Categoria 2</label><input type="text" name="produtos[1][produto_categoria]"    />
    <label>Quantidade 2</label> <input type="text" name="produtos[1][produto_qtd]"/>
    <label>Valor 2</label>    <input type="text" name="produtos[1][produto_valor]"   />
    <label>Peso 2</label><input type="text" name="produtos[1][produto_peso]"    />

    <button type="submit" style="margin-left: 200px; margin-bottom: 50px; margin-top: 50px; float: left; width: 200px; height: 50px; background-color: #ff0000; border: 2px solid white; color: white; font-size: 20px; font-weight: bold; box-shadow: 1px 1px #ccc; ">COMPRAR!</button>

</form>

</body>
</html>