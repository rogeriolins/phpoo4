<?php

$myXML = simplexml_load_file('paises4.xml');

foreach ($myXML->estados->estado as $estado) {

    foreach ( $estado->attributes() as $atributos => $valor ) {
        print "<br>\"{$atributos}\": \"$valor\"";
    }
    print "<br>";
}