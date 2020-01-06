<?php

class CSVParser
{

    private $filename;
    private $separator;
    private $counter;
    private $data;
    private $header;

    public function __construct($filename, $separator = ',')
    {
        $this->filename = $filename;
        $this->separator = $separator;
        $this->counter = 1;
    }

    public function parse()
    {

//        if( !file_exists($this->filename)){
//            die("Arquivo <b>{$this->filename}</b> não existe.");
//        }
//        if( !is_readable($this->filename)){
//            die("Arquivo <b>{$this->filename}</b> sem permissão de leitura.");
//        }
        if (!file_exists($this->filename)) {
           throw new Exception("Arquivo {$this->filename} não encontrado.");
        }

        if (!is_readable($this->filename)) {
            throw new Exception("Arquivo {$this->filename} sem permissão de acesso.");
        }

        $this->data   = file($this->filename);
        $this->header = str_getcsv($this->data[0], $this->separator);
        return true;
    }

    public function fetch()
    {
        $rowFinish = [];
        if(isset($this->data[$this->counter]))
        {
            $row = str_getcsv($this->data[$this->counter ++],$this->separator);
            foreach ( $row as $key => $value)
            {
                $rowFinish[ $this->header[$key] ] = $value;
            }
            return $rowFinish;
        }
    }

}