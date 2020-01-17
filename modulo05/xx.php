<?php

try
{
    /* Inicia uma transação */
    Transaction::open('estoque');


    /* Define critérios de seleção */
    $crit = new Criteria();
    $crit->add('estoque', '>', 10);
    $crit->add(origem, '=', 'N');
    $crit->setProperty('order', 'id');

    $repos = new Repository('Produto');

    $produtos = $repos->load($crit);
    if($produtos)
    {
        print "Produtos <br>\n";
        foreach ($produtos as $produto) {
            print " ID: {$produto->id}";
            print " - Descrição: {$produto->descricao}";
            print " - Estoque: {$produto->estoque}";
            print "<br>\n";
        }
    }

    Transaction::close();
}
catch (Exception $e)
{
    Transaction::rollback();
    print $e->getMessage();
}
