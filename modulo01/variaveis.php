<?php
/* 
$nome = 'João';
$sobrenome = 'Silva';

print $nome . ' ' . $sobrenome;

$nome_completo = $nome . ' ' . $sobrenome;
print $nome_completo;

echo "Seu nome é ${nome_completo}";
echo "<br>";
echo "$nome $sobrenome";
echo "O nome dele é $nome e o sobrenome é $sobrenome";

echo "O nome dele é $nome da $sobrenome";

 */

$a = 5;
$b = 4.5;

var_dump($a * $b);


$c = 5;
$d = &$c;

$c = 10;

var_dump($c);
var_dump($d);


$peso = 30;
$multa = ($peso > 25);
var_dump($multa);

if ($multa) {
  echo "Acima do peso";
} else {
  echo "Abaixo de peso";
}


$oNome = 'Lins';
if ($oNome) {
  print "oNome tem conteudo";
} else {
  print "oNome não tem conteudo";
}


if (empty($oNome)) {
  echo "[[[ Mesma parada de oNome, ta vazio o trem ]]]";
} else {
  echo "[[[ Mesma parada de oNome, NAO ta vazio o trem ]]]";
}

$lista = ['vermelho', 'azul', 'verde', 'amarelo'];
var_dump($lista);

$lista2 = ['cor' => 'vermelho', 'peso' => 20];
var_dump($lista2);


$pessoa = new stdClass;
$pessoa->nome = "Rogerio";
$pessoa->idade = 44;
$pessoa->altura = 1.81;
$pessoa->peso = 89;

$pessoa2 = $pessoa;
$pessoa2->nome = "Ricardo";

var_dump($pessoa);
var_dump($pessoa2);
echo "O Sr. {$pessoa->nome} tem {$pessoa->idade} anos e uma altura de {$pessoa->altura}m com peso de {$pessoa->peso}kg";
