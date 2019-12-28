<?php


class Pessoa
{

    public static function find($id)
    {
        $conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=livro', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $conn->query("select * from pessoa where id='{$id}'");
        return $result->fetchObject();
    }

    public static function delete($id) {
        $conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=livro', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $conn->query("delete from pessoa where id='{$id}'");
        return $result;
    }

    public static function all()
    {
        $conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=livro', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $conn->query("select * from pessoa order by id desc");
        return $result->fetchAll();
    }

    public static function save($pessoa) {
        $conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=livro', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /* SE EXISTE ID NÃO É UM REGISTRO NOVO */
        if(empty($pessoa->id)){
            /* Consulta proximo registro */
            $result = $conn->query("select max(id) as next from pessoa");
            $next = 0;
            if ($result) {
                $row = $result->fetchObject();
                if ($row->next > 0) {
                    $next = $row->next;
                }
            }
            $pessoa->id = (int) $next + 1;
            $sql = "insert into pessoa (id, nome, endereco, bairro, telefone, email, id_cidade)
                    values ( '{$pessoa->id}',
                             '{$pessoa->nome}',
                             '{$pessoa->endereco}',
                             '{$pessoa->bairro}',
                             '{$pessoa->telefone}',
                             '{$pessoa->email}',
                             '{$pessoa->id_cidade}'
                      )";
        } else {
            $sql = "update pessoa set
                        nome      = '{$pessoa->nome}',
                        endereco  = '{$pessoa->endereco}',
                        bairro    = '{$pessoa->bairro}',
                        telefone  = '{$pessoa->telefone}',
                        email     = '{$pessoa->email}',
                        id_cidade = '{$pessoa->id_cidade}'
                    where
                        id        = '{$pessoa->id}'";
        }
        $result = $conn->query($sql);
        $conn = null;
    }

}