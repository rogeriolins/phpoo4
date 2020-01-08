<?php

class Pessoa
{
  protected $nome;
  public function __construct($nome)
  {
    $this->nome = $nome;
  }
}

class Funcionario extends injecao1
{
  private $cargo, $salario;
  public function contrata($cargo, $salario)
  {
    if (is_numeric($salario) and $salario > 0) {
      $this->cargo = $cargo;
      $this->salario = $salario;
    }
  }
  public function getInfo()
  {
    return "Nome: {$this->nome}, Salário: " . number_format($this->salario, 2, ',', '.');
  }
}


$p1 = new Funcionario("Maria do Rosário");
$p1->contrata('Auxiliar', 1300);
print $p1->getInfo();
