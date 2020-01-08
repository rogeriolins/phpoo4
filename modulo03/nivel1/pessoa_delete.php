<?php

$dados = $_GET;

try {
  $conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=livro', 'root', '');
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "delete from pessoa where id = '{$dados["id"]}'";
  $result = $conn->query($sql);
  $conn = null;
} catch (PDOException $e) {
  print 'Erro: ' . $e->getMessage();
}
header("Location: pessoa_list.php");
