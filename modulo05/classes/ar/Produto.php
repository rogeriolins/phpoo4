<?php


class Produto
{

    private $dataBase;
    private static $conn;

    public function __get($name)
    {
        return $this->dataBase[$name];
    }

    public function __set($name, $value)
    {
        $this->dataBase[$name] = $value;
    }

    public static function setConnection(PDO $conn)
    {
        self::$conn = $conn;
    }

    public static function find($id, $class = __CLASS__ )
    {
        $sql = "select * from produto where id = '{$id}'";
        print "{$sql} <br>";
        $result = self::$conn->query($sql);
        return $result->fetchObject( $class );
    }

    public static function all($filter = "", $class = __CLASS__)
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

    public static function delete()
    {
        $sql = "delete from produto where id = '{$this->id}'";
        print "{$sql} <br>";
        return self::$conn->query($sql);
    }

    public static function save()
    {
        if(empty($this->dataBase['id']))
        {
            $id = $this->getLastId() +1;
            $sql = "insert into 
                        produto 
                            (id, descricao, estoque, preco_custo, preco_venda, codigo_barras, data_cadastro, origem)
                        values
                            ( '{$id}', 
                              '{$this->descricao}',
                              '{$this->estoque}',
                              '{$this->preco_custo}',
                              '{$this->preco_venda}',
                              '{$this->codigo_barras}',
                              '{$this->data_cadastro}',
                              '{$this->origem}'
                            )";
        } else {
            $sql = "update 
                        produto set 
                            descricao     = '{$this->descricao}',
                            estoque       = '{$this->estoque}', 
                            preco_custo   = '{$this->preco_custo}', 
                            preco_venda   = '{$this->preco_venda}',
                            codigo_barras = '{$this->codigo_barras}',
                            data_cadastro = '{$this->data_cadastro}', 
                            origem        = '{$this->origem}' 
                        where 
                            id= '{$this->id}'";
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

    /* Metodo de negocio*/
    public function getMargemLucro()
    {
        return ( ($this->preco_venda - $this->preco_custo) / $this->preco_custo) * 100;
    }

    /* Metodo de negocios */
    public function registraCompra($custo, $quantidade)
    {
        $this->preco_custo = $custo;
        $this->estoque += $quantidade;
    }

    public function show($orientacao = 'H')
    {
        if($orientacao=='V') {
            print "<br>    
                           Codigo: <b>{$this->dataBase['id']}</b>
                        Descricao: <b><u>{$this->dataBase['descricao']}</u></b>
                          Estoque: <b>{$this->dataBase['estoque']}</b>
                   Preço de Custo: <b>{$this->dataBase['preco_custo']}</b>
                   Preço de Venda: <b>{$this->dataBase['preco_venda']}</b>
                 Codigo de Barras: <b>{$this->dataBase['codigo_barras']}</b>
                 Data de Cadastro: <b>{$this->dataBase['data_cadastro']}</b>
                Origem do Produto: <b>{$this->dataBase['origem']}</b><br>
                   ";
        } else {
            print "{$this->dataBase['id']}</b>  -  <b><u>{$this->dataBase['descricao']}</u></b> - <b>{$this->dataBase['estoque']}</b>  -  <b>{$this->dataBase['preco_custo']}</b> -  <b>{$this->dataBase['preco_venda']}</b>  -  <b>{$this->dataBase['codigo_barras']}</b>  -  <b>{$this->dataBase['data_cadastro']}</b>  -  <b>{$this->dataBase['origem']}</b><br>";
        }
    }

}