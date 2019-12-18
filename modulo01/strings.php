<?php

$name = "Maria";
$lastname = "Socorro";

$NameFull = $name . $lastname;
var_dump($NameFull);

$NameFull2 = "$name $lastname";
var_dump($NameFull2);

$NameFull3 = "{$name} {$lastname}";
var_dump($NameFull3);

print " Exemplo de 'aspas' dentro de aspas duplas";
print "<br>";

print " Exemplo de uso de aspas com \"backslash\" ";
print "<br>";

print " Exemplo de uso de aspas duplas com \"BackSlash\" e variaveis {$NameFull3}! ";
print "<br>";

/* Conversão de caractéres */
print strtoupper(" O nome dela em maiusculo é ${NameFull3}.");
print "<br>";

print strtolower(" O nome dela em minusculo é ${NameFull3}.");
print "<br>";

print strlen($NameFull3);
print "<br>";

/* Uma string de caracteres */
print substr($NameFull3, 5, 4);
print "<br>";

/* Substituir caracteres */
print str_replace('a', 'e', $NameFull3);
print "<br>";
