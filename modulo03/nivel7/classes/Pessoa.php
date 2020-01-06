<?php


class Pessoa
{

    private static $conn;

    public static function getConnection()
    {
        if (empty(self::$conn)) {
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

    public static function find($id)
    {
        $conn = self::getConnection();
        $result = $conn->prepare("select * from pessoa where id=:id");
        $result->execute( [':id' => $id] );
        return $result->fetchObject();
    }

    public static function delete($id) {
        $conn = self::getConnection();

        $result = $conn->prepare("delete from pessoa where id=:id");
        $result->execute( [':id' => $id] );
        return $result;
    }

    public static function all()
    {
        $conn = self::getConnection();
        $result = $conn->query("select * from pessoa order by id desc");
        return $result->fetchAll();
    }

    public static function save($pessoa) {
        $pessoa = (object) $pessoa;
        $conn = self::getConnection();
        /* SE EXISTE ID NÃO É UM REGISTRO NOVO */
        if(empty($pessoa->id)){
            /* Consulta proximo registro */
            $result = $conn->query("select max(id) as next from pessoa");
            $next = 0;
            if ($result) {
                $row = $result->fetchObject();
                if ($row->next > 0) {
                    $next = $row->next +1;
                }
            }
            $sql = "insert into pessoa (id, nome, endereco, bairro, telefone, email, id_cidade)
                    values ( :id,
                             :nome,
                             :endereco,
                             :bairro,
                             :telefone,
                             :email,
                             :id_cidade
                      )";
        } else {
            $sql = "update pessoa set
                        nome      = :nome,
                        endereco  = :endereco,
                        bairro    = :bairro,
                        telefone  = :telefone,
                        email     = :email,
                        id_cidade = :id_cidade
                    where
                        id        = :id";
        }

        $pessoa->id = empty($pessoa->id) ? $next : $pessoa->id;

        $result = $conn->prepare($sql);
        $result->execute(
            [
                ':id'        => $pessoa->id,
                ':nome'      => $pessoa->nome,
                ':endereco'  => $pessoa->endereco,
                ':bairro'    => $pessoa->bairro,
                ':telefone'  => $pessoa->telefone,
                ':email'     => $pessoa->email,
                ':id_cidade' => $pessoa->id_cidade
            ] );
    }

}