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
print "<a class='btn btn-info' style='margin: 0px 2px;' href='?class=SimpleFormControl'> SimpleFormControl </a>";
print "<a class='btn btn-info' style='margin: 0px 2px;' href='?class=TwigSampleControl'> TwigSimpleControl </a>";
print "<a class='btn btn-info' style='margin: 0px 2px;' href='?class=ExemploElementControl'> Element </a>";
print "<a class='btn btn-info' style='margin: 0px 2px;' href='?class=ExemploPanelControl'> Panel </a>";
print "<a class='btn btn-info' style='margin: 0px 2px;' href='?class=ExemploBoxControl'> BoxControl </a>";
print "<a class='btn btn-info' style='margin: 0px 2px;' href='?class=ExemploMessageControl'> MessageControl </a>";
print "<a class='btn btn-info' style='margin: 0px 2px;' href='?class=ExemploQuestionControl'> QuestionControl </a>";
print "<a class='btn btn-info' style='margin: 0px 2px;' href='?class=ExemploActionControl'> ActionControl </a>";
print "<a class='btn btn-info' style='margin: 0px 2px;' href='?class=ExemploActionButtonControl'> ActionButtonControl </a>";
print "<a class='btn btn-info' style='margin: 0px 2px;' href='?class=TWigWelcomeControl'> TWigWelcomeControl </a>";
print "<a class='btn btn-info' style='margin: 0px 2px;' href='?class=TwigListControl'> TwigListControl </a>";
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

print "<link rel='stylesheet' href='App/Templates/css/bootstrap.min.css'>";
