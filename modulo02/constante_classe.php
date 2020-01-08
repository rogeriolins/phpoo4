<?php

class Pessoa
{
  private $nome;
  private $genero;
  const GENEROS = ['M' => 'MASCULINO', 'F' => 'Feminino'];
  public function __construct($nome, $genero)
  {
    $this->nome = $nome;
    $this->genero = $genero;
  }
  public function getNome()
  {
    return $this->nome;
  }
  public function getNomeGenero()
  {
    return self::GENEROS[$this->genero] . "<br>";
  }
}

define('VALOR', 5);
print VALOR . "<br>";
print injecao1::GENEROS['F'];

$p1 = new injecao1("Maria Odete", "F");
$p2 = new injecao1("Marcia Santos", "F");
$p3 = new injecao1("Diego da Silva", "M");

print "<pre>";
var_dump($p1, $p2, $p3);
print $p1->getNomeGenero();
print $p2->getNomeGenero();
print $p3->getNomeGenero();
print "</pre>";
