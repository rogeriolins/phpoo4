<?php

// // /* Inicializar vetores */
// // // $Cores = array('Azul', 'Verde', 'Vermelho', 'Amarelo');
// // $Cores = ['Azul', 'Verde', 'Vermelho', 'Amarelo'];

// // var_dump($Cores);

// // $Cores2 = [];
// // $Cores2[] = "Marron";
// // $Cores2[] = "Roxo";
// // $Cores2[] = "Lilás";
// // var_dump($Cores2);

// // $Cores3 = [];
// // $Cores3[1] = "Abobora";
// // $Cores3[5] = "Neon";
// // $Cores3[3] = "Preto";
// // var_dump($Cores3);

// // $Pessoa = [];
// // $Pessoa["nome"] = "Maria";
// // $Pessoa["end"] = "Rua Tal";
// // $Pessoa["idade"] = 44;
// // var_dump($Pessoa);

// // print "<br>";
// // print "A Sra. {$Pessoa['nome']}, tem um filho com {$Pessoa['idade']} anos de idade e mora na rua {$Pessoa['end']}";
// // print "<br>";
// // foreach ($Pessoa as $Chave => $Valor) {
// //   print "A pessoa de chave {$Chave} tem o valor {$Valor}.<br>";
// // }

// // /* Vetor multidimensional */
// // $Carros = [
// //   'palio' => [
// //     'cor' => 'azul',
// //     'marca' => 'fiat',
// //     'ano' => 2002
// //   ],
// //   'corsa' => [
// //     'cor' => 'prata',
// //     'marca' => 'GM',
// //     'ano' => 2003
// //   ]
// // ];

// // print "<br>";
// // print "O veiculo palio tem a cor {$Carros['palio']['cor']} e ano {$Carros['palio']['ano']} ";
// // print "<br>";

// // /* Percorrendo o vetor completo */
// // foreach ($Carros as $modelo => $informacoes) {
// //   foreach ($informacoes as $atributo => $valor) {
// //     print "<br> O Veiculo {$modelo} tem a {$atributo} respresentado por {$valor}";
// //   }
// // }
// // print "<br>";
// // foreach ($Carros as $modelo => $informacoes) {
// //   print "<b>{$modelo}</b><br>";
// //   foreach ($informacoes as $atributo => $valor) {
// //     print "{$atributo}: {$valor}<br>";
// //   }
// // }

// /* Adicionando itens e gerenciado o array */
// $Cores = ['Azul', 'Verde', 'Vermelho', 'Amarelo'];
// array_unshift($Cores, 'Ciano');
// array_push($Cores, 'Magenta');
// var_dump($Cores);

// /* Removendo o primeiro item do vetor */
// array_shift($Cores);
// var_dump($Cores);

// /* Removendo o ultimo item do vetor */
// array_pop($Cores);
// var_dump($Cores);

// /* Invertendo a ordem do vetor */
// $Cores = array_reverse($Cores);
// var_dump($Cores);

// /* Junta vetores */
// $Result = array_merge($Cores, ['Ciano', 'Magenta']);
// var_dump($Result);

// /* Ordenações */
// $Carros = [];
// $Carros[10001] = 'Palio 2002';
// $Carros[73933] = 'Corsa 2003';
// $Carros[82634] = 'Celta 2005';
// $Carros[12838] = 'Uno 1999';
// var_dump($Carros);

// // Perde os indices do vetor
// // sort($Carros); 

// // Mantem os indices do vetor
// // asort($Carros);

// // Ordenar pela chave do vetor
// //ksort($Carros);
// //var_dump($Carros);

// /* Retorna um vetor só com as chaves */
// var_dump(array_keys($Carros));

// /* Retorna um vetor só com os valores */
// var_dump(array_values($Carros));

// /* Retorna o tamanho do vetor */
// var_dump(count($Carros));

// /* Localiza o item no array e retornar true */
// var_dump(in_array("Celta 2005", $Carros));

/* Implode e Explode */
$Data = "2013-10-20";
$partes = explode('-', $Data);
var_dump($partes);
print $partes[0] . "<br>";

print implode('/', $partes);
