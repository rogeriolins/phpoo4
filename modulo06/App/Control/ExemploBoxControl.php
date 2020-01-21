<?php

use Livro\Control\Page;
use Livro\Widgets\Container\Panel;
use Livro\Widgets\Container\HBox;

class ExemploBoxControl extends Page
{

    public function __construct()
    {

        parent::__construct();

        $pn1 = new Panel('Painel 1');
        $pn1->style = "margin: 10px;";
        $pn1->add('Painel 1');

        $pn2 = new Panel('Painel 2');
        $pn2->style = "margin: 10px;";
        $pn2->add('Painel 2');

        $box = new HBox();
        $box->add($pn1);
        $box->add($pn2);

        parent::add($box);

    }

}