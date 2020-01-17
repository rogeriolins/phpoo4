<?php

require_once "classes/api/Transaction.php";
require_once "classes/api/Connection.php";
require_once "classes/api/Criteria.php";
require_once "classes/api/Repository.php";
require_once "classes/api/Record.php";
require_once "classes/api/Logger.php";
require_once "classes/api/LoggerTXT.php";
require_once "classes/model/Produto.php";

try {
    Transaction::open("estoque");
    Transaction::setLogger(new LoggerTXT("tmp/log_collection.txt"));

    $criterio = new Criteria;
    $criterio->add('preco_venda', '<=', 35);
    $criterio->add('origem', '=', 'N');

    $repositorio = new Repository('Produto');
    $produtos = $repositorio->load($criterio);
    if($produtos)
    {
        foreach ($produtos as $produto) {
            $produto->preco_venda *= 1.3;
            $produto->store();
        }
    }

    Transaction::close();
}
catch (Exception $exc)
{
    Transaction::rollback();
    $exc->getMessage();
}