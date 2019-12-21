<?php

$produto = new stdClass;
$produto->descricao = 'Chocolate';
$produto->estoque = 100;
$produto->preco = 7;

$vetor1 = (array) $produto;
$vetor2 = [
  "descricao" => "Café com leite",
  "estoque" => 80,
  "preco" => 4.5
];

$produto2 = (object) $vetor2;

print "<pre>";
var_dump($produto);
print "<hr>";
var_dump($vetor1);
print "<hr>";
var_dump($vetor2);
print "<hr>";
var_dump($produto2);
print "</pre>";
