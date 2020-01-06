<?php

class Veiculo
{
    protected $ano;
    protected $cor;
    protected $marca;
    protected $parts;

    public function getParts() {}
    public function setMarca() {}

}

class Automovel extends Veiculo
{

    private $placa;
    const RODAS=4;

    public function setPlaca($placa) {}
    public function getPlaca() {}

}
