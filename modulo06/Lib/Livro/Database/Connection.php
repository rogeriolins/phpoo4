<?php

namespace Livro\Database;

use PDO;
use Exception;

final class Connection
{

    private function __construct() {}

    public static function open($name)
    {
        if(file_exists("App/Config/{$name}.ini"))
        {
            $db = parse_ini_file("App/Config/{$name}.ini");
        } else {
            throw new Exception("Arquivo '{$name}.ini' não encontrado!");
        }

        $user = isset($db['user']) ? $db['user'] : null;
        $pass = isset($db['pass']) ? $db['pass'] : null;
        $name = isset($db['name']) ? $db['name'] : null;
        $host = isset($db['host']) ? $db['host'] : null;
        $type = isset($db['type']) ? $db['type'] : null;

        switch ($type)
        {
            case 'pgsql':
                $port = isset($db['port']) ? $db['port'] : '5432';
                $conn = new PDO("pgsql:dbname={$name}; user={$user}; password={$pass}; host={$host}; port={$port}");
                break;
            case 'mysql':
                $port = isset($db['port']) ? $db['port'] : '3306';
                $conn = new PDO("mysql:host={$host}; port={$port}; dbname={$name}, {$user}, {$pass}");
                break;
            case 'sqlite':
                $conn = new PDO("sqlite:{$name}");
                $conn->query('PRAGMA foreign_keys = ON');
                break;
        }
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
}