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

        $result = $conn->query("select id, nome, endereco, bairro, telefone, email, id_cidade from pessoa");

        if (!empty($_GET['action']) and $_GET['action'] == 'delete') {
          $id = (int) $_GET['id'];
        }

        if ($result) {
            $items = "";
          while ($row = $result->fetchObject()) {

              $id        = $row->id;
              $nome      = $row->nome;
              $endereco  = $row->endereco;
              $bairro    = $row->bairro;
              $telefone  = $row->telefone;
              $id_cidade = $row->id_cidade;

              $item = file_get_contents('html/item.html');
              $item = str_replace('{id}', $id, $item);
              $item = str_replace('{nome}', $nome, $item);
              $item = str_replace('{endereco}', $endereco, $item);
              $item = str_replace('{bairro}', $bairro, $item);
              $item = str_replace('{telefone}', $telefone, $item);
              $item = str_replace('{id_cidade}', $id_cidade, $item);

              $items .= $item;

          }
          $list = file_get_contents('html/list.html');
          $list = str_replace('{items}', $items, $list);
          print $list;
        }

        $conn = null;
      } catch (PDOException $e) {
        print 'Erro: ' . $e->getMessage();
      }