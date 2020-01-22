<?php

use Livro\Control\Page;
use Livro\Control\Action;
use Livro\Widgets\Base\Element;

class ExemploActionButtonControl extends Page
{

    public function __construct()
    {
        parent::__construct();

        $button = new Element('a');
        $button->add('Ação do botão...');
        $button->class = 'btn btn-success';

        $action = new Action([$this, 'executaAcao']);
        $action->setParameter('codigo', 4);
        $action->setParameter('nome', 'Rogerio Lins');
        $action->setParameter('login', 'rogeriolins');

        $button->href = $action->serialize();

        parent::add($button);

    }

    public function executaAcao($param)
    {
        print "<pre>";
        var_dump($param);
        print "</pre>";
    }

}