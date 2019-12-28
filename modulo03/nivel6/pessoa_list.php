<?php

    require_once 'classes/Pessoa.php';
    require_once 'classes/Cidade.php';

    try
    {
        /* DELETAR */
        if (!empty($_GET['action']) and $_GET['action'] == 'delete') {
            $id = (int) $_GET['id'];
            Pessoa::delete($id);
        }

        $pessoas = Pessoa::all();
        $items = "";
        foreach ($pessoas as $pessoa)
        {
            $id        = $pessoa['id'];
            $nome      = $pessoa['nome'];
            $endereco  = $pessoa['endereco'];
            $bairro    = $pessoa['bairro'];
            $telefone  = $pessoa['telefone'];
            $id_cidade = Cidade::getCidade( $pessoa['id_cidade'] );
            $item = file_get_contents('html/item.html');
            $item = str_replace('{id}', $id, $item);
            $item = str_replace('{nome}', $nome, $item);
            $item = str_replace('{endereco}', $endereco, $item);
            $item = str_replace('{bairro}', $bairro, $item);
            $item = str_replace('{telefone}', $telefone, $item);
            $item = str_replace('{id_cidade}', $id_cidade, $item);
            $items .= $item;
        }

        $list = file_get_contents('html/list.html');
        $list = str_replace('{items}', $items, $list);
        print $list;

    }
    catch (Exception $e)
    {
        print $e->getMessage();
    }