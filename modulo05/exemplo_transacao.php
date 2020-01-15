<?php

 require_once "classes/ar/ProdutoComTransacao.php";
 require_once "classes/api/Connection.php";
 require_once "classes/api/Transaction.php";

try
{

    Transaction::open('estoque');

        $produto = new Produto;
        $produto->descricao = 'Linguiça toscana frimesa';
        $produto->estoque = 40;
        $produto->preco_custo = 9.9;
        $produto->preco_venda = 18.80;
        $produto->codigo_barras = "333222111";
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
