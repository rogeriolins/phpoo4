<?php

function lista_combo_cidades($id_cidade = null)
{
  try {
    $conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=livro', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $output = "";
    $result = $conn->query("select id, nome from cidade");
    if ($result) {
      while ($row = $result->fetchObject()) {
        $selected = $id_cidade === $row->id ?  " selected " : " ";
        $output .= "<option {$selected} value='{$row->id}'>{$row->nome}</option>";
      }
      return $output;
    }
    $conn = null;
  } catch (PDOException $e) {
    print 'Erro: ' . $e->getMessage();
  }
}
