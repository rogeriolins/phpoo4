<?php

try {
  $conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=livro', 'root', '');
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $result = $conn->query("select codigo, nome from famosos");
  if ($result) {
    while ($row = $result->fetchObject()) {
      print $row->codigo . ' - ' . $row->nome .  '<br>';
    }
  }
} catch (PDOException $e) {
  print 'Erro: ' .  $e->getMessage();
}
