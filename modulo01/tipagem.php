<?php

/* 

$codigo = 5;
$valor = 5.5;

var_dump($codigo);
var_dump($valor);

var_dump('4' + '5');


 */

function calcula_imc(float $peso, float $altura)
{
  var_dump($peso, $altura);
  return $peso / ($altura * $altura);
}
var_dump(calcula_imc(75, 1.8));
