<?php

 $myXML = simplexml_load_file('paises2.xml');

print "<b>Original</b><br>Retornando o objeto do XML sendo:
            <br>Pais: <b>{$myXML->nome}</b>
            <br>Idioma: <b>{$myXML->idioma}</b>
            <br>Capital: <b>{$myXML->capital}</b>
            <br>Moeda: <b>{$myXML->moeda}</b>
            <br>Prefixo: <b>{$myXML->prefixo}</b>
            <br>Sigla: <b>{$myXML->sigla}</b>
            <br>Geografia (Clima): <b>{$myXML->geografia->clima}</b>
            <br>Geografia (Costa): <b>{$myXML->geografia->costa}</b>
            <br>Geografia (Pico): <b>{$myXML->geografia->pico}</b><hr>";

 $myXML->moeda = ' Novo Real (NR$) ';
 $myXML->geografia->clima = ' Quente de lascar o cocoruco ';

 $myXML->addChild('Presidente', 'Não contavam com minha astucia...');

print "<b>Modificado</b><br>Retornando o objeto do XML sendo:
            <br>Pais: <b>{$myXML->nome}</b>
            <br>Idioma: <b>{$myXML->idioma}</b>
            <br>Capital: <b>{$myXML->capital}</b>
            <br>Moeda: <b>{$myXML->moeda}</b>
            <br>Prefixo: <b>{$myXML->prefixo}</b>
            <br>Sigla: <b>{$myXML->sigla}</b>
            <br>Geografia (Clima): <b>{$myXML->geografia->clima}</b>
            <br>Geografia (Costa): <b>{$myXML->geografia->costa}</b>
            <br>Geografia (Pico): <b>{$myXML->geografia->pico}</b>
            <br>Presidente: <b>{$myXML->Presidente}</b><hr>";

file_put_contents('novoPaises2.xml', $myXML->asXML());
