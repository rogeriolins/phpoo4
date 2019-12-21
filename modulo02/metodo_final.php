<?php

require_once("classes/Conta.php");
require_once("classes/ContaCorrente.php");

class ContaCorrenteEmpresarial extends ContaCorrente
{
  public function retirar($quantia)
  {
    parent::retirar($quantia);
  }
}

$cce1 = new ContaCorrenteEmpresarial("0629", "42081-1", 100, 100);
$cce1->retirar(30);
