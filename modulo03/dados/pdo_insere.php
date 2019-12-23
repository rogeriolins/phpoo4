<?php

try {
  // $conn = new PDO('psql:dbname=livro;user=postgres;password=;host=localhost');
  $conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=livro', 'root', '');
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->exec("insert into famosos (codigo, nome) values (8,'Janaina Guimarães')");
  $conn->exec("insert into famosos (codigo, nome) values (9,'Rogerio Lins')");
  $conn->exec("insert into famosos (codigo, nome) values (10,'Robinson Lins')");
  $conn->exec("insert into famosos (codigo, nome) values (11,'Ricardo Lins')");
  $conn->exec("insert into famosos (codigo, nome) values (12,'Maria do Socorro')");
  $conn->exec("insert into famosos (codigo, nome) values (13,'Maurilio Guimaraes')");
  $conn = null;
} catch (PDOException $e) {
  print 'Erro: ' .  $e->getMessage();
}
