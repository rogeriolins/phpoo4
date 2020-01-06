<?php


class Cidade
{
    public static function all()
    {
        $conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=livro', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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