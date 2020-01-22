<?php
// http://localhost/phpoo4/modulo06/rest.php?class=PessoaService&method=getData&id=1
$location = "http://localhost/phpoo4/modulo06/rest.php";
$parameters = [];
$parameters['class']  = 'PessoaServices';
$parameters['method'] = 'getData';
$parameters['id']     = '1';

$url = $location . '?' . http_build_query($parameters);

print "<pre>";
var_dump( json_decode( file_get_contents($url) ) );