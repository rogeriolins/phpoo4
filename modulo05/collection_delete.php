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
    $criterio->add('descricao', 'like', "%Salama%");
    $criterio->add('descricao', 'like', "%alit%", 'or');

    $repositorio = new Repository('Produto');
    $repositorio->delete($criterio);

    Transaction::close();
}
catch (Exception $exc)
{
    Transaction::rollback();
    $exc->getMessage();
}