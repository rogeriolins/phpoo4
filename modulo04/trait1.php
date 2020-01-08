<?php

    require_once "classes/Produto.php";

$x = new Produto();
$x->preco = 10;
$x->nome = "Chocolate";
print $x->save();
print "<hr>";
print $x->delete(10);
print "<hr>";
print $x->load(10);

//print $x->nome;