<?php

 require_once "classes/ar/Produto.php";
 require_once "classes/api/Connection.php";

try
{

    $conn = Connection::open("estoque");
    Produto::setConnection($conn);

    $produto = new Produto;
    $produto->descricao = 'Café moido e torrado';
    $produto->estoque = 100;
    $produto->preco_custo = 4;
    $produto->preco_venda = 7;
    $produto->codigo_barras = "321321321";
    $produto->data_cadastro = date("Y-m-d");
    $produto->origem = "N";
    $produto->save();


    $margem = round($produto->getMargemLucro(),2);
    print "Produto: {$produto->descricao} - Margerm de lucro do produto: {$margem}%";

}
Catch (Exception $e)
{
    print $e->getMessage();
}

