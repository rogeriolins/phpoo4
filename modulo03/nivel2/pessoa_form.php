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

?>
<html>

<head>
  <meta charset="utf-8">
  <title>Alteração de pessoa</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&display=swap" rel="stylesheet">
  <link href="css/form.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
  <form enctype="multipart/form-data" method="post" action="pessoa_form.php?action=save">
    <label> Código </label>
    <input value="<?= $row->id; ?>" name="id" readonly="1" type="text" style="width:30%">

    <label> Nome </label>
    <input value="<?= $row->nome; ?>" name="nome" type="text" style="width:50%">

    <label> Endereço </label>
    <input value="<?= $row->endereco; ?>" name="endereco" type="text" style="width:50%">

    <label> Bairro </label>
    <input value="<?= $row->bairro; ?>" name="bairro" type="text" style="width:25%">

    <label> Telefone </label>
    <input value="<?= $row->telefone; ?>" name="telefone" type="text" style="width:25%">

    <label> Email </label>
    <input value="<?= $row->email; ?>" name="email" type="text" style="width:25%">

    <label> Cidade </label>
    <select name="id_cidade" style="width:25%">
      <?php

      require_once("lista_combo_cidades.php");
      print lista_combo_cidades($row->id_cidade);

      ?>
    </select>

    <input type="submit">

  </form>
</body>
</html>