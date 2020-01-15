<?php

 require_once "classes/tdg/ClienteGateway.php";

 $htmlFinished = file_get_contents("html/index.html");
 $items = "";

 $action = empty($_GET['action']) ? "" : $_GET['action'] ;

 try
 {

    /* Conexão com o Banco de Dados SQLite3 */
    $conn = new PDO("sqlite:database/banco.db");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    ClienteGateway::setConnection($conn);

    /* Lista todos os registros do banco de dados */
    $contador = 0;
    foreach ( ClienteGateway::all() as $clientes )
    {
        $contador++;
        $item = file_get_contents("html/item.html");
        $item = str_replace("{contador}", $contador, $item);
        $item = str_replace("{id}", $clientes->id, $item);
        $item = str_replace("{name}", $clientes->name, $item);
        $item = str_replace("{login}", $clientes->login, $item);
        $item = str_replace("{passwd}", $clientes->passwd, $item);
        $activeString = $clientes->active==1 ? "ATIVO" : "INATIVO";
        $items .= str_replace("{active}", $activeString, $item);
    }
    $htmlFinished = str_replace("{items}", $items, $htmlFinished);

    if($action=="modify")
    {
        $cli = new ClienteGateway();
        $cli->find($_GET['id']);
// finished
        $form = file_get_contents("html/form.html");
//        $name =
//        $form = str_replace("{name}",);
        $htmlFinished = str_replace("{actionNeed}", $form, $htmlFinished);
    } elseif ( $action=="new") {
        $form = file_get_contents("html/form.html");
        $htmlFinished = str_replace("{actionNeed}", $form, $htmlFinished);
    } else {
        $htmlFinished = str_replace("{actionNeed}", "", $htmlFinished);
    }

 }
 catch ( Exception $e)
 {
    print $e->getMessage();
 }

/* Printa o Codigo */
print $htmlFinished;