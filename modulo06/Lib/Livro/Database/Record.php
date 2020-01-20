<?php

namespace Livro\Database;

use Exception;

abstract class Record
{

    protected $data;

    public function __construct($id = null)
    {
        if($id)
        {
            $object = $this->load($id);
            if($object)
            {
                $this->fromArray( $object->toArray() );
            }
        }
    }

    public function __set($propertie, $value)
    {
        if($value===null)
        {
            unset($this->data[$propertie]);
        }
        else
        {
            $this->data[$propertie] = $value;
        }
    }

    public function __get($propertie)
    {
        if(isset($this->data[$propertie]))
        {
            return $this->data[$propertie];
        }
    }

    public function __isset($propertie)
    {
        return isset($this->data[$propertie]);
    }

    public function __clone()
    {
        unset($this->data['id']);
    }

    public function fromArray($data)
    {
        $this->data = $data;
    }

    public function toArray()
    {
        return $this->data;
    }

    public function getEntity()
    {
        $class = get_class($this);
        return constant("{$class}::TABLENAME");
    }

    public function load($id)
    {
        $sql = "select * from {$this->getEntity()} where id=" . (int) $id;
        if( $conn = Transaction::get() )
        {
            Transaction::log($sql);
            $result = $conn->query($sql);
            if($result)
            {
                return $result->fetchObject( get_class($this) );
            }
        } else {
            throw new Exception('Não há transação ativa.');
        }
    }

    public function getLast()
    {
        if( $conn = Transaction::get() )
        {
            $sql = "select max(id) from {$this->getEntity()}";
            Transaction::log($sql);
            $row = $conn->query($sql)->fetch();
            return $row[0];
        } else {
            throw new Exception('Não há transação ativa.');
        }
    }

    public function prepare($data)
    {
        $prepared = array();
        foreach ($data as $key => $value) {
            if(is_scalar($value))
            {
                $prepared[$key] = $this->escape($value);
            }
        }
        return $prepared;
    }

    public function escape($value)
    {
        if(is_string($value) and (!empty($value)))
        {
            /* Adiciona \ em aspas */
            $value = addslashes($value);
            return "'{$value}'";
        } else if (is_bool($value)) {
            return $value ? 'TRUE' : 'FALSE';
        } else if ($value !== '') {
            return $value;
        } else {
            return "NULL";
        }
    }

    public function store()
    {
        if(empty($this->data['id']) or (!$this->load( $this->data['id'] )))
        {
            $prepared = $this->prepare($this->data);
            if( empty($this->data['id']) )
            {
                $this->data['id'] = $this->getLast() +1;
                $prepared['id'] = $this->data['id'];
            }
            $sql = "insert into {$this->getEntity()}" .
                    "(". implode( ",", array_keys($prepared) ) .")" .
                    " values " .
                    "(". implode( ",", array_values($prepared) ) .")";
        } else {
            $prepared = $this->prepare($this->data);
            foreach ($prepared as $column => $value)
            {
                $set[] = "{$column} = {$value}";
            }
            $sql = "update {$this->getEntity()}";
            $sql.= " set " . implode(', ', $set);
            $sql.= " where id = " . (int) $this->data['id'];
        }

        if( $conn = Transaction::get() )
        {
            Transaction::log($sql);
            return $conn->exec($sql);
        } else {
            throw new Exception('Não há transação ativa.');
        }
    }

    public function delete($id = null)
    {
        $id = $id ? $id : $this->data['id'];
        $sql = "delete from {$this->getEntity()} where id=" . (int) $id;
        if( $conn = Transaction::get() )
        {
            Transaction::log($sql);
            return $conn->exec($sql);
        } else {
            throw new Exception('Não há transação ativa.');
        }
    }

    public static function find($id)
    {
        $classname = get_called_class();
        $ar = new $classname;
        return $ar->load($id);
    }

}