<?php


class Record
{

    protected $dados;

    public function __set($propriedade, $valor)
    {
        $this->dados[$propriedade] = $valor;
    }

    public function __get($propriedade)
    {
        return $this->dados[$propriedade];
    }

    public function save()
    {
        return "insert into " . $this::TABLENAME ."(" . implode(',', array_keys($this->dados))
                    . ") values ( \"" .
                    implode('","', array_values($this->dados))
                    . "\")";
    }

    public function delete($id)
    {
        return "delete from " . $this::TABLENAME . " where id={$id}";
    }

    public function load($id)
    {
        return "select " . implode(',', array_keys($this->dados)) . " from " . $this::TABLENAME . " where id={$id}";
    }

}