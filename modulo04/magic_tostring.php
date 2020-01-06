<?php

class Titulo
{
    private $valor;
    private $vencimento;

    public function __construct($valor,$vencimento)
    {
        $this->valor = $valor;
        $this->vencimento = $vencimento;
    }

    public function __toString()
    {
        return "Valor: <span style='color: blue;'><b>R$" . number_format($this->valor,2,',','.') . "</b></span> - Vencimento: <b>{$this->vencimento}</b>";
    }

}

$tit = new Titulo(1500000,"06/01/2021");
print "<pre>";
var_dump( $tit );
print "<br>";
print $tit;