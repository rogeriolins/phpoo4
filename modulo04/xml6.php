<?php

    $myXML = simplexml_load_file('paises3.xml');

    print "<b>Original</b><br>Retornando o objeto do XML sendo:
            <br>Pais: <b>{$myXML->nome}</b>
            <br>Idioma: <b>{$myXML->idioma}</b>
            <br>Capital: <b>{$myXML->capital}</b>
            <br>Moeda: <b>{$myXML->moeda}</b>
            <br>Prefixo: <b>{$myXML->prefixo}</b>
            <br>Sigla: <b>{$myXML->sigla}</b>
            <br>Geografia (Clima): <b>{$myXML->geografia->clima}</b>
            <br>Geografia (Costa): <b>{$myXML->geografia->costa}</b>
            <br>Geografia (Pico): <b>{$myXML->geografia->pico}</b>
            <br>Estado: <b>{$myXML->estados->nome[0]}</b>
            
            <hr>";

    foreach ($myXML->estados->nome as $estado) {
        print "<br>Estado: {$estado} ";
    }



