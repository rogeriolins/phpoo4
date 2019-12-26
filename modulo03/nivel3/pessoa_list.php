<html>

<head>
  <meta charset="utf-8">
  <title> Listagem de pessoas </title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&display=swap" rel="stylesheet">
  <link href="css/list.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
  <table border="1">
    <thead>
      <tr>
        <td></td>
        <td></td>
        <td>Codigo</td>
        <td>Nome</td>
        <td>Endereço</td>
        <td>Bairro</td>
        <td>Telefone</td>
        <td>Cidade</td>
      </tr>
    </thead>
    <tbody>
      <?php

      /* Acessa o banco de dados */
      try {
        $conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=livro', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /* DELETAR */
        if (!empty($_GET['action']) and $_GET['action'] == 'delete') {
          $id = (int) $_GET['id'];
          $conn->query("delete from pessoa where id='{$id}'");
        }

        $output = "";
        $result = $conn->query("select id, nome, endereco, bairro, telefone, email, id_cidade from pessoa");

        if (!empty($_GET['action']) and $_GET['action'] == 'delete') {
          $id = (int) $_GET['id'];
        }

        if ($result) {
          while ($row = $result->fetchObject()) {
            $editar  = "<a href='pessoa_form.php?action=edit&id={$row->id}'><img src='images/edit.svg' style='width: 17px'><a>";
            $excluir = "<a href='pessoa_list.php?action=delete&id={$row->id}'><img src='images/delete.svg' style='width: 17px'></a>";
            $output  .= "<tr><td>{$editar}</td><td>{$excluir}</td>";
            $output  .= "<td>{$row->id}</td>";
            $output  .= "<td>{$row->nome}</td>";
            $output  .= "<td>{$row->endereco}</td>";
            $output  .= "<td>{$row->bairro}</td>";
            $output  .= "<td>{$row->telefone}</td>";
            $output  .= "<td>{$row->id_cidade}</td>";
            $output  .= '</tr>';
          }
        }
        print $output;
        $conn = null;
      } catch (PDOException $e) {
        print 'Erro: ' . $e->getMessage();
      }

      ?>
    </tbody>
  </table>
  <button onclick="window.location='pessoa_form.php'">
    <img src="images/add2.svg" style="width: 17px"> Inserir</img>
  </button>
</body>

</html>