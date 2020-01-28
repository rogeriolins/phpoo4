<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Teste da aplicação</title>
</head>
<?php

require_once 'Lib/Livro/Core/ClassLoader.php';
$al = new \Livro\Core\ClassLoader;
$al->addNamespace('Livro', 'Lib/Livro');
$al->register();

require_once 'Lib/Livro/Core/AppLoader.php';
$al = new \Livro\Core\AppLoader;
$al->addDirectory('App/Control');
$al->addDirectory('App/Model');
$al->register();

$loader = require 'vendor/autoload.php';
$loader->register();

print "<div style='margin: 5px; padding: 2px;'>";
print "<a class='btn btn-info' style='margin: 0px 2px;' href='?'> Inicio </a>";
print "<a class='btn btn-info' style='margin: 0px 2px;' href='?class=ContatoForm'> ContatoForm </a>";
print "<a class='btn btn-info' style='margin: 0px 2px;' href='?class=ContatoForm&method=onLoad'> ContatoForm com onLoad </a>";
print "<a class='btn btn-info' style='margin: 0px 2px;' href='?class=FuncionarioForm'> FuncionarioForm </a>";
print "<a class='btn btn-info' style='margin: 0px 2px;' href='?class=ContatoList'> ContatoList </a>";
print "<a class='btn btn-info' style='margin: 0px 2px;' href='?class=FuncionarioList'> FuncionarioList </a>";
print "</div>";


if( $_GET )
{
    $class = $_GET['class'];

    if(class_exists($class))
    {
        $pagina = new $class;
        $pagina->show();
    }
}

?>
<link rel='stylesheet' href='App/Templates/css/bootstrap.min.css'>
</body>
</html>
