<?php

namespace Livro\Database;

use Exception;

class Repository
{

    private $activeRecord;

    public function __construct($class)
    {
        $this->activeRecord = $class;
    }

    public function load( Criteria $criteria)
    {
        $sql = "select * from " . constant($this->activeRecord . "::TABLENAME");
        if($criteria)
        {
            $expression = $criteria->dump();
            if($expression)
            {
                $sql .= " where {$expression} ";
            }
            $order  = $criteria->getProperty('order');
            $limit  = $criteria->getProperty('limit');
            $offset = $criteria->getProperty('offset');

            if($order) {
                $sql .= " order by {$order} ";
            }

            if($limit) {
                $sql .= " limit {$limit} ";
            }

            if($offset) {
                $sql .= " offset {$offset} ";
            }
        }
        if($conn = Transaction::get())
        {
            Transaction::log($sql);
            $result = $conn->query($sql);
            if($result)
            {
                $results = [];
                while ($row = $result->fetchObject($this->activeRecord))
                {
                    $results[] = $row;
                }
                return $results;
            }

        } else {
            throw new Exception('Não há transações ativas.');
        }

    }

    public function delete( Criteria $criteria)
    {
        $sql = "delete from " . constant($this->activeRecord."::TABLENAME");
        if($criteria)
        {
            $expression = $criteria->dump();
            if($expression)
            {
                $sql .= " where {$expression} ";
            }
        }
        if($conn = Transaction::get())
        {
            Transaction::log($sql);
            return $conn->exec($sql);
        } else {
            throw new Exception('Não há transações ativas.');
        }
    }

    public function count( Criteria $criteria)
    {
        $sql = "select count(*) from " . constant($this->activeRecord."::TABLENAME");
        if($criteria)
        {
            $expression = $criteria->dump();
            if($expression)
            {
                $sql .= " where {$expression} ";
            }
        }
        if($conn = Transaction::get())
        {
            Transaction::log($sql);
            $result = $conn->query($sql);
            if($result)
            {
                $row = $result->fetch();
                return $row[0];
            }
        } else {
            throw new Exception('Não há transações ativas.');
        }
    }
}