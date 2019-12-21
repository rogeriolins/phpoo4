<?php

class Servico implements OrcavelInterface
{
  private $descricao;
  private $preco;

  public function __construct($descricao, $preco)
  {
    $this->descricao = $descricao;
    if (is_numeric($preco) and ($preco >= 0)) {
      $this->preco = $preco;
    }
  }

  public function getPreco()
  {
    return $this->preco;
  }
}
