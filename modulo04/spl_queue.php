<?php

$ingredientes = new SplQueue();

$ingredientes->enqueue("Peixe");
$ingredientes->enqueue("Sal");
$ingredientes->enqueue("Limão");

print "<pre>";
//print_r($ingredientes);
foreach ($ingredientes as $item) {
    print "<br>Item: {$item}";
}
print "<hr>";

foreach ($ingredientes as $item) {
    print "<br>Quantidade de elementos na fila: {$ingredientes->count()}";
    print "<br>Item: {$item}";
    $ingredientes->dequeue();
    print "<hr>";
}