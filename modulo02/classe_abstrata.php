<?php

require_once("classes/Conta.php");
require_once("classes/ContaPoupanca.php");
require_once("classes/ContaCorrente.php");

// $conta = new Conta();

//class ContaPoupancaUniversitaria extends ContaPoupanca

$conta1 = new ContaCorrente("0629", "3121-6", 350, 100);
$conta1->extrato();
