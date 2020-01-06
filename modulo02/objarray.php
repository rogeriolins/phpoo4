<?php

$produto = [];
$produto['descricao'] = 'Chocolate com leite';
$produto['estoque'] = 80;
$produto['preco'] = 7.3;

$prod = new stdClass;
foreach ($produto as $chave => $valor) {
  $prod->$chave = $valor;
}

echo "<pre>";
print_r($prod);
var_dump($prod);
echo "</pre>";
