<?php

    $ingredientes = new SplStack();
    $ingredientes->push('Peixe');
    $ingredientes->push('Sal');
    $ingredientes->push('Limão');

    print "Itens no conceito FIFO (First In - First Out)<hr>";
    foreach ($ingredientes as $item){
        print "<br>Item: {$item}";
        print "<br>Quantidade: {$ingredientes->count()}<br>";
    }

    foreach ($ingredientes as $item){
        print "<br>Item: {$item}";
        print "<br>Quantidade: {$ingredientes->count()}<br>";
        print "<br>Removendo: {$ingredientes->pop()}<br>";
    }