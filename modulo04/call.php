<?php

class Titulo
{
    public $codigo;
    public $valor;

    public function __call($name, $arguments)
    {
        print "Voce executou o metodo $name com os parametros " . implode($arguments);
        return call_user_func($name, get_object_vars($this));
    }
}

$t1 = new Titulo;
$t1->codigo = 1;
$t1->valor = 100;

print "<pre><br>";
$t1->print_r();
print "<br><br>" . $t1->count();

print "<br><br>" . $t1->json_encode();

