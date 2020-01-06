<?php

class Produto
{
  public $descricao;
  public $estoque;
  public $preco;

  function __construct()
  { }
}

$p1 = new Produto();
$p1->descricao = 'Chocolate';
$p1->estoque = 10;
$p1->preco = 5;

$p2 = new Produto();
$p2->descricao = 'Cafe';
$p2->estoque = 20;
$p2->preco = 10;

print $p1->descricao;
print "<pre>";
var_dump($p1);
var_dump($p2);
print "</pre>";
