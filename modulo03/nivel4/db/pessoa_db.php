<?php

 function get_pessoa($id)
 {
     $conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=livro', 'root', '');
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $result = $conn->query("select id, nome, endereco, bairro, telefone, email, id_cidade from pessoa where id='{$id}'");
     if ($result) {
        $row = $result->fetchObject();
     } else {
        $row = new stdClass();
     }
     $conn = null;
     return $row;
 }

 function exclui_pessoa($id)
 {
     $conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=livro', 'root', '');
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     /* DELETAR */
     $result = $conn->query("delete from pessoa where id='{$id}'");
     $conn = null;
     return $result;
 }

 function insert_pessoa($pessoa)
{
    $conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=livro', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "insert into pessoa (id, nome, endereco, bairro, telefone, email, id_cidade)
                    values ( '{$pessoa->id}',
                             '{$pessoa->nome}',
                             '{$pessoa->endereco}',
                             '{$pessoa->bairro}',
                             '{$pessoa->telefone}',
                             '{$pessoa->email}',
                             '{$pessoa->id_cidade}'
                      )";
    $result = $conn->query($sql);
    $conn = null;
    return $result;
}

function update_pessoa($pessoa)
{
    $conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=livro', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "update pessoa set
                        nome      = '{$pessoa->nome}',
                        endereco  = '{$pessoa->endereco}',
                        bairro    = '{$pessoa->bairro}',
                        telefone  = '{$pessoa->telefone}',
                        email     = '{$pessoa->email}',
                        id_cidade = '{$pessoa->id_cidade}'
                    where
                        id        = '{$pessoa->id}'";
    $result = $conn->query($sql);
    $conn = null;
    return $result;
}

function lista_pessoa()
{
    $conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=livro', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $result = $conn->query("select id, nome, endereco, bairro, telefone, email, id_cidade from pessoa order by id desc");
    if ($result) {
        $row = $result->fetchAll();
    } else {
        $row[] = "";
    }
    $conn = null;
    return $row;
}

function get_next_pessoa()
{
    $conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=livro', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $result = $conn->query("select max(id) as next from pessoa");
    $next = 0;
    if ($result) {
        $row = $result->fetchObject();
        if ($row->next > 0) {
            $next = $row->next;
        }
    }
    $next = (int) $next + 1;
    $conn = null;
    return $next;
}
