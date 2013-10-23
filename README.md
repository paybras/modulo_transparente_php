Checkout Transparente em PHP
================================================

Descrição
---------

Este pacote contém uma série de arquivos, na linguagem PHP, utilizados para faciliar a integração, pelos desenvolvedores, junto à API do Paybras. Pode ser utilizado para realizar a integração de:
* Consulta de Parcelas;
* Consulta de Transações;
* Criação de Transações.
* Notificação de Transações
* Envio de códigos de rastreio

Requisitos
----------

* PHP 5
* SPL
* cURL
* DOM

Componentes do pacote
---------------------

Este pacote contém a seguinte estrutura:
* classes: contém todas as classes necessárias para manipulação de dados, validação e criação de requisição;
* config: contém os arquivos de configuração;
* servicos: contém os servicos utilizados para a motangem do dados a serem enviados a API Paybras

Configuração
------------

Para utilização deste pacote é necessário passar, nos arquivos de configuração, o e-mail e token do lojista. Para isso, na pasta "config", edite o arquivo "PaybrasConfig.php" e altere as seguintes variáveis:
* $PaybrasConfig['lojista']['email'] = '<e-mail do lojista>'
* $PaybrasConfig['lojista']['token'] = '<token do lojista>'
* $PaybrasConfig['lojista']['ambiente'] = "<ambiente que se deseja utilizar";

Nota
----

Em caso de dúvidas entre em contato com o suporte Paybras através dos contatos fornecidos por nossa equipe.
