<?php

require_once("classes/Conta.php");
require_once("classes/ContaCorrente.php");
require_once("classes/ContaPoupanca.php");

print "<h1>Gestão de contas</h1>";

$contas = [];
$contas[] = new ContaCorrente("4343", "4753-8", 10000, 5000);
$contas[] = new ContaPoupanca("4343", "3121-6", 3500);

foreach ($contas as $conta) {
  if ($conta instanceof Conta) {
    $conta->depositar(500);
    $conta->retirar(5600);
    $conta->retirar(4300);
    $conta->retirar(3500);
  }
}
