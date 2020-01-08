<?php

require_once("classes/Cesta.php");
require_once("classes/Produto.php");

$c1 = new Cesta;

$p1 = new Produto("Chocolatey Branco", 10, 7);
$p2 = new Produto("Café Moinho", 100, 5);
$p3 = new Produto("Mostarda", 50, 3);
$p4 = new stdClass();
$p4->descricao = "Leite";
$p4->estoque = 12;
$p4->preco = 13;

$c1->addItem($p1);
$c1->addItem($p2);
$c1->addItem($p3);
//$c1->addItem($p4);

foreach ($c1->getItens() as $item) {
  print "Item: {$item->getDescricao()}<br>";
}



echo "<pre>";
print_r($p4);
echo "</pre>";
