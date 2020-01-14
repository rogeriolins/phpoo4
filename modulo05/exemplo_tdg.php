<?php

    require_once  'classes/tdg/ProdutoGateway.php';

    try {
        $conn = new PDO("sqlite:database/estoque.db");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        ProdutoGateway::setConnection($conn);

/*
        // Inserindo um produto
        $dados = new stdClass;
        $dados->descricao     = 'Vinho';
        $dados->estoque       = 8;
        $dados->preco_custo   = 12;
        $dados->preco_venda   = 18;
        $dados->codigo_barras = '123123123';
        $dados->data_cadastro = date('Y-m-d');
        $dados->origem        = 'N';

        $produtoG = new ProdutoGateway;
        $produtoG->save($dados);
*/

/*
        // Modificando a quantidade do produto
        $prodQTD = new ProdutoGateway;
        $produto = $prodQTD->find(1);
        $produto->estoque += 2;
        $prodQTD->save($produto);
*/

/*
        // Lista produtos
        $prodLista = new ProdutoGateway;
        foreach ($prodLista->all() as $produto)
        {
            print "{$produto->descricao}<br>";
        }
*/

    }
    catch (Exception $e)
    {
        print $e->getMessage();
    }