<?php

require_once "classes/Pessoa.php";
require_once "classes/Cidade.php";

class PessoaList
{

    private $html;

    public function __construct()
    {
        $this->html = file_get_contents('html/list.html');
    }
    public function delete($param)
    {
        try {
            $id = (int) $param['id'];
            Pessoa::delete($id);
            header("Location: index.php");
        } catch (Exception $e) {
            print $e->getMessage();
        }

    }

    public function load()
    {
        try {
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
            $this->html = str_replace('{items}', $items, $this->html);
        }
        catch (Exception $e) {
            print $e->getMessage();
        }
    }

    public function show()
    {
        $this->load();
        print $this->html;
    }

}