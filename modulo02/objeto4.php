<?php

class Produto
{
  private $descricao;
  private $estoque;
  private $preco;

  /* Definir Descrição  */
  public function setDescricao($descricao)
  {
    if (is_string($descricao)) {
      $this->descricao = $descricao;
    }
  }

  /* Retornar a descricao */
  public function getDescricao()
  {
    return $this->descricao;
  }

  /* Definir o valor de estoque */
  public function setEstoque($valor)
  {
    if (is_numeric($valor) and $valor > 0) {
      $this->estoque = $valor;
    }
  }

  /* Retornar o valor de estoque */
  public function getEstoque()
  {
    return $this->estoque;
  }


  /* Definir o preco */
  public function setPreco($valor)
  {
    if (is_numeric($valor) and $valor > 0) {
      $this->preco = $valor;
    }
  }

  /* Retornar o preco */
  public function getPreco()
  {
    return $this->preco;
  }

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
$p1->setDescricao('Chocolate');
$p1->setEstoque(20);
$p1->setPreco(12);

$p1->percentualPreco(50);

echo "O Estoque de {$p1->getDescricao()} é de {$p1->getEstoque()}un<br>";
echo "O Estoque de {$p1->getDescricao()} custa {$p1->getPreco()}<br>";

print "<pre>";
var_dump($p1);
print "</pre>";
