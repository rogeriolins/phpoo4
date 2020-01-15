<?php


class Produto
{

    private $dataBase;

    public function __get($name)
    {
        return $this->dataBase[$name];
    }

    public function __set($name, $value)
    {
        $this->dataBase[$name] = $value;
    }

}