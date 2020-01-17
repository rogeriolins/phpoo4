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
    $criterio->add('estoque', '>', 10);
    $criterio->add('origem', '=', 'N');

    $repositorio = new Repository('Produto');
    $produtos = $repositorio->load($criterio);
    if($produtos)
    {
        foreach ($produtos as $produto)
        {
            print "ID: {$produto->id}";
            print " - Descricao: {$produto->descricao}";
            print " - Estoque: {$produto->estoque}";
            print "<br>";
        }
    }

    print "Qtde: {$repositorio->count($criterio)}";

    Transaction::close();
}
catch (Exception $exc)
{
    Transaction::rollback();
    $exc->getMessage();
}
