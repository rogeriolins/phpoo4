<?php

/* Metodo de carregamento manual */
//require_once "Library/Widgets/Field.php";
//require_once "Library/Container/Table.php";
//require_once "Library/Widgets/Form.php";

spl_autoload_register( function($class) {
    require_once( str_replace("\\","/",$class) . ".php" );
});

use Library\Widgets\Field;
use Library\Container\Table;
use Library\Widgets\Form;

new Field;
new Table;
new Form;

$f = new Form;
$f->show();
$f->fazAlgo(new Field);
