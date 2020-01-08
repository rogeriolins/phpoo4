<?php

/* Classe ContaCorrente Herdando de Conta */
class ContaCorrente extends Conta
{
  /* Atributo da Conta Corrente */
  protected $limite;

  /* Reescrevento a classe contrutora de Conta com o Atributo $limite */
  public function __construct($agencia, $conta, $saldo, $limite)
  {
    parent::__construct($agencia, $conta, $saldo);
    $this->limite = $limite;
    $this->saldo();
  }

  /* retirar valor da conta Corrente */
  public final function retirar($valor)
  {
    if (($this->saldo + $this->limite) >= $valor) {
      $this->saldo -= $valor;
    } else {
      $valor_formatado = 'R$ ' . number_format($valor, 2, ',', '.');
      $saldo_insuficiente = 'R$ ' . number_format($this->getSaldo() + $this->limite, 2, ',', '.');
      print "<br>Não é possivel retirar o valor {$valor_formatado}, pois o (Saldo+Limite) de {$saldo_insuficiente} é insuficiente.";
      return false;
    }
    $valor_formatado = number_format($valor, 2, ',', '.');
    print "<br>Valor Sacado da Conta Corrente: R$ {$valor_formatado}";
    self::saldo();
    return true;
  }

  public function getLimite()
  {
    return $this->limite;
  }

  /* Retorna o Saldo */
  public function saldo()
  {
    parent::saldo();
    $limite = 'R$ ' . number_format($this->getLimite(), 2, ',', '.');
    $total = 'R$ ' . number_format($this->getLimite() + $this->getSaldo(), 2, ',', '.');
    print " - Limite: <b>{$limite}</b><br> - Total: <b>{$total}</b><br>";
  }

  public function extrato()
  {
    $this->saldo();
  }
}
