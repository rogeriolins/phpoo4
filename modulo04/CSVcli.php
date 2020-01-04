<?php

    require_once 'classes/CSVParser.php';

    $csv = new CSVParser('familiaX.csv', ';');
    $csv->parse();

    echo "<pre>";


    try {
        while ($family = $csv->fetch())
        {
//        var_dump($family);
            print "Nome: <b>{$family['Nome']}</b><br>Telefone: {$family['Telefone']}<br>Idade: {$family['Idade']} anos<br>Sexo: {$family['Sexo']} <hr><br>";
        };
    } catch (Exception $e) {
        print $e->getMessage();
    }
