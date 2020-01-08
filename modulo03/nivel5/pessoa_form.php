<?php

    require_once 'classes/Pessoa.php';
    require_once 'classes/Cidade.php';

  $dados = $_POST;

  try {

      $pessoa = new stdClass();

      if (!$_REQUEST['action']) {
          $pessoa->id = null;
          $pessoa->nome = "";
          $pessoa->endereco = "";
          $pessoa->bairro = "";
          $pessoa->telefone = "";
          $pessoa->email = "";
          $pessoa->id_cidade = "";
      } else if ($_REQUEST['action'] == 'edit') {
          $id = $_GET['id'];
          $pessoa = injecao1::find($id);
      } else {
          $pessoa->nome = $dados['nome'];
          $pessoa->endereco = $dados['endereco'];
          $pessoa->bairro = $dados['bairro'];
          $pessoa->telefone = $dados['telefone'];
          $pessoa->email = $dados['email'];
          $pessoa->id_cidade = $dados['id_cidade'];
          injecao1::save($pessoa);
          header("Location: pessoa_list.php");
      }
  }
  catch (Exception $e)
  {
      print $e->getMessage();
  }

  $cidades = '';
  foreach (Cidade::all() as $cidade)
  {
      $id_cidade   = $cidade['id'];
      $nome_cidade = $cidade['nome'];
      $selected    = $id_cidade == $pessoa->id_cidade ? "selected" : "";
      $cidades    .= "<option {$selected} value='{$id_cidade}'> {$nome_cidade} </option>";
  }

  $form = file_get_contents('html/form.html');
  $form = str_replace('{id}', $pessoa->id, $form);
  $form = str_replace('{nome}', $pessoa->nome, $form);
  $form = str_replace('{endereco}', $pessoa->endereco, $form);
  $form = str_replace('{bairro}', $pessoa->bairro, $form);
  $form = str_replace('{telefone}', $pessoa->telefone, $form);
  $form = str_replace('{email}', $pessoa->email, $form);
  $form = str_replace('{id_cidade}', $pessoa->id_cidade, $form);
  $form = str_replace('{cidades}', $cidades, $form);

  print $form;