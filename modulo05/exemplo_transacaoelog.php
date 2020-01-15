<?php

require_once "classes/ar/ProdutoComTransacaoELog.php";
require_once "classes/api/Connection.php";
require_once "classes/api/Transaction.php";
require_once "classes/api/Logger.php";
require_once "classes/api/LoggerTXT.php";


try
{

    Transaction::open('estoque');
    Transaction::setLogger(new LoggerTXT('log.txt') );

    $produto = new Produto;
    $produto->descricao = 'Pernil Salamaleico';
    $produto->estoque = 70;
    $produto->preco_custo = 19;
    $produto->preco_venda = 38;
    $produto->codigo_barras = "222333111";
    $produto->data_cadastro = date("Y-m-d");
    $produto->origem = "N";
    $produto->save();

    Transaction::close();

}
Catch (Exception $e)
{
    Transaction::rollback();
    print $e->getMessage();
}
