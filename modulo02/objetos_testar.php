<?php

class Funcionario
{
  public $nome;
  public $salario;
  public $departamento;

  public function setSalario()
  { }
  public function getSalario()
  { }
  public function setMetodoBom($parametro)
  {
    return "E não é que existe mesmo {$parametro}...";
  }
}

$joaquim = new Funcionario;

if (method_exists($joaquim, 'setNome')) {
  print "Existe setNome";
} else {
  print "Não Existe setNome";
}

print "<br>";

if (method_exists($joaquim, 'setSalario')) {
  print "Existe setSalario";
} else {
  print "Não Existe setSalario";
}

$metodo = "setMetodoBom";
$parametro = "<b>[E com passagem de parametro]</b>";
if (method_exists($joaquim, $metodo)) {
  $retorno = $joaquim->$metodo($parametro);
  echo "<br>Retorno do metodo dinamico {$metodo}: {$retorno}<br>";
}
