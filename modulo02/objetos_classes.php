<?php

class Funcionario
{
  public $nome;
  public $salario;
  public $departamento;
  private $ferias;
  protected $genero;
  public function __destruct()
  {
    print "<br>";
  }
}

class Estagiario extends Funcionario
{
  public $bolsa;
  private $vale_transporte;
  protected $valeSonho;
}

print "<pre>";

$jose = new Funcionario;
$joao = new Estagiario;

print_r(get_class($jose));
print "<br>";
print_r(get_class($joao));
print "<br>";
print_r("\$jose: " . get_parent_class($jose));
print "<br>";
print_r("\$joao: " . get_parent_class($joao));
print "<br>";
print_r("Funcionario: " . get_parent_class("Funcionario"));
print "<br>";
print_r("Estagiario: " . get_parent_class("Estagiario"));
print "<br>";

/* $joao é uma classe filha de Funcionario? */
var_dump(is_subclass_of($joao, "Funcionario"));

/* $jose é uma classe filha de Funcionario? */
var_dump(is_subclass_of($jose, "Funcionario"));

/* $joao é uma classe filha de Estagiario? */
var_dump(is_subclass_of($joao, "Estagiario"));

/* $jose é uma classe filha de Estagiario? */
var_dump(is_subclass_of($jose, "Estagiario"));

/* A classe Estagiario é uma classe filha de Funcionario? */
var_dump(is_subclass_of("Estagiario", "Funcionario"));


print "</pre>";
