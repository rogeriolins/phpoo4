<?php

namespace Livro\Database;

class Transaction
{
    private static $logger;
    private static $conn;
    private function __construct() {}

    public static function open($database)
    {
        self::$conn = Connection::open($database);
        self::$conn->beginTransaction();
    }

    public static function close()
    {
        if(self::$conn)
        {
            self::$conn->commit();
            self::$conn = null;
        }
    }

    public static function get()
    {
        return self::$conn;
    }

    public static function rollback()
    {
        if(self::$conn)
        {
            self::$conn->rollback();
            self::$conn = null;
        }
    }

    public static function setLogger(Logger $logger)
    {
        self::$logger = $logger;
    }

    public static function log($messanger)
    {
        if (self::$logger) {
            self::$logger->write($messanger);
        }
    }

}