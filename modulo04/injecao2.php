<?php

require_once 'classes/Record.php';

interface ExporterInterface
{
    public function export($dados);
}


class JSONExporter implements ExporterInterface
{
    public function export($dados)
    {
        return json_encode($dados);
    }
}


class JSONExporter2 implements ExporterInterface
{
    public function exports($dados)
    {
        return json_encode($dados);
    }
}


class Pessoa extends Record
{
    const TABLENAME = 'pessoas';

    public function exporter(ExporterInterface $exporter)
    {
        return $exporter->export($this->dados);
    }
}

$p = new Pessoa;
$p->nome = 'Maria';
$p->endereco = 'Rual tal';
$p->numero = '123';
print $p->exporter( new JSONExporter );