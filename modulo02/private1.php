<?php

class Pessoa
{
  private $nome;
  private $endereco;
  private $nasc;
}

$p1 = new injecao1;
$p1->nome = "Rogerio Lins";
$p1->endereco = "Rua tal...";
$p1->nasc = "06 de jan 1975";

print '<pre>';
print_r($p1);
print '</pre>';
