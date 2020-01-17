<?php


class Criteria
{

    private $filters;
    private $properties;

    public function __construct()
    {
        $this->filters = [];
        $this->properties = [];
    }

    public function add($variavel, $comparador, $valor, $operador_logico = 'and')
    {
        if (empty($this->filters))
        {
            $operador_logico = null;
        }
        $this->filters[] = [$variavel, $comparador, $this->transform($valor), $operador_logico];
    }

    public function transform($valor)
    {
        if(is_array($valor))
        {
            foreach ($valor as $xxx)
            {
                if(is_integer($xxx))
                {
                    $foo[] = $xxx;
                } elseif ( is_string($xxx)) {
                    $foo[] = "'{$xxx}'";
                }
            }
            $resultado = '(' . implode(',', $foo) . ')';
        } elseif (is_string($valor)) {
            $resultado = "'{$valor}'";
        } elseif (is_null($valor)) {
            $resultado = 'NULL';
        } elseif (is_bool($valor)) {
            $resultado = $valor ? 'TRUE' : 'FALSE';
        } else {
            $resultado = $valor;
        }
        return $resultado;
    }

    public function dump()
    {
        if (is_array($this->filters) and count($this->filters) > 0){
            $resultado = "";
            foreach ($this->filters as $filter) {
                $resultado .= "{$filter[3]} {$filter[0]} {$filter[1]} {$filter[2]} ";
            }
            $resultado = trim($resultado);
            return "({$resultado})";
        }
    }

    public function setProperty($property, $value) {
        $this->properties[$property] = $value;
    }

    public function getProperty($property) {
        if(isset($this->properties[$property])) {
            return $this->properties[$property];
        }
    }


}