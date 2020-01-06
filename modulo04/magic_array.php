<?php

class Titulo
{
    private $data;

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
        print "Propriedade <b>{$name}</b> com o valor <b>{$value}</b><br>";
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    public function __unset($name)
    {
        if(isset($this->data[$name])) {
            unset($this->data[$name]);
            print "<br><br>Deu certo<br><br>";
            return true;
        } else {
            print "<br><br>Não Deu certo<br><br>";
            return false;
        }
    }
}

$tit2 = new Titulo;
$tit2->valor = "100";
$tit2->RogerioOTestador = "\"Confere ou não confere\"";
print "<pre>";

print "<br><br>{$tit2->RogerioOTestador}<br><br>";
var_dump($tit2);

print "<br><br>";
if(isset($tit2->RogerioOTestador)) {
    print "<br><br>...Tem valor...<br>";
} else {
    print "<br><br>...Não Tem valor...<br>";
}

unset($tit2->valor);