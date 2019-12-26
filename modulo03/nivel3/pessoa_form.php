<?php

/* Acessa o banco de dados */
try {
  $conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=livro', 'root', '');
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $output = "";

  $dados = $_POST;

  if(!$_REQUEST['action']) {
      $row = new stdClass();
      $row->id        = null;
      $row->nome      = "";
      $row->endereco  = "";
      $row->bairro    = "";
      $row->telefone  = "";
      $row->email     = "";
      $row->id_cidade = "";
  } else if( $_REQUEST['action']=='edit' ){
      $id = $_GET['id'];
      $result = $conn->query("select id, nome, endereco, bairro, telefone, email, id_cidade from pessoa where id={$id}");
      if ($result) {
          $row = $result->fetchObject();
      }
  } else {
      /* INSERE */
      if(empty($dados['id'])) {
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
      } else {
           $sql = "update pessoa set
                        nome      = '{$dados["nome"]}',
                        endereco  = '{$dados["endereco"]}',
                        bairro    = '{$dados["bairro"]}',
                        telefone  = '{$dados["telefone"]}',
                        email     = '{$dados["email"]}',
                        id_cidade = '{$dados["id_cidade"]}'
                    where
                        id        = '{$dados["id"]}'";
      }
      $result = $conn->query($sql);
      header("Location: pessoa_list.php");

  }
  $conn = null;

} catch (PDOException $e) {
  print 'Erro: ' . $e->getMessage();
}


require_once("lista_combo_cidades.php");
$cidades = lista_combo_cidades($row->id_cidade);

$form = file_get_contents('html/form.html');
$form = str_replace('{id}', $row->id, $form);
$form = str_replace('{nome}', $row->nome, $form);
$form = str_replace('{endereco}', $row->endereco, $form);
$form = str_replace('{bairro}', $row->bairro, $form);
$form = str_replace('{telefone}', $row->telefone, $form);
$form = str_replace('{email}', $row->email, $form);
$form = str_replace('{id_cidade}', $row->id_cidade, $form);
$form = str_replace('{cidades}', $cidades, $form);

print $form;