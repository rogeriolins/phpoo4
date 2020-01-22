<?php

use Livro\Control\Page;

class TWigWelcomeControl extends Page
{

    public function __construct()
    {
        parent::__construct();

        $loader = new Twig_Loader_Filesystem('App/Resources');
        $twig   = new Twig_Environment($loader);
        $template = $twig->loadTemplate('welcome.html');

        $replaces = [];
        $replaces['nome'] = 'Maria da Silva';
        $replaces['rua']  = 'Rua das Flores, S/n';
        $replaces['cep']  = '85851-170';
        $replaces['fone'] = '45-3025-7565';
        print $template->render($replaces);
    }

    public function onSaibaMais($params)
    {
        print "<pre>";
        var_dump($params);
        print "<br><br><b>Nome: </b>{$params['nome']} - Endereço: <b>{$params['rua']}</b>";

    }

}