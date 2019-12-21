<?php

require_once("classes/Fabricante.php");
require_once("classes/Produto.php");

$p1 = new Produto("Chocolatey", 10, 7);
$f1 = new Fabricante("Nestle SA", "Rua tal...", "02.031.477/0001-01");

$p1->setFabricante($f1);

echo "O Fabricante do produto {$p1->getDescricao()} é {$p1->getFabricante()->getNome()}";

// echo "<pre>";
// var_dump($p1, "<hr>", $f1);
// // var_dump($f1);
// echo "</pre>";
