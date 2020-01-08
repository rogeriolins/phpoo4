<?php

class Produto
{
  public $descricao;
  public $estoque;
  public $preco;

  /* Metodo para aumtentar o estoque */
  public function aumentarEstoque($unidades)
  {
    if (is_numeric($unidades) and $unidades >= 0) {
      $this->estoque += $unidades;
    }
  }

  /* Metodo para diminuir o estoque */
  public function diminuirEstoque($unidades)
  {
    if (is_numeric($unidades) and $unidades >= 0) {
      $this->estoque -= $unidades;
    }
  }

  /* Metodo para aplicar o percentual no preco */
  public function percentualPreco($percentual)
  {
    if (is_numeric($percentual) and $percentual >= 0) {
      $this->preco *= (1 + ($percentual / 100));
    }
  }
}


$p1 = new Produto;
$p1->descricao = 'Chocolate';
$p1->estoque = 10;
$p1->preco = 8;

print "<pre>";
$p1->aumentarEstoque(10);
var_dump($p1);

$p1->diminuirEstoque(2);
var_dump($p1);

$p1->percentualPreco(50);
var_dump($p1);

print "</pre>";
