<?php

class Produto
{
  private $descricao;
  private $estoque;
  private $preco;

  function __construct($descricao, $estoque, $preco)
  {
    $this->setDescricao($descricao);
    $this->setEstoque($estoque);
    $this->setPreco($preco);
    print "O produto {$this->getDescricao()} tem {$this->getEstoque()}un e custa {$this->getPreco()}<br>";
  }

  function __destruct()
  {
    print "<pre>";
    print "<hr>";
    print "Objeto {$this->getDescricao()}: DESTRUIDO<br>";
    var_dump($this);
    print "</pre>";
  }


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
    $quantidade_anterior = $this->getEstoque();
    if (is_numeric($valor) and $valor > 0) {
      $this->estoque = $valor;
    }
    if ($quantidade_anterior > 0) {
      print "O Produto {$this->getDescricao()} mudou a quantidade de estoque de {$quantidade_anterior} para {$this->getEstoque()}";
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
    $valor_antigo = $this->preco;
    if (is_numeric($valor) and $valor > 0) {
      $this->preco = $valor;
    }
    $this->precoModifica($valor_antigo, $valor);
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
    $valor_antigo = $this->getPreco();
    if (is_numeric($percentual) and $percentual >= 0) {
      $this->preco *= (1 + ($percentual / 100));
    }
    $this->precoModifica($valor_antigo, $this->preco, $percentual);
  }

  function precoModifica($valor_antigo, $valor_novo, $percentual = 0)
  {
    if ($valor_antigo > 0) {
      print "O Produto {$this->getDescricao()} mudou seu valor de {$valor_antigo} para {$valor_novo}";
    }
    if ($percentual > 0) {
      print " e o percentual aplicado foi de {$percentual}%";
    }
    print "<br>";
  }
}

$p1 = new Produto('Chocolate', 10, 5);
$p1->percentualPreco(50);

$p2 = new Produto('Café', 5, 10);
$p2->setEstoque(19);
