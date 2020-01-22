<?php

use Livro\Control\Page;
use Livro\Widgets\Base\Element;

class ExemploElementControl extends Page
{
    public function __construct()
    {
        parent::__construct();

        $div = new Element('div');
        $div->style  = 'text-align: center;';
        $div->style .= 'font-weight: bold;';
        $div->style .= 'font-size: 14pt;';
        $div->style .= 'margin: 20px;';
        $p = new Element('p');
        $p->add('Isso é um paragráfo');

        $div->add($p);

        parent::add($div);
    }
}