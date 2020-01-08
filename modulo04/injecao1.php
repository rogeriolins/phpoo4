<?php

require_once 'classes/Record.php';

class JSONExporter
{
    public function export($dados)
    {
        return json_encode($dados);
    }
}

class Pessoa extends Record
{
    const TABLENAME = 'pessoas';

    public function toJSON()
    {
        $je = new JSONExporter;
        return $je->export($this->dados);
    }
}

$p = new Pessoa;
$p->nome = 'Maria';
$p->endereco = 'Rual tal';
$p->numero = '123';
print $p->toJSON();