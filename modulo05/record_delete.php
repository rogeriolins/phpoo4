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

    $p2 = Produto::find(9);
    if($p2)
    {
        print "<br>Produto antes:<br><b>{$p2->descricao}</b><br>Quantidade: <b>{$p2->estoque}</b>";
        $p2->delete();
    }


    Transaction::close();
}
Catch (Exception $e)
{
    Transaction::rollback();
    print $e->getMessage();
}