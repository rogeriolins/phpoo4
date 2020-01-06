<?php

$dados = ['salmão', 'tilápia','sardinha','badejo', 'pescada', 'dourado','corvina', 'cavala', 'bagre'];

$objArray = new ArrayObject($dados);

print "<pre>";
print_r($objArray);
print "<hr>";

$objArray->append('bacalhau');

foreach ($objArray as $item) {
    print "<br>Item: {$item}";
}

print "<hr>";
print $objArray->offsetGet(2) . "<br>";

print "<hr>";
print $objArray->offsetSet(2, 'linguado');
print "Objetos: {$objArray->count()}";
foreach ($objArray as $item) {
    print "<br>Item: {$item}";
}
print "<hr>";

$objArray->offsetUnset(4);
print "Objetos: {$objArray->count()}";
foreach ($objArray as $item) {
    print "<br>Item: {$item}";
}

print "<hr>";
if($objArray->offsetExists(10)) {
    print "Encontrado o 10<br>";
} else {
    print "Não encontrado o 10<br>";
}

print "<hr>";
if($objArray->offsetExists(4)) {
    print "Encontrado o 4<br>";
} else {
    print "Não encontrado o 4<br>";
}

print "<hr>";
if($objArray->offsetExists(7)) {
    print "Encontrado o 7<br>";
} else {
    print "Não encontrado o 7<br>";
}

print "<hr>";
$objArray->natsort();
foreach ($objArray as $item) {
    print "<br>Item: {$item}";
}

print "<hr>";
print $objArray->serialize();
