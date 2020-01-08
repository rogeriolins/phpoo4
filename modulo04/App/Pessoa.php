<?php

//namespace App;

class Pessoa
{
    private $nome;

    public function __construct($nome = "Cade o nome lindão?")
    {
        $this->nome = $nome;
        print "<hr>Iniciado a classe Pessoa com o parametro nome: <b>{$this->nome}</b>";
    }

    public function __destruct()
    {
        print "<hr>Destruida a classe Pessoa.";
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }
}