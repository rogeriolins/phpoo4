<?php

class Pessoa
{
  private $nome;
  private $endereco;
  private $nasc;

  public function setNome($nome)
  {
    $this->nome = $nome;
  }
  public function setEndereco($endereco)
  {
    $this->endereco = $endereco;
  }
  public function setNasc($nasc)
  {
    $partes = explode('-', $nasc);
    if (count($partes) === 3) {
      /* Verifica a data */
      if (checkdate($partes[1], $partes[2], $partes[0])) {
        $this->nasc = $nasc;
      }
    } else {
      return false;
    }
  }
}

$p1 = new Pessoa;
$p1->setNome("Rogerio Lins");
$p1->setEndereco("Rua tal...");
$p1->setNasc("06 de jan 1975");

print '<pre>';
print_r($p1);
print '</pre>';

$p1->setNasc("1975-01-06");
print '<pre>';
print_r($p1);
print '</pre>';
