<?php

use Livro\Control\Page;
use Livro\Widgets\Container\Panel;

class ExemploPanelControl extends Page
{

    public function __construct()
    {
        parent::__construct();

        $panel = new Panel('Titulo do Painel');
        $panel->style = 'margin: 20px';
        $panel->add(' Conteúdo Conteúdo Conteúdo Conteúdo ');
        $panel->addFooter('Esse é o Rodape do Painel');
        parent::add($panel);

    }

}