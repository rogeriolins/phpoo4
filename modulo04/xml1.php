<?php

  $paises = simplexml_load_file('paises.xml');

  print "Retornando o objeto do XML sendo: 
            <br>Pais: <b>{$paises->nome}</b>
            <br>Idioma: <b>{$paises->idioma}</b>
            <br>Capital: <b>{$paises->capital}</b>
            <br>Moeda: <b>{$paises->moeda}</b>
            <br>Prefixo: <b>{$paises->prefixo}</b>
            <br>Sigla: <b>{$paises->sigla}</b>";

  print "<hr><pre>";
  var_dump($paises);
  print "<hr>";
  print_r($paises);
  print "<hr>";

  foreach ($paises->children() as $elemento => $valor) {
      $valor = trim($valor);
      print "<br>\"{$elemento}\": <b>\"{$valor}\"</b>";
  }