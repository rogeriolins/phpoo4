<?php

  require_once 'db/pessoa_db.php';
  $dados = $_POST;
  $pessoa = new stdClass();

  if(!$_REQUEST['action']) {
      $pessoa->id        = null;
      $pessoa->nome      = "";
      $pessoa->endereco  = "";
      $pessoa->bairro    = "";
      $pessoa->telefone  = "";
      $pessoa->email     = "";
      $pessoa->id_cidade = "";
  } else if( $_REQUEST['action']=='edit' ){
      $id     = $_GET['id'];
      $pessoa = get_pessoa($id);
  } else {
      $pessoa->nome      = $dados['nome'];
      $pessoa->endereco  = $dados['endereco'];
      $pessoa->bairro    = $dados['bairro'];
      $pessoa->telefone  = $dados['telefone'];
      $pessoa->email     = $dados['email'];
      $pessoa->id_cidade = $dados['id_cidade'];
      /* INSERE */
      if(empty($dados['id'])) {
          $pessoa->id = get_next_pessoa();
          insert_pessoa($pessoa);
      } else {
          $pessoa->id = $dados['id'];
          update_pessoa($pessoa);
      }
      header("Location: pessoa_list.php");
  }

require_once("lista_combo_cidades.php");
$cidades = lista_combo_cidades($pessoa->id_cidade);

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