<?php

class ProdutoGateway
{

    private static $conn;

    public static function setConnection(PDO $conn)
    {
        self::$conn = $conn;
    }

    public function all($filter = '', $class = 'stdClass')
    {
        $sql = "select * from produto";
        if($filter)
        {
            $sql = "{$sql} where {$filter}";
        }
        print "{$sql} <br>";
        $result = self::$conn->query($sql);
        return $result->fetchAll( PDO::FETCH_CLASS, $class);
    }

    public function find($id, $class = 'stdClass')
    {
        $sql = "select * from produto where id = '{$id}'";
        print "{$sql} <br>";
        $result = self::$conn->query($sql);
        return $result->fetchObject($class);
    }

    public function delete($id)
    {
        $sql = "delete from produto where id = '{$id}'";
        print "{$sql} <br>";
        return self::$conn->query($sql);
    }

    public function save($data)
    {
        if(empty($data->id))
        {
            $id = $this->getLastId() +1;
            $sql = "insert into 
                        produto 
                            (id, descricao, estoque, preco_custo, preco_venda, codigo_barras, data_cadastro, origem)
                        values
                            ( '{$id}', 
                              '{$data->descricao}',
                              '{$data->estoque}',
                              '{$data->preco_custo}',
                              '{$data->preco_venda}',
                              '{$data->codigo_barras}',
                              '{$data->data_cadastro}',
                              '{$data->origem}'
                            )";
        } else {
            $sql = "update 
                        produto set 
                            descricao     = '{$data->descricao}',
                            estoque       = '{$data->estoque}', 
                            preco_custo   = '{$data->preco_custo}', 
                            preco_venda   = '{$data->preco_venda}',
                            codigo_barras = '{$data->codigo_barras}',
                            data_cadastro = '{$data->data_cadastro}', 
                            origem        = '{$data->origem}' 
                        where 
                            id= '{$data->id}'";
        }
        print "{$sql} <br>";
        return self::$conn->exec($sql);
    }

    public function getLastId()
    {
        $sql = "select max(id) as max from produto";
        $result = self::$conn->query($sql);
        return $result->fetchObject()->max;
    }

}