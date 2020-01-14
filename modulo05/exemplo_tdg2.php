<?php

    require_once 'classes/tdg/ProdutoGateway.php';
    require_once 'classes/tdg/Produto.php';

    try
    {
        $conn = new PDO('sqlite:database/estoque.db');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        Produto::setConnection($conn);

        foreach( Produto::all() as $prods)
        {
            $prods->delete();
        }


        $prod1 = new Produto;
        $prod1->descricao     = 'Vinho';
        $prod1->estoque       = 10;
        $prod1->preco_custo   = 12;
        $prod1->preco_venda   = 18;
        $prod1->codigo_barras = '123123123';
        $prod1->data_cadastro = date('Y-m-d');
        $prod1->origem        = 'I';
        $prod1->save();

        $prod2 = new Produto;
        $prod2->descricao     = 'Whisk';
        $prod2->estoque       = 5;
        $prod2->preco_custo   = 35;
        $prod2->preco_venda   = 70;
        $prod2->codigo_barras = '123123124';
        $prod2->data_cadastro = date('Y-m-d');
        $prod2->origem        = 'I';
        $prod2->save();

        $prod3 = new Produto;
        $prod3->descricao     = 'Batata Palito';
        $prod3->estoque       = 27;
        $prod3->preco_custo   = 2.5;
        $prod3->preco_venda   = 5.2;
        $prod3->codigo_barras = '123123125';
        $prod3->data_cadastro = date('Y-m-d');
        $prod3->origem        = 'N';
        $prod3->save();


        $outro = Produto::find(1);
        $outro->registraCompra(14,5);
        $outro->save();
        print "<br><br>Margem de Lucro: " . round($outro->getMargemLucro(), 1 ) . "%<br><br>";

        $produtos = Produto::all();
        print "<pre>";
        foreach ($produtos as $prod)
        {
            $prod->show('O');
        }


    }
    catch (Exception $e)
    {
        print $e->getMessage();
    }