<?php


class VendaMapper
{

    private static $Conn;

    public static function setConnection( PDO $Conn )
    {
        self::$Conn = $Conn;
    }

    public static function save(Venda $venda)
    {
        $dataHoje = date('Y-m-d');
        $sql = "insert into venda (data_venda) values ('{$dataHoje}')";
        print "{$sql} <br>";
        self::$Conn->query($sql);

        $id = self::getLastId();
        $venda->setId($id);

        foreach ($venda->getItens() as $item)
        {
            $quantidade = $item[0];
            $produto    = $item[1];
            $preco      = $produto->preco;
            $sql = "insert into item_venda (id_venda, id_produto, quantidade, preco) 
                                values ('{$id}', '{$produto->id}', '{$quantidade}', '{$preco}')";
            print "{$sql} <br>";
            self::$Conn->query($sql);
        }
    }

    public static function getLastId()
    {
        $sql = "select max(id) as max from venda";
        print "{$sql} <br>";
        return self::$Conn->query($sql)->fetchObject()->max;
    }


}