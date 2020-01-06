<?php


class Cidade
{
    private static $conn;

    public static function getConnection()
    {
        if( empty(self::$conn) )
        {
            $ini = parse_ini_file('config/livro.ini');
            $host = $ini['host'];
            $base = $ini['name'];
            $port = $ini['port'];
            $user = $ini['user'];
            $pass = $ini['pass'];
            self::$conn = new PDO("mysql:host={$host};port={$port};dbname={$base}", "{$user}", "{$pass}");
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$conn;
    }

    public static function all()
    {
        $conn = self::getConnection();
        $result = $conn->query("select * from cidade order by id desc");
        return $result->fetchAll();
    }

    public static function getCidade($id)
    {
        $conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=livro', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $conn->query("select nome from cidade where id='{$id}'");
        return ucfirst( strtolower( $result->fetchObject()->nome ) );
    }

}