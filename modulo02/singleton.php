<?php

require_once("classes/Preferencias.php");

echo "<pre>";

$p1 = Preferencias::getInstance();
$p2 = Preferencias::getInstance();

print "A linguagem é: {$p1->getData('language')}";
print "<br>";
$p1->setData('language', 'pt-br');
$p2->save();
print "A linguagem é: {$p2->getData('language')}";

print "<hr>";
var_dump($p1, $p2);

echo "</pre>";
