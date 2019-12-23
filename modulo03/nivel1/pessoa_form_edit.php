<?php

if (empty($_GET['id'])) {
  header("Location: pessoa_list.php");
} else {
  $id_pessoa = (int) $_GET['id'];
}

/* Acessa o banco de dados */
try {
  $conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=livro', 'root', '');
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $output = "";
  $result = $conn->query("select id, nome, endereco, bairro, telefone, email, id_cidade from pessoa where id={$id_pessoa}");
  if ($result) {
    $row = $result->fetchObject();
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
  <form enctype="multipart/form-data" method="post" action="pessoa_save_update.php">
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