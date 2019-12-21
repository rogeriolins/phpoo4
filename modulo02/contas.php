<?php

require_once("classes/Conta.php");
require_once("classes/ContaCorrente.php");
require_once("classes/ContaPoupanca.php");

$cp = new ContaPoupanca("4343", "3121-6", 200);
$cc = new ContaCorrente("4343", "4753-8", 1200, 500);

echo "<pre>";
/* Testes */
$cp->saldo();
$cp->depositar(300);
$cp->depositar(1300);
$cp->retirar(150);
$cp->retirar(2500);
$cp->retirar(1650);

print "<hr>";

$cc->saldo();
$cc->retirar(1400);
$cc->depositar(300);
$cc->retirar(3000);
$cc->retirar(600);
echo "</pre>";
