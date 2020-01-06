<?php

class Titulo
{
    private $dt;
    private $val;
    private $data;

    public function __construct($dt, $val)
    {
        $this->dt = $dt;
        $this->val = (int) $val;
        print "<br>..<b>Metodo construtor chamado</b>..<br>";
    }

    public function __destruct()
    {
        print "<br>..<b>Metodo destrutor chamado</b>..<br>";
    }

    public function setValor($valor)
    {
        $this->val = (int) $valor;
    }

    public function setDt($dt)
    {
        $this->dt = $dt;
    }

    public function __get($name)
    {
        if($name=='test'){
            return $this->val * 1.2;
        }
        print "<br>...Tentou acessar a propriedade <b>{$name}</b>...<br>";
    }

    public function __set($name, $value)
    {
        if($name=='val') {
            print "<br>...{$this->val}...<br>";
            return true;
        }
        print "<br>...Tentou acessar a propriedade <b>{$name}</b> com o valor <b>{$value}</b>...<br>";
    }

}

$tit1 = new Titulo("06/01/1975", 45);
print "<pre>";
var_dump($tit1);

print "<br>";
$tit1->setValor(100);
var_dump($tit1);
print "<br>";
print $tit1->valor;
print "<br>";
print $tit1->test;
print "<br>";
$tit1->val = 200;
$tit1->test = 200;
