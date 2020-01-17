<?php

require_once "classes/api/Transaction.php";
require_once "classes/api/Connection.php";
require_once "classes/api/Logger.php";
require_once "classes/api/LoggerTXT.php";
require_once "classes/api/Record.php";
require_once "classes/model/Produto.php";

try {
    Transaction::open('estoque');
    Transaction::setLogger(new LoggerTXT('tmp/log_novo.txt'));

    $p1 = new Produto();
    $p1->descricao     = "Cerveja artesanal IPA";
    $p1->estoque       = 50;
    $p1->preco_custo   = 8;
    $p1->preco_venda   = 12;
    $p1->codigo_barras = "123321123";
    $p1->origem        = "N";
    $p1->store();

    Transaction::close();
}
Catch (Exception $e)
{
    Transaction::rollback();
    print $e->getMessage();
}

