<?php

function apresenta($nome)
{
  print "Olá <b>{$nome}</b>, como vai?";
}
apresenta("Rogerio Lins");
print "<br>";

call_user_func("apresenta", "Robinson Lins");
print "<hr>";


class Pessoa
{
  public function se_apresenta($nome)
  {
    print "Olá <b>{$nome}</b>, como vai?";
  }
}

Pessoa::se_apresenta("Ricardo Lins");
print "<br>";

$classe = "Pessoa";
$metodo = "se_apresenta";
$parametro = "Janaina Guimarães";
call_user_func([$classe, $metodo], $parametro);

print "<br>";

$objeto = new Pessoa;
call_user_func([$objeto, $metodo], "Luana Godoi Lins");
