<?php

$dados = $_POST;
// print $dados['nome'];

try {
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

  $sql = "insert into pessoa (id, nome, endereco, bairro, telefone, email, id_cidade) 
          values ( '{$next}', 
                   '{$dados['nome']}', 
                   '{$dados['endereco']}',
                   '{$dados['bairro']}',
                   '{$dados['telefone']}',
                   '{$dados['email']}',
                   '{$dados['id_cidade']}'
                )";
  //print "<pre>{$sql}";
  $result = $conn->query($sql);
  $conn = null;
} catch (PDOException $e) {
  print 'Erro: ' . $e->getMessage();
}
header("Location: pessoa_list.php");
