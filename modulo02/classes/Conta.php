<?php

abstract class Conta
{

  protected $agencia;
  protected $conta;
  protected $saldo;

  /* Construtor */
  public function __construct($agencia, $conta, $saldo)
  {
    $this->agencia = $agencia;
    $this->conta = $conta;
    if ($saldo > 0) {
      $this->saldo = $saldo;
    }
  }

  /* Depositar na conta */
  public function depositar($valor)
  {
    if ($valor > 0) {
      $this->saldo += $valor;
    }
    $valor_formatado = number_format($valor, 2, ',', '.');
    print "<br>Deposito de <b>R$ {$valor_formatado}</b> na conta <b>{$this->conta}</b>";
    $this->saldo();
  }

  /* Retorna o SALDO */
  public function getSaldo()
  {
    return $this->saldo;
  }

  /* Retorna a CONTA */
  public function getConta()
  {
    return $this->conta;
  }

  /* Retorna a AGENCIA */
  public function getAgencia()
  {
    return $this->agencia;
  }

  /* Retorna o Saldo */
  public function saldo()
  {
    $theColor = ($this->saldo >= 0 ? "black" : "red");
    $saldoValor = "<font color='{$theColor}'>R$ " . number_format($this->saldo, 2, ',', '.') . "</font>";
    print "<br>- - -<br>Agência: <b>{$this->getAgencia()}</b> - Conta: <b>{$this->getConta()}</b> <br> - Saldo: <b>{$saldoValor}</b><br>";
  }

  /* Metodo abstrato (assinatura) que deve ser implementado em suas filhas */
  abstract function extrato();
}
