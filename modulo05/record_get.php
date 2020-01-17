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

    $p1 = new Produto(7);
    print $p1->descricao;

    $p2 = Produto::find(9);
    if($p2)
    {
        print "<br><br><b>{$p2->descricao}</b>";
    }


    Transaction::close();
}
Catch (Exception $e)
{
    Transaction::rollback();
    print $e->getMessage();
}

