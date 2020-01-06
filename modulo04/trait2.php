<?php

require_once "classes/Produto2.php";

$x = new Produto();
$x->preco = 10;
$x->nome = "Chocolate";
$x->estoque = 100;

print $x->save();
print "<hr>";
print $x->delete(10);
print "<hr>";
print $x->load(10);
print "<hr>";
print $x->toJSON();
print "<hr>";
print $x->toXML();