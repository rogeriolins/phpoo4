<?php

class Titulo
{
    public $codigo;
    public $valor;
    public function __clone()
    {
        $this->codigo = null;
    }
}

$t1 = new Titulo;
$t1->codigo = 1;
$t1->valor = 100;
$t3 = clone $t1;
$t2 = $t1;

print "<pre>";
print "<br>";
$t2->codigo = 2;


var_dump( $t1 );
var_dump( $t2 );
var_dump( $t3 );
