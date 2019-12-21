<?php

class Funcionario
{
  public $nome;
  public $salario;
  public $departamento;
  private $ferias;
  protected $genero;
}

print "<pre>";

$jose = new Funcionario;
$jose->nome = "Jose Alcantara de Godoi";
$jose->salario = 2000;
$jose->departamento = "Financeiro";



print_r(get_object_vars($jose));

print "</pre>";
