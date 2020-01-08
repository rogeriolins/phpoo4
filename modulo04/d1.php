<?php

    require_once "a1.php";
    require_once "b1.php";
    require_once "c1.php";

    use \Library\Widgets\Field;
    use \Library\Container\Table;
    use \Library\Widgets\Form;

    new Field;
    new Table;
    new Form;

    $f = new Form;
    $f->show();
    $f->fazAlgo(new Field);
