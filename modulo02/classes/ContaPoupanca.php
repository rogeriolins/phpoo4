<?php

/* Classe ContaPoupanca Herdando de Conta */
final class ContaPoupanca  extends Conta
{

  /* Reescrevento a classe contrutora de Conta com o Atributo $limite */
  public function __construct($agencia, $conta, $saldo)
  {
    parent::__construct($agencia, $conta, $saldo);
    $this->saldo();
  }

  /* retirar valor da conta Poupanca */
  public function retirar($valor)
  {
    if ($this->saldo >= $valor) {
      $this->saldo -= $valor;
    } else {
      $valor_formatado = 'R$ ' . number_format($valor, 2, ',', '.');
      $saldo_insuficiente = 'R$ ' . number_format($this->getSaldo(), 2, ',', '.');
      print "<br>Não é possivel retirar o valor {$valor_formatado}, pois o (Saldo) de {$saldo_insuficiente} é insuficiente.";
      return false;
    }
    $valor_formatado = number_format($valor, 2, ',', '.');
    print "<br>Valor Sacado da Poupança: R$ {$valor_formatado}";
    self::saldo();
    return true;
  }

  public function extrato()
  {
    $this->saldo();
  }
}
