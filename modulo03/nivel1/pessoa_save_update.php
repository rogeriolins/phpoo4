<?php

$dados = $_POST;
// print $dados['nome'];

try {
  $conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=livro', 'root', '');
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "update pessoa set
            nome      = '{$dados["nome"]}', 
            endereco  = '{$dados["endereco"]}', 
            bairro    = '{$dados["bairro"]}', 
            telefone  = '{$dados["telefone"]}', 
            email     = '{$dados["email"]}',
            id_cidade = '{$dados["id_cidade"]}'
          where
            id        = '{$dados["id"]}'";
  //print "<pre>{$sql}";
  $result = $conn->query($sql);
  $conn = null;
} catch (PDOException $e) {
  print 'Erro: ' . $e->getMessage();
}
header("Location: pessoa_list.php");
