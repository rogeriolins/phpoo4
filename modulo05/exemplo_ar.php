<?php

require_once 'classes/ar/Produto.php';

try
{

    $conn = new PDO('sqlite:database/estoque.db');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    Produto::setConnection($conn);

    foreach (Produto::all() as $produto)
    {
        if( !is_null($produto->id) ) {
            $produto->delete();
        }
    }

    $prod1 = new Produto();
    $prod1->descricao     = 'Cachaça da boa';
    $prod1->estoque       = 120;
    $prod1->preco_custo   = 1.75;
    $prod1->preco_venda   = 3.50;
    $prod1->codigo_barras = "123123";
    $prod1->data_cadastro = date("Y-m-d");
    $prod1->origem        = "I";
    $prod1->save();



}
catch ( Exception $e )
{
    print $e->getMessage();
}
