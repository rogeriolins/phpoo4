<?php

require_once("classes/Produto.php");
require_once("classes/Caracteristica.php");

$p1 = new Produto('Chocolatey de Ninho', 10, 7);
$p1->addCaracteristica('Cor', 'Branco');
$p1->addCaracteristica('Tamanho', 'Médio');
$p1->addCaracteristica('Peso', 10);


echo "Produto: {$p1->getDescricao()}";
echo "<br>";

foreach ($p1->getCaracteristicas() as $caracteristicas) {
  print "Caracteristica: {$caracteristicas->getNome()} = {$caracteristicas->getValor()}<br>";
}

print "<hr>";
echo "<pre>";
print_r($p1);
echo "</pre>";
