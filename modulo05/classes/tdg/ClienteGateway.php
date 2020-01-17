<?php


class ClienteGateway
{

    private static $Conn;

    public static function setConnection($Conn)
    {
        self::$Conn = $Conn;
    }

    public static function all($filter = '', $class = __CLASS__)
    {
        $sql = "select * from clientes";
        if($filter){
            $sql = "{$sql} where {$filter}";
        }
        print "<!--  {$sql} -->";
        $result = self::$Conn->query($sql);
        return $result->fetchAll( PDO::FETCH_CLASS, $class);
    }

    public function find($id, $class = __CLASS__)
    {
//        return $result->fetchObject($class);
        $sql = "select * from clientes where id={$id}";
        print "<!--  {$sql} -->";
        $result = self::$Conn->query($sql)->fetchObject($class);
        return $result;
    }

}